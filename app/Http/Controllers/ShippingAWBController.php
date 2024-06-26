<?php

namespace App\Http\Controllers;

use App\Builders\ResponseBuilder;
use App\Http\Requests\FilterShippingAWBRequest;
use App\Services\ShippingAWBService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShippingAWBController extends Controller
{


    public ResponseBuilder $responseBuilder;
    public ShippingAWBService $shippingAWBService;

    public function __construct(
        ResponseBuilder $responseBuilder,
        ShippingAWBService $shippingAWBService
    )
    {
        $this->responseBuilder = $responseBuilder;
        $this->shippingAWBService = $shippingAWBService;
    }

    public function getShippingAWB(FilterShippingAWBRequest $request)
    {
        $validatedData = $request->all();
        $this->responseBuilder->setStatusCode(Response::HTTP_OK);
        $data = $this->shippingAWBService->getShippingAWB($validatedData);
        $this->responseBuilder->setData($data);
        return $this->responseBuilder->getResponse();
    }
}
