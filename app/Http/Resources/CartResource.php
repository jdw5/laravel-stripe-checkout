<?php

namespace App\Http\Resources;

use Laravel\Cashier\Cashier;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'session_id' => $this->session_id,
            'user_id' => $this->user_id,
            'count' => $this->products->count() ?? 0,
            'products' => ProductResource::collection($this->products),
            'total' => Cashier::formatAmount($this->total(), 'aud'),
        ];
    }
}
