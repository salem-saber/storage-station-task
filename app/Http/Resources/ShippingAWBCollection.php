<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShippingAWBCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'tableName' => 'shipping_awbs',
            'columns' => $this->getColumns(),
            'filters' => $this->getFilters(),
            'data' => [
                'items' => $this->collection->transform(function ($shippingAWB) {
                    return new ShippingAWBResource($shippingAWB);
                }),
                'pagination' => [
                    'total' => $this->total(),
                    'perPage' => $this->perPage(),
                    'currentPage' => $this->currentPage(),
                    'lastPage' => $this->lastPage(),
                    'from' => $this->firstItem(),
                    'to' => $this->lastItem(),
                ]
            ],

        ];
    }

    private function getColumns()
    {
        return [
            [
                'type' => 'text',
                'label' => 'ID',
                'name' => null,
                'sortable' => true,
                'data_src' => 'id',
                'showable' => false,
                'minWidth' => '50px',
                'showInMobileApp' => false,
                'loadIf' => true,
            ],
            [
                'type' => 'text',
                'label' => 'Name',
                'name' => null,
                'sortable' => true,
                'data_src' => 'name',
                'showable' => true,
                'minWidth' => '50px',
                'showInMobileApp' => true,
                'loadIf' => true,
            ],
            // Add more columns as needed
        ];
    }

    private function getFilters()
    {
        return [
            [
                'type' => 'text',
                'filter_name' => 'name',
                'label' => 'Name',
                'loadIf' => true,
                'props' => [
                    'operators' => ['='],
                ],
            ],
            [
                'type' => 'date',
                'filter_name' => 'created_at_from',
                'label' => 'Created Date From',
                'loadIf' => true,
                'props' => [
                    'is_from' => true,
                    'operators' => ['>='],
                ],
            ],
            [
                'type' => 'date',
                'filter_name' => 'created_at_to',
                'label' => 'Created Date To',
                'loadIf' => true,
                'props' => [
                    'is_from' => false,
                    'operators' => ['<='],
                ],
            ],
            // Add more filters as needed
        ];
    }
}
