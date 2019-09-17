<?php

namespace App\Http\Controllers;

use App\ImageProduct;
use Illuminate\Http\Request;
use App\Model\Product;
use Illuminate\Support\Facades\Storage;

class ImageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = ImageProduct::all()->where('product_id',$id);
        return $images ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $image = ImageProduct::all()->where('product_id',$id);
        $product = Product::where('id', $id)->get();
        return view('pages/imageproduct/create',compact('product'))->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $this->validate($request,[
            'file'=>"image|required",
            'description'=>"nullable|string"
        ]);


            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $image->move(public_path('products'),$imageName);
            $imageUpload = new ImageProduct();
            $imageUpload->file = $imageName;
            $imageUpload->product_id = $id ;
            $imageUpload->size = $imagesize ;
            $imageUpload->save();
            return response()->json(['success'=>$imageName]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageProduct  $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ImageProduct $imageProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageProduct  $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageProduct $imageProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageProduct  $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageProduct $imageProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageProduct  $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageProduct $imageProduct)
    {
        $filename =  $imageProduct->get('file');
        ImageProduct::where('file',$filename)->delete();
        $path=public_path().'/products/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return back()->with('success',$filename ." Deleted");
    }
}
