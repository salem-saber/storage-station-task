<?php

namespace App\Services;

use App\Http\Resources\ShippingAWBCollection;
use App\Repositories\ShippingAWBRepository;

class ShippingAWBService
{


    public ShippingAWBRepository $shippingAWBRepository;

    public function __construct(
        ShippingAWBRepository $shippingAWBRepository,
    )
    {
        $this->shippingAWBRepository = $shippingAWBRepository;
    }


    public function getShippingAWB($validatedData = [])
    {
        $shippingAWBRecords = $this->shippingAWBRepository->getShippingAWB()
            ->applyFilters($validatedData['filters'] ?? [])
            ->applyPagination($validatedData['pagination'] ?? []);


        return new ShippingAWBCollection($shippingAWBRecords);


    }

}
