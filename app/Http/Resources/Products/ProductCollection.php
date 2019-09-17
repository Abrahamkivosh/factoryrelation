<?php

namespace App\Http\Resources\Products;
use App\Model\Product;
use App\Model\Review ;
//use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\Resource;
//we will be using product resource only
class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'name' => $this->name,
            'totalPrice' =>round((((100 - $this->discount)/100)*$this->price),2),
            'discount'=>$this->discount,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/ $this->reviews->count(),2) : "No rating yet",
            'href'=>[
                'reviews'=>route('products.show',$this->id)
            ]
        ];
    }
}
