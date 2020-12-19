<?php

namespace App\Http\Controllers;

//use Dotenv\Util\Str;
use App\Models\Produit;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
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
    $prodact= Produit::orderBy('created_at','DESC')->paginate(10);
    //$prodact = Produit::all();

     return response()->json($prodact, 200);
    }
    public function indexlistproduit()
    {
    //$prodact= Produit::orderBy('created_at','DESC')->paginate(6);
    $prodact = Produit::all();

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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=>'required',
            'characteristic'=>'required',
            'quantity'=>'required',
            'prix'=>'required|integer'

        ]);
        if($valided->fails()){
            return response()->json(['message'=>'Bad Request']);
        }
        $prodact = new Produit();
        $prodact->categories_id =$request->input('categories_id');
        $prodact->name = $request->input('name');
        $prodact->description = $request->input('description');
        $prodact->characteristic = $request->input('characteristic');
        $prodact->quantity = $request->input('quantity');
        $prodact->prix = $request->input('prix');
        //dd($prodact);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $prodact->image = $name;

           // dd($prodact);

        }else{
            return response()->json(['message'=>'bad request']);

        }
        //dd($prodact);

        // if ($request->hasFile('image')) {
        //     // Get image file
        //     $image = $request->File('image');
        //     // Make a image name based on user name and current timestamp
        //     $extension = $image->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //    // $name = Str::slug($request->input('name')).'_'.time();
        //     // Define folder path
        //     $folder = '/uploads/images/';
        //     // Make a file path where image will be stored [ folder path + file name + file extension]
        //     //$filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        //     // Upload image
        //     $image->move($image, $folder, 'public', $filename);
        //     // Set user profile image path in database to filePath
        //     $prodact->image = $filename;
        // }



        //else{
        //     $prodact->image = 'url';
        // }

        // if ($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move(public_path('image'),$filename);
        //     $prodact->image = $filename;
        // }

        // else {
        //     return response()->json(['message'=>'bad request']);
        // }

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
        $product = Produit::find($id);

        return response()->json($product);
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
        $product  = Produit::where('id',$request->id)->update([

        ]);
        $product->update($request->all());

        return Response()->json(['message'=>'update successfull']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Produit::find($id);
        if ($product->delete()) {
            return $this->refresh();
        }else{
            return response()->json(['error' =>'Destroy method has failed'],425);

        }
    }

    private function refresh(){
        $prodact = Produit::all();

        return response()->json($prodact, 200);
    }
}
