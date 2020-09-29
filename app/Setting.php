<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Setting
 *
 * @property int $id
 * @property string|null $site_logo
 * @property string|null $site_name
 * @property string|null $site_email
 * @property string|null $site_address
 * @property int|null $tax_charge
 * @property int|null $shipping_charge
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereShippingCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSiteAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSiteEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSiteLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTaxCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    //
}
