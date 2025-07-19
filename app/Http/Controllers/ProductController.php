<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\productItems;
use App\Models\Category;
use App\Models\Type;
use App\Models\productImages;

use App\Traits\Apptraits;

class ProductController extends Controller
{
    use Apptraits;
    public $model='App\Models\products';
    public $assocatation='App\Models\productItems';

    public $url='/admin/products';
    public $assocatationImage='App\Models\productImages';




    public $images='App\Models\productImages';
    public function edit(Request $request, $id = null)
{
    // Retrieve the model instance to update (if $id is provided

    $model = $this->model::with('category','productItems','productImages')->find($id);




    if ($request->isMethod('post')) {
        // Validate the incoming request

        self::filterQuantities($request );

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',  // Allow null for description if it's optional
            'price' => 'required|numeric|min:0', // Ensure price is a positive number
            'sale' => 'nullable|numeric|min:0|max:100', // Sale percentage between 0 and 100
            'quantities' => 'required_without_all:quantities.S,quantities.M,quantities.L,quantities.XL,quantities.XXL,quantities.XXXL|array',
            'category_id' => 'required|integer|exists:categories,id', // Ensure category exists
            'type_id' => 'required|integer|exists:type,id', // Ensure category exists

            'color' => 'required|string|max:255',
            'image' => 'nullable|array', // Allow an array of images
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Each image validation
        ]);

        // Prepare the attributes and values for update or creation
        $attributes = [
            'id' => $id
        ];

        $values = [
            'name' => $request->name,
            'price'=>$request->price,
            'sale'=>$request->sale,
            'category_id'=>$request->category_id,
            'type_id'=>$request->type_id,
            'color'=>$request->color,
            'description'=>$request->description
        ];
        $quantities=$request->quantities;
        $files=$request->images;
        $imagesModel = new ProductImages();





        // Use updateOrCreate to handle update or creation
        $model =self::updateOrCreate( $this->model,$attributes ,$values);

        // Redirect with success or error messages
        if ($model) {
            self::uploadImages($request , $imagesModel, $model->id);

            $this->saveProductItems( $quantities,$model);
            return redirect()->route('products.list')->with('success', 'Your product has been successfully saved.');
        } else {
            return redirect()->route('products.edit')->with('error', 'Your product could not be saved.');
        }
    }    $categories=Category::all();
        $types=Type::all();


    // Return the view with the model data for editing
    return view('admin.product.edit', compact('model','categories','types'));
}
public function saveProductItems($quantities,$model){


    foreach($quantities as $size =>$quantity){
        // $productItem = ProductItems::where('products_id', $model->id)
        // ->where('size', $size)
        // ->get();

        $values =[
            'quantity'=> $quantity,
            'size'=>$size,
            'products_id'=>$model->id
        ];


  // Define the attributes to check for existence
  $attributes = [
    'products_id' => $model->id,
    'size' => $size
];

    self::updateOrCreate($this->assocatation,$attributes, $values);
}
}
public function list(Request $request)
{
    // Get the search parameter from the request
    $search = $request->input('search');

    // Define the mapping of headers to fields
    $headerMap = [
        'ID' => 'id',
        'Name' => 'name',
        'Price'=>'price',
        'Sale'=>'sale',
        'Type'=>'Type.name',
        'Description'=>'description',
        'Color'=>'color',
        'Category Name' => 'Category.name', // Assuming relation is named `category`
        'Created At' => 'created_at',
    ];

    // Use the search scope defined in the Type model (assuming it's implemented)
    $data = products::with('category','type')->search($search, $headerMap)->paginate(10);

    // Define the headers for the table
    $headers = ['ID', 'Name', 'Created At', 'Price','Sale','Type','Description','Color','Category Name','Action'];

    // Prepare the rows by mapping through the types collection
    $rows =  $data->map(function ($data) {
        return [
            'ID' => $data->id,
            'Name' => $data->name,
            'Price'=>$data->price,
            'Sale'=>$data->sale,
            'Type'=>$data->type->name,
            'Description'=>$data->description,
            'Color'=>$data->color,
            'Category Name'=>$data->category->name,
            'Created At' => $data->created_at->format('m/d/Y'),
        ];
    });

    $url=$this->url;

    // Return the view with headers and rows data
    return view('admin.product.list', compact('headers', 'rows', 'data', 'search','url'));
}
public function delete($id)
{
    // Call the deleteRecord function from the trait
    $isDeleted = self::deleteRecord($this->model, $id , true);

    // Handle the flash message based on the result
    if ($isDeleted) {
        // Success flash message
        return redirect()->back()->with('success', 'Record deleted successfully.');
    } else {
        // Failure flash message
        return redirect()->back()->with('error', 'Failed to delete the record. Record may not exist.');
    }
}
public function productWebList(Request $request, $id = null)
{
    // Check if the request is a POST request
    if ($request->isMethod('post')) {
        // Retrieve search criteria from the POST request
        $search = $request->input('search');

        // Define the mapping of headers to fields, including related model fields

            // Default header map if not provided in the request
            $headerMap = [
                'ID' => 'id',
                'Name' => 'name',


            ];


        // Use the search scope defined in the Type model (assuming it's implemented)
        $data =  products::search($search, $headerMap)
            ->with([
                'category',       // Fetch the associated category
                'type',           // Fetch the associated type
                'orderItems',     // Fetch the associated order items
                'shoppingCart',   // Fetch shopping cart items
                'productItems',   // Fetch product items
                'productImages'   // Fetch product images
            ])->paginate(10); // Adjust the number to change the items per page

        // Check if a category ID is provided and filter products accordingly
        if ($id) {
            $data = products::where('category_id', $id)
                ->with(['category', 'type', 'orderItems', 'shoppingCart', 'productItems', 'productImages'])
                ->paginate(10);
        }

        // Fetch all categories to display in the filter (for the sidebar or dropdown)
        $categories = Category::all();
        $categoryName = Category::where('id', $id)->first();
        // Return the view with the products, categories, and the selected category ID
    }else{



    // For non-POST requests (GET or other types), show the products without search/filtering
    // You can provide default data or show the initial unfiltered products
    $data = products::with([
        'category',       // Fetch the associated category
        'type',           // Fetch the associated type
        'orderItems',     // Fetch the associated order items
        'shoppingCart',   // Fetch shopping cart items
        'productItems',   // Fetch product items
        'productImages'   // Fetch product images
    ])->paginate(10);
  // Check if a category ID is provided and filter products accordingly
  if ($id) {
    $data = products::where('category_id', $id)
        ->with(['category', 'type', 'orderItems', 'shoppingCart', 'productItems', 'productImages'])
        ->paginate(10);
}

    $categories = Category::all();
    $categoryName = Category::where('id', $id)->first();
}

    return view('product.list', compact('data', 'categories', 'id', 'categoryName'));
}

 public function productWebShow($id)
 {
     // Fetch the product along with its related models using eager loading
     $product = products::with([
         'category',         // Fetch the associated category
         'type',             // Fetch the associated type
         'orderItems',       // Fetch the associated order items
         'shoppingCart',     // Fetch shopping cart items
         'productItems',     // Fetch product items
         'productImages'     // Fetch product images
     ])->find($id);

     // Check if the product exists
     if (!$product) {
         return redirect()->back()->with('error', 'Product not found');
     }

     // Return the product data to a view
     return view('product.show', compact('product'));
 }
 public function deleteImage($id){
        // Call the deleteRecord function from the trait
        $isDeleted = self::deletePerImage($this->assocatationImage, $id , true);

        // Handle the flash message based on the result
        if ($isDeleted) {
            // Success flash message
            return redirect()->back()->with('success', 'Image deleted successfully.');
        } else {
            // Failure flash message
            return redirect()->back()->with('error', 'Failed to delete the image. Image may not exist.');
        }

 }


}
