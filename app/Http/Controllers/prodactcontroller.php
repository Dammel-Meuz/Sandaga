<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class prodactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $prodact= Produit::all();

     return response()->json($prodact, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $valided = Validator::make($request->all(),[
            'name'=>'required',
            // 'url_img'=>'required',
            'description'=>'required',
            'characteristic'=>'required',
            'quantity'=>'required'

        ]);
        if($valided->fails()){
            return response()->json(['message'=>'Bad request']);
        }
        $prodact = new Produit();
        $prodact->categories_id =$request->categories_id;
        $prodact->name = $request->name;
        // if($request->hashFile("url_img")){
        //     $file= $prodact->url_img = $request->file('url_img');
        //     $extension =$file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move("images/products",$filename);
        //     $prodact->url_img = $filename;
        //     dd($prodact->url_img);
        // }
        $prodact->url_img = "url_img";
        $prodact->description = $request->description;
        $prodact->characteristic = $request->characteristic;
        $prodact->quantity = $request->quantity;
        $prodact->save();
        return response()->json(['message'=>'Product created is successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
