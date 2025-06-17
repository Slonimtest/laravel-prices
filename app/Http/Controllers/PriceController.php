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
 */
class PriceController extends ApiController
{
    /**
     * @param PriceService $service
     */
    public function __construct(protected PriceService $service) {}

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
