<?php

namespace App\Http\Resources;

use App\Http\Resources\BookCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'buyers_id' => $this->buyers_id,
            'books' => new BookCollection($this->books),
            'price' => $this->price,
        ];
    }
}
