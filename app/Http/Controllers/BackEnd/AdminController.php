<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use App\Models\user;
use App\Models\order;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $totalProducts = Product::count(); 
        $todayOrders = Order::whereDate('created_at', Carbon::today())->count();
        $totalOrders = Order::count();
        return view('BackEnd.page.dashboard', compact('totalProducts','todayOrders','totalOrders'));
    }

    public function user(){
        $users = User::orderBy('id', 'desc')->get();
        return view('BackEnd.Auth.user',compact('users'));
    }
    public function login(){
        return view('BackEnd.Auth.login');
    }



public function auth(Request $request){



        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {



            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }else{
            return back()->with('error', 'Email And Password Not Valid');

        }

    }


    public function create(){
        return view('BackEnd.Auth.register');
    }

    public function store(Request $request)
{


    // Validate the request inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'required|min:6|confirmed',
    ]);


    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    if( $request->hasFile('image') ){
        $image = $request->file('image');

        $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
        $imagePath          = 'storage/images/';
        $image->move($imagePath, $imageName);

        $user->image   = $imagePath . $imageName;
    }
    $user->password = Hash::make($request->password);
    $user->status = $request->status;
    $user->save();


        return redirect()->route('admin.user')->with('success', 'User created successfully.');



}

public function show($id) {
    $user = User::find($id);
    return view('BackEnd.Auth.edit', compact('user'));
}

public function update(Request $request){

    $id=$request->id;
    $user     =  User::find($request->id);
    $user->name = $request->name;
    $user->email = $request->email;

    if( $request->hasFile('image') ){
        $image = $request->file('image');

        if( !empty($uer->image) && file_exists($user->image) ){
            unlink($user->image);
       }
        $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
        $imagePath          = 'storage/images/';
        $image->move($imagePath, $imageName);

        $user->image   = $imagePath . $imageName;
    }
    $user->password = Hash::make($request->password);
    $user->status = $request->status;
    $user->save();
    return redirect()->route('admin.user')->with('success', 'Update successfully.');
}

public function delete($id){

    $user     =  User::find($id);
    if( !empty($user->image) && file_exists($user->image) ){
        unlink($user->image);
   }
   $user->delete();
   return redirect()->back()->with('success', 'User delete successfully');

}


public function status($id)
    {
        $user = User::find($id);
        if($user->status == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->update();
        return redirect()->back()->with('success', 'Blog Status has been changed successfully');

    }


}
