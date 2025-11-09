<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; 
use App\Models\Product; 
use App\Models\Review; 
use App\Models\User; 


class FirstController extends Controller
{

    public function MainPage() {

        $new = Auth::user() ;

        $categories = Category::all();
        return view('welcome' , ['categories' => $categories ]);

    }

    public function reviews() {

        $reviews = Review::all() ;
        return view('reviews' , ['reviews' => $reviews ]);

    }

    public function user() {

        $user = Auth::user() ;

        return view('user' , ['user' => $user ]);

    }

    public function StoreUserData(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'imagepath' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $currentUser = Auth::user();

        $currentUser->name = $request->name;
        $currentUser->email = $request->email;
        $currentUser->phone = $request->phone;
        $currentUser->country = $request->country;
        $currentUser->address = $request->address;

        if ($request->hasFile('imagepath')) {
            $file = $request->file('imagepath');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $currentUser->imagepath = $filename;
        }

        $currentUser->save();

        return redirect('/user');
    }


    public function storeReview(Request $request) {

        $request->validate([
            'name' => ['required' , 'max: 100'] , 
            'phone' => 'required' ,
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $newReview = new Review() ;
        $newReview -> name = $request -> name ;
        $newReview -> phone = $request -> phone ;
        $newReview -> subject = $request -> subject ;
        $newReview -> email = $request -> email ;
        $newReview -> message = $request -> message ;

        $newReview->save() ;
        return redirect('/reviews') ;

    }

    public function GetCategortProducts($catid = null) {

        if($catid){
            $result = Product::where('category_id' , $catid )->paginate(6);
            return view('product' , ['products' => $result ]);
        } 
        else {
            $result = Product::paginate(6); 
            return view('product' , ['products' => $result ]);
        }   

    }

    public function GetAllCategortywithProducts() {

        $categories = Category::all() ;
        $products = Product::all() ;

        return view('category' , [ 'products' => $products , 'categories' => $categories ]);

    }
}
