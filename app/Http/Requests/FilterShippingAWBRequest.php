<?php

namespace App\Http\Requests;

use App\Builders\ResponseBuilder;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class FilterShippingAWBRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'filters' => 'sometimes|array',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $apiResponse = new ResponseBuilder();

        $apiResponse->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        $apiResponse->setErrors($validator->errors()->toArray());
        $apiResponse->setMessage(Response::$statusTexts[Response::HTTP_UNPROCESSABLE_ENTITY]);
        return $apiResponse->getResponse();
    }
}
