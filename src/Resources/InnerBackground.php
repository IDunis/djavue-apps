<?php

namespace Djavue\Apps\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InnerBackground extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
