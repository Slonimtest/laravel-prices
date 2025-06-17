<?php

namespace App\Services;

use App\Models\Product;
use App\Reference\Constants;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class PriceService
 * @package App\Services
 */
class PriceService extends Service
{
    /**
     * Get Price list
     *
     * @param int|null $limit
     * @param string|null $orderBy
     * @param bool|null $desc
     *
     * @return LengthAwarePaginator
     */
    public function getList(
        ?int $limit = null,
        ?string $orderBy = null,
        ?bool $desc = null
    ): LengthAwarePaginator {
        $query = Product::where([]);

        $query->orderBy(($orderBy ?? null) ?: 'id', ($desc ?? null) ? 'DESC' : 'ASC');

        return $query->paginate(($limit ?? null) ?: Constants::DEFAULT_LIMIT);
    }
}
