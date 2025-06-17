<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property float $price
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'price',
    ];
}
