<?php

namespace App\Http\Resources\Products;
use Illuminate\Http\Resources\Json\JsonResource;

class Productresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detials,
            'price'=> round($this->price , 2),
            'stoke' => $this->stoke < 1 ? "Out of stoke" : $this->stoke ,
            'discount' =>$this->discount ,
            'totalPrice' =>round((((100 - $this->discount)/100)*$this->price),2),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/ $this->reviews->count(),2) : "No rating yet",
            'href'=>[
                'reviews'=>route('reviews.index',$this->id)
            ]
        ];
    }
}
