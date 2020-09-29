<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderedProduct
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property int $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderedProduct whereUserId($value)
 * @mixin \Eloquent
 */
class OrderedProduct extends Model
{
    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
