<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Apptraits;
use App\Models\User;
class userController extends Controller
{

    public $model='App\Models\User';
  //  public $assocatation='App\Models\productItems';

    public $url='/admin/user';
    public function list(Request $request)
    {
        // Get the search parameter from the request
        $search = $request->input('search');

        // Define the mapping of headers to fields
        $headerMap = [
            'ID' => 'id',
            'Name' => 'name',
            'Email'=>'email',
            'Created At' => 'created_at',
        ];

        // Use the search scope defined in the Type model (assuming it's implemented)
        $data = User::search($search, $headerMap)->paginate(10);

        // Define the headers for the table
        $headers = ['ID', 'Name', 'Created At','Action'];

        // Prepare the rows by mapping through the types collection
        $rows =  $data->map(function ($data) {
            return [
                'ID' => $data->id,
                'Name' => $data->name,

                'Created At' => $data->created_at->format('m/d/Y'),
            ];
        });

        $url=$this->url;

        // Return the view with headers and rows data
        return view('admin.user.list', compact('headers', 'rows', 'data', 'search','url'));
    }
}
