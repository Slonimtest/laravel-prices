<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    public static $currency = 'RUB';

    protected static $rates = [
        'RUB' => 1,
        'USD' => 90,
        'EUR' => 100,
    ];

    protected static $symbols = [
        'RUB' => '₽',
        'USD' => '$',
        'EUR' => '€',
    ];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $basePrice = $this->price;
        $cur = self::$currency;

        if (!array_key_exists($cur, self::$rates)) {
            $cur = 'RUB';
        }

        $converted = $basePrice / self::$rates[$cur];

        switch ($cur) {
            case 'USD':
            case 'EUR':
                $formatted = self::$symbols[$cur] . number_format($converted, 2, '.', '');
                break;
            case 'RUB':
            default:
                $formatted = number_format($converted, 0, '', ' ') . ' ' . self::$symbols['RUB'];
                break;
        }

        return [
            'id'    => $this->id,
            'title' => $this->title,
            'price' => $formatted,
        ];
    }
}
