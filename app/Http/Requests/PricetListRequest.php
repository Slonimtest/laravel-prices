<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class PricetListRequest
 * @package App\Http\Requests
 *
 * @property int|null $limit
 * @property string|null $order_by
 * @property string|null $desc
 */
class PricetListRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'limit'      => 'integer|nullable',
            'order_by'   => 'string|nullable',
            'desc'       => 'boolean|nullable',
        ];
    }
}
