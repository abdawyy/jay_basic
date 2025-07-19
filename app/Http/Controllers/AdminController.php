<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Traits\Apptraits;
use App\Models\orders;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Show the login form for admin.
     */
    use Apptraits;

    public $model = 'App\Models\Admin';

    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle the admin login request.
     */
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
       

        // Attempt to log the admin in
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // Redirect to admin dashboard on successful login
            return redirect()->route("admin.dashboard")->with('success', 'Login successful');
        }

        // Return with error if login failed
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }
    public function logout(Request $request)
{
    // Log out the admin user
    Auth::guard('admin')->logout();

    // Invalidate the session and regenerate the CSRF token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect to the login page with a success message
    return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
}

    
    
    

    /**
     * Show the registration form for admin.
     */
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    /**
     * Handle the admin registration request.
     */
    public function register(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new admin
        Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to the admin login page after registration
        return redirect()->route('admin.login')->with('success', 'Registration successful. Please log in.');
    }

    /**
     * Show the admin dashboard (only accessible when logged in).
     */
    public function index()
    {
        // Get the total number of users
        $totalUsers = User::count();

        // Get the total number of orders
        $totalOrders = orders::count();

        // Get the sum of the total amount of all orders
        $totalAmount = orders::sum('total_amount');

        return view('admin.index', compact('totalUsers', 'totalOrders', 'totalAmount'));
    }
    public function list(Request $request)
    {
        // Get the search parameter from the request
        $search = $request->input('search');

        // Define the mapping of headers to fields
        $headerMap = [
            'ID' => 'id',
            'Name' => 'username',
            'Email' => 'email',
            'Created At' => 'created_at',
        ];

        // Use the search scope defined in the AppTrait
        $admins = Admin::search($search, $headerMap)->paginate(10);

        // Define the headers for the table
        $headers = ['ID', 'Name', 'Email', 'Created At', 'Action'];

        // Prepare the rows by mapping through the admins collection
        $rows = $admins->map(function ($admin) {
            return [
                'ID' => $admin->id,
                'Name' => $admin->username,
                'Email' => $admin->email,
                'Created At' => $admin->created_at->format('m/d/Y'),
            ];
        });
        $url = '/admin/list';

        // Return the view with headers and rows data
        return view('admin.admin.list', compact('headers', 'rows', 'admins', 'search', 'url'));
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
    public function orderList(Request $request)
    {
        // Get the search parameter from the request
        $search = $request->input('search');

        // Define the mapping of headers to fields
        $headerMap = [
            'ID' => 'id',
            'User' => 'user.name',
            'Email' => 'user.email',
            'Total Amount' => 'total_amount',
            'Status' => 'status',
            'Code' => 'discountCodes.code',
            'City' => 'cities.name',
            'Created At' => 'created_at',
        ];

        // Use the search scope defined in the AppTrait
        $data = orders::search($search, $headerMap)->paginate(10);

        // Define the headers for the table
        $headers = ['ID', 'Name', 'Email', 'Total Amount', 'Created At', 'Code', 'City', 'Status', 'Action'];

        // Prepare the rows by mapping through the data collection
        $rows = $data->map(function ($order) {
            return [
                'ID' => $order->id,
                'Name' => $order->user->name ?? 'N/A', // Use 'N/A' if user is null
                'Email' => $order->user->email ?? 'N/A', // Use 'N/A' if email is null
                'Total Amount' => $order->total_amount,
                'Status' => $order->status,
                'City' => $order->cities->name  ?? 'N/A',
                'Code' => $order->discountCodes->code ?? 'N/A', // Use 'N/A' if discountCode is null
                'Created At' => $order->created_at->format('m/d/Y'),
            ];
        });

        $url = '/admin/order';
        return view('admin.order.list', compact('headers', 'rows', 'data', 'search', 'url'));
    }
    public function orderShow($id)
    {
        // Retrieve the order with its related data, including product and size for orderItems
        $order = orders::with([
            'user',
            'user.address',            // Load the user related to the order
            'discountCodes',   // Load the discount codes related to the order
            'cities',          // Load the city related to the order
            'orderItems.product', // Load products for each order item
            'orderItems.productItems',    // Load sizes for each order item
            'payments'         // Load all payments related to the order
        ])->find($id);

        // Check if the order exists
        if (!$order) {
            // Redirect back with an error message if the order is not found
            return redirect()->back()->with('error', 'Order not found');
        }

        // Pass the order data to the view
        return view('admin.order.show', compact('order'));
    }
    public function changeOrderStatus(Request $request, $id)
    {
        $order = orders::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        // Validate and update the status
        $request->validate([
            'status' => 'required|string|max:255'
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully');
    }
    public function userShow($id)
    {
        // Retrieve the order with its related data, including product and size for orderItems
        $user = User::with([
            'address',  // Load all addresses associated with the user
            'order.user',          // Load the user for each order
            'order.discountCodes',  // Load the discount code related to the order
            'order.cities'           // Load the city related to the order
        ])->find($id);

        // Check if the order exists
        if (!$user) {
            // Redirect back with an error message if the order is not found
            return redirect()->back()->with('error', 'user not found');
        }

        // Pass the order data to the view
        return view('admin.user.show', compact('user'));
    }
}
