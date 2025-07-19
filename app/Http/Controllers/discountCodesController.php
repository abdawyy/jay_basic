<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Apptraits;
use App\Models\discountCodes;

class discountCodesController extends Controller
{
    use Apptraits;
    public $model='App\Models\discountCodes';
    public $url='/admin/discountCodes';
    public function edit( Request $request,$id = null){
  // Retrieve the model instance to update
  $model = $this->model::find($id);

        if ($request->isMethod('post')) {
            $request->validate([
                'code' => 'required|string|max:255', // Validates that code is required and a string with max 255 characters
                'discount_percentage' => 'required|numeric|min:0|max:100', // Validates that the discount_percentage is a number between 0 and 100
                'expiry_date' => 'required|date|after:today', // Validates expiry_date as a date and it must be a future date
            ]);

        $attributes=[
            'id'=>$id
        ];
        $values=[
            'code'=>$request->code,
            'discount_percentage'=>$request->discount_percentage,
            'expiry_date'=>$request->expiry_date,

        ];
        $model = self::updateOrCreate($this->model,$attributes,$values);

        if($model){
            return redirect()->route('discountCodes.list')->with('success', 'your Discount Code has been successful saved.');

        }else{
            return redirect()->route('discountCodes.list')->with('error', 'cannot be saved saved.');

        }
         // Optionally return a view with the model data for editing
    }

    return view('admin.discountCodes.edit', compact('model'));


    }
    // Method to list types with search functionality
    public function list(Request $request)
    {
        // Get the search parameter from the request
        $search = $request->input('search');

        // Define the mapping of headers to fields
        $headerMap = [
            'ID'=>'id',
            'Code' => 'code',
            'Discount Percentage' => 'discount_percentage',
            'Expiry Date' => 'expiry_date',
        ];

        // Use the search scope defined in the Type model (assuming it's implemented)
        $data = discountCodes::search($search, $headerMap)->paginate(10);

        // Define the headers for the table
        $headers = ['ID', 'Code', 'Discount Percentage','Expiry Date','Action'];

        // Prepare the rows by mapping through the types collection
        $rows =  $data->map(function ($data) {
            return [
                'ID' => $data->id,
                'Code' => $data->code,
                'Discount Percentage'=>$data->discount_percentage . ' %',
                'Expiry Date'=>$data->expiry_date,
                'Created At' => $data->created_at->format('m/d/Y'),
            ];
        });

        $url=$this->url;

        // Return the view with headers and rows data
        return view('admin.discountCodes.list', compact('headers', 'rows', 'data', 'search','url'));
    }
    public function delete($id)
    {
        // Call the deleteRecord function from the trait
        $isDeleted = self::deleteRecord($this->model, $id);

        // Handle the flash message based on the result
        if ($isDeleted) {
            // Success flash message
            return redirect()->back()->with('success', 'Record deleted successfully.');
        } else {
            // Failure flash message
            return redirect()->back()->with('error', 'Failed to delete the record. Record may not exist.');
        }
    }
}
