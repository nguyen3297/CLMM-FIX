<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'partnerId' => Str::substr($this->partnerId, 0, -4).'****',
            'victory'   => $this->status,
            'amount'    => $this->amount,
            'comment'   => $this->comment,
        ];
    }
}
