<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use App\Http\Resources\V1\InvoiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           'id' => $this->id,
           'type' => $this->type,
           'name' =>$this->name,
           'email' =>$this->email,
           'address' =>$this->address,
           'city' =>$this->city,
           'state' =>$this->state,
           'postalcode' =>$this->postal_code,
           'invoices' => InvoiceResource::collection($this->whenloaded('invoices'))
        ];
    }
}
