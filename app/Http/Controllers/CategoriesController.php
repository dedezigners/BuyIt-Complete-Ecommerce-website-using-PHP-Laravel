<?php

namespace App\Http\Controllers;

use App\Category;
use Session;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        if (request()->ajax()) {
            return response()->json(['data' => Category::latest()->get()]);
        }

        return view('admin.category.index', [
            'title' => 'Categories',
            'categories' => Category::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', [
            'title' => 'Create Category',
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
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);

        $category = $request->name;
        $slug = $this->generateSlug($category);

        if ($slug) {

            Category::create([
                'name' => $category,
                'slug' => $slug
            ]);

            Session::flash('success', "Category named $category created successfully.");
            return redirect()->route('categories.index');

        } else {
            Session::flash('info', "$category contains only special characters, this category could't completed.");
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
        $category = Category::find($id);
        
        if ($category) {
            return view('admin.category.edit', [
                'title' => 'Edit Category',
                'category' => Category::find($id)
            ]);
        } else {
            Session::flash('error', 'The category you requested to edit is not available.');
            return redirect()->route('categories.index');
        }
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
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $id],
        ]);

        $category = $request->name;
        $slug = $this->generateSlug($category);

        if ($slug) {

            $cat = Category::find($id);
            
            $cat->name = $category;
            $cat->slug = $slug;
            $cat->save();

            Session::flash('success', "Category named $category edited successfully.");
            return redirect()->route('categories.index');

        } else {
            Session::flash('info', "$category contains only special characters, this category could't completed.");
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
        $category = Category::find($id);
        if ($category) {
            $category->delete();
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
