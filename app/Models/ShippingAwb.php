<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAwb extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_company', 'price', 'payment_type', 'shipper_name', 'shipper_company_name',
        'shipper_address_line_1', 'shipper_line_2', 'shipper_line_3', 'shipper_city',
        'shipper_state_or_province_code', 'shipper_post_code', 'shipper_country_code',
        'shipper_phone', 'shipper_email', 'consignee_name', 'consignee_company_name',
        'consignee_address_line_1', 'consignee_line_2', 'consignee_line_3', 'consignee_city',
        'consignee_state_or_province_code', 'consignee_post_code', 'consignee_country_code',
        'consignee_phone', 'consignee_email', 'awb_reference', 'description',
        'tracking_number', 'label', 'store_name', 'order_number', 'is_delivered', 'is_paid',
        'user_id',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
