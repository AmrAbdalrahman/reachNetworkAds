<?php

namespace Modules\Ads\Http\Requests;

use App\Http\Requests\AbstractRequest;


class ItemRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
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
