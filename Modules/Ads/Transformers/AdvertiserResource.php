<?php

namespace Modules\Ads\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertiserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'key' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
