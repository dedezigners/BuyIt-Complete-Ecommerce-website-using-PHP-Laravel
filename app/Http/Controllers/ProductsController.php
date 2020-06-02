<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index', [
            'title' => 'Products',
            'products' => Product::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'title' => 'Create Product',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => ['required'],
            'name' => ['required', 'string', 'max:255', 'unique:products'],
            'image' => ['required', 'image'],
            'price' => ['required']
        ]);

        $productSlug = $this->generateSlug($request->name);

        if ($productSlug) {

            $product_image = $request->image;
            $upload_dir = 'assets/uploads/products/';
            $image_name = time() . $product_image->getClientOriginalName();
            $product_image->move($upload_dir, $image_name);

            Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $productSlug,
                'price' => $request->price,
                'image' => $upload_dir . $image_name,
                'description' => $request->description
            ]);

            Session::flash('success', 'Product successfully created.');
            return redirect()->route('products.index');
        } else {
            Session::flash('error', 'Product name could not contains only special characters');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);
        
        return view('admin.product.edit', [
            'title' => 'Edit Product',
            'categories' => Category::all(),
            'product' => $product
        ]);
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
        $this->validate($request, [
            'category_id' => ['required'],
            'name' => ['required', 'string', 'max:255', 'unique:products,name,' . $id ],
            'price' => ['required']
        ]);

        $productSlug = $this->generateSlug($request->name);

        if ($productSlug) {

            $product = Product::find($id);

            if ($request->hasFile('image')) {

                unlink($product->image);
                
                $product_image = $request->image;
                $upload_dir = 'assets/uploads/products/';
                $image_name = time() . $product_image->getClientOriginalName();
                $product_image->move($upload_dir, $image_name);

                $product->image = $upload_dir . $image_name;
            }

            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->slug = $productSlug;

            $product->save();

            Session::flash('success', 'Product successfully updated.');
            return redirect()->route('products.index');
        } else {
            Session::flash('error', 'Product name could not contains only special characters');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            unlink($product->image);
            $product->delete();
            Session::flash('success', "Deleted Successfully.");
            return redirect()->back();
        } else {
            Session::flash('error', "Something went wrong, we could not complete your request, please try again.");
            return redirect()->back();
        }
    }

    /**
     * Generate the url slug from string
     * 
     * @param string $string
     * @return false // if string contains only special characters
     * @return string // valid slug string
     */
    protected function generateSlug($string)
	{
	    $string = preg_replace('~[^\pL\d]+~u', '-', $string);
	    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
	    $string = preg_replace('~[^-\w]+~', '', $string);
	    $string = trim($string, '-');
	    $string = preg_replace('~-+~', '-', $string);
	    $string = strtolower($string);
	    
	    return !empty($string) ? $string : false;
	}
}
