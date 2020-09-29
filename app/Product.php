<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $category_id
 * @property int|null $sub_category_id
 * @property int|null $brand_id
 * @property string $product_name
 * @property string $product_code
 * @property int $product_quantity
 * @property string $product_details
 * @property string|null $product_color
 * @property string|null $product_size
 * @property string $selling_price
 * @property string|null $discounted_price
 * @property int|null $hot_deal
 * @property int|null $best_rated
 * @property int|null $hot_new
 * @property int|null $trend
 * @property string|null $image_one
 * @property string|null $image_two
 * @property string|null $image_three
 * @property string|null $video_link
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Brand|null $brand
 * @property-read \App\Category $category
 * @property-read \App\SubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBestRated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHotDeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHotNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImageOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImageThree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImageTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTrend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVideoLink($value)
 * @property-read \App\Wishlist $wishlist
 */
class Product extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function wishlist() {
        return $this->belongsTo(Wishlist::class);
    }

}
