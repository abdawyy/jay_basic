<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Apptraits;
use App\Models\Cities;

class CitiesController extends Controller
{
    use Apptraits;
    public $model = 'App\Models\Cities';
    public $url = '/admin/cities';
    public function edit(Request $request, $id = null)
    {
        // Retrieve the model instance to update
        $model = $this->model::find($id);

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255', // Validates that code is required and a string with max 255 characters
                'price' => 'required|numeric', // Validates that the discount_percentage is a number between 0 and 100
            ]);

            $attributes = [
                'id' => $id
            ];
            $values = [
                'name' => $request->name,
                'price' => $request->price,

            ];
            $model = self::updateOrCreate($this->model, $attributes, $values);

            if ($model) {
                return redirect()->route('cities.list')->with('success', 'your cities price has been successful saved.');
            } else {
                return redirect()->route('cities.list')->with('error', 'cannot be saved saved.');
            }
            // Optionally return a view with the model data for editing
        }

        return view('admin.cities.edit', compact('model'));
    }
    // Method to list types with search functionality
    public function list(Request $request)
    {
        // Get the search parameter from the request
        $search = $request->input('search');

        // Define the mapping of headers to fields
        $headerMap = [
            'ID' => 'id',
            'Name' => 'name',
            'Price' => 'price',
            'Created At' => 'created_at',
        ];

        // Use the search scope defined in the Type model (assuming it's implemented)
        $data = Cities::search($search, $headerMap)->paginate(10);

        // Define the headers for the table
        $headers = ['ID', 'Name', 'Price', 'Created At', 'Action'];

        // Prepare the rows by mapping through the types collection
        $rows =  $data->map(function ($data) {
            return [
                'ID' => $data->id,
                'Name' => $data->name,
                'Price' => $data->price,
                'Created At' => $data->created_at->format('m/d/Y'),
            ];
        });

        $url = $this->url;

        // Return the view with headers and rows data
        return view('admin.cities.list', compact('headers', 'rows', 'data', 'search', 'url'));
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
