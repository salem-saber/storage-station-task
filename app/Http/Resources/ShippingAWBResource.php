<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingAWBResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'created_date' => $this->created_at->format('d/m/Y H:i'),
            'shipping_company' => $this->shipping_company,
            'tracking_number' => [
                'value' => "/sawb-tracking/{$this->tracking_number}",
                'label' => $this->tracking_number
            ],
            'public_link' => [
                'value' => '!#',
                'label' => $this->bill_link,
                'type' => 'copy_value'
            ],
            'bill_link' => $this->bill_link,
            'status_code' => $this->status_code,
            'cod_withdrawal_allowed' => (bool)$this->cod_withdrawal_allowed,
            'is_paid' => (bool)$this->is_paid,
            'is_delivered' => (bool)$this->is_delivered,
            'order_number' => $this->order_number,
            'payment_type' => $this->payment_type,
            'shipment_direction' => $this->shipment_direction,
            'price' => $this->price,
            'pickup_id' => $this->pickup_id,
            'consignee_name' => $this->consignee_name,
            'consignee_phone' => $this->consignee_phone,
            'ext_integration' => (bool)$this->ext_integration,
            'integrated_store_id' => $this->integrated_store_id,
            'actions' => [
                'show_details' => [
                    'action_key' => 'show_details',
                    'action_type' => 'normal',
                    'showInMobileApp' => true,
                    'showInWeb' => true,
                    'need_confirmation' => false,
                    'applicableAsBulkAction' => false,
                    'action' => [
                        'api' => "/api/control-tables/row-table-action/shipping_awbs/show_details/{$this->id}",
                        'web' => "/control-tables/row-table-action/shipping_awbs/show_details/{$this->id}"
                    ],
                    'button' => [
                        'label' => 'عرض',
                        'btnClasses' => ['btn-opac-info']
                    ],
                    'method' => 'post',
                    'onSuccess' => 'DisplayOnModal',
                    'payload_keys' => [],
                    'applicableForRow' => 'showDetailsBtn'
                ],
                'update_track_status' => [
                    'action_key' => 'update_track_status',
                    'action_type' => 'normal',
                    'showInMobileApp' => true,
                    'showInWeb' => true,
                    'need_confirmation' => false,
                    'applicableAsBulkAction' => true,
                    'action' => [
                        'api' => "/api/control-tables/row-table-action/shipping_awbs/update_track_status/{$this->id}",
                        'web' => "/control-tables/row-table-action/shipping_awbs/update_track_status/{$this->id}"
                    ],
                    'button' => [
                        'label' => 'تحديث حالة الشحن',
                        'btnClasses' => ['btn-opac-success']
                    ],
                    'method' => 'post',
                    'onSuccess' => 'refetchRow',
                    'payload_keys' => [],
                    'applicableForRow' => 'showUpdateStatusBtn',
                    'onBulkSuccess' => 'refetchData',
                    'bulk_actions_url' => [
                        'api' => '/api/control-tables/row-bulk-table-action/shipping_awbs/update_track_status',
                        'web' => '/control-tables/row-bulk-table-action/shipping_awbs/update_track_status'
                    ]
                ]
            ]
        ];
    }

}
