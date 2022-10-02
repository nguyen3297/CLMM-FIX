<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\HistoryPlay;
use Carbon\Carbon;

class MomoResource extends JsonResource
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
            'username' => $this->phone,
            'status' => $this->status,
            'settings' => array(
                'min' => $this->min,
                'max' => $this->max,
                'transfers_today' => array(
                    'times' => HistoryPlay::where(['phoneSend' => $this->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count(),
                    'amount' => HistoryPlay::where(['phoneSend' => $this->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive'),
                )
            )
        ];
    }
}
