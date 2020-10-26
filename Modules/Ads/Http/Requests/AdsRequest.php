<?php

namespace Modules\Ads\Http\Requests;

use App\Http\Requests\AbstractRequest;

class AdsRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'type' => 'required|in:free,paid',
            'description' => 'required|string',
            'category_id' => 'required|numeric|gte:0',
            'advertiser_id' => 'required|numeric|gte:0',
            'start_date' => 'required|date',
            "tags"    => [
                'required',
                'array', // input must be an array
                'min:1'  // there must be one member in the array
            ],
            "tags.*"  => [
                'required',
                'numeric',   // input must be of type number
                'distinct', // members of the array must be unique
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function authorize(): bool
    {
        return true;
    }
}
