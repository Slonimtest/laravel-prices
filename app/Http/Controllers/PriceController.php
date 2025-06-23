<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricetListRequest;
use App\Http\Resources\PriceResource;
use App\Services\PriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PriceController
 * @package App\Http\Controllers
 *
 * @OA\Info(
 *     title="My API",
 *     version="1.0.0",
 *     description="API for managing tasks"
 * )
 */
class PriceController extends ApiController
{
    /**
     * @param PriceService $service
     */
    public function __construct(protected PriceService $service) {}

    /**
     *Get prices
     *
     * @OA\Get(
     *     path="/api/prices",
     *     summary="Get list of products with prices",
     *     description="Returns paginated list of products with their prices in selected currency",
     *     tags={"Prices"},
     *     @OA\Parameter(
     *         name="currency",
     *         in="query",
     *         description="Currency code (default: RUB)",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             default="RUB",
     *             example="USD"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="Number of items per page",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             example=10
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="order_by",
     *         in="query",
     *         description="Field to sort by",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             example="price"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="desc",
     *         in="query",
     *         description="Sort in descending order",
     *         required=false,
     *         @OA\Schema(
     *             type="boolean",
     *             example=true
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="list",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/PriceResource")
     *             ),
     *             @OA\Property(
     *                 property="listCount",
     *                 type="integer",
     *                 example=100
     *             ),
     *             @OA\Property(
     *                 property="lastPage",
     *                 type="integer",
     *                 example=10
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="The given data was invalid."
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 example={
     *                     "limit": {"The limit must be an integer."},
     *                     "order_by": {"The order by must be a string."},
     *                     "desc": {"The desc must be a boolean."}
     *                 }
     *             )
     *         )
     *     )
     * )
     */
    public function index(PricetListRequest $request): JsonResponse
    {
        $currency = strtoupper($request->query('currency', 'RUB'));

        $products = $this->service->getList(
            $request->limit,
            $request->order_by,
            $request->desc,
        );

        PriceResource::$currency = $currency;

        return $this->successResponseWithData([
            'list' => PriceResource::collection($products),
            'listCount' => $products->total(),
            'lastPage' => $products->lastPage()
        ]);
    }
}
