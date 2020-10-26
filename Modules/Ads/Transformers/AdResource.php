<?php

namespace Modules\Ads\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'title' => $this->title,
            'type' => $this->type,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'category' => new ItemResource($this->category),
            'advertiser' => new AdvertiserResource($this->advertiser),
            'tags' => ItemResource::collection($this->tags),
        ];
    }
}
