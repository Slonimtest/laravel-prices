<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\BaseModel
 *
 * @method static Builder count()
 * @method static static create($value)
 * @method static Builder find($id, $columns = ['*'])
 * @method static Builder first($columns = ['*'])
 * @method static Builder firstOrCreate(array $attributes = [], array $values = [])
 * @method static Builder findOrFail($id, $columns = ['*'])
 * @method static Builder firstOrNew(array $attributes = [], array $values = [])
 * @method static Builder firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder inRandomOrder($seed = '')
 * @method static Builder newModelQuery()
 * @method static Builder newQuery()
 * @method static Builder orderBy($column, $direction = 'asc')
 * @method static Builder query()
 * @method static Builder select($value)
 * @method static Builder selectRaw($value)
 * @method static Builder truncate()
 * @method static Builder updateOrCreate(array $attributes, array $values = [])
 * @method static Builder withCount($relations)
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder whereIn($column, $array)
 * @method static Builder whereCreatedAt($value)
 * @method static Builder whereJsonContains($column, $value, $boolean = 'and', $not = false)
 * @method static Builder whereId($value)
 * @method static Builder whereHas($relation, Closure $callback = null, $operator = '>=', $count = 1)
 * @method static Builder whereName($value)
 * @method static Builder whereUpdatedAt($value)
 */
class BaseModel extends Model
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return ((new static)->getTable());
    }
}
