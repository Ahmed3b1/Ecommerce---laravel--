<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use App\Models\Category; 
use App\Models\ProductPhoto; 
use SimpleSoftwareIO\QrCode\Facades\QrCode ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D ;
use function Laravel\Prompts\select;

class ProductController extends Controller
{
    public function AddProduct() {

        $new = Auth::user() ;

        $allcategories = Category::all() ;

        return view('Products.addproduct',[ 'allcategories' => $allcategories]);

    }

    public function ProductsTable() {

        $products = Product::all() ;

        return view('Products.ProductsTable',[ 'products' => $products]);

    }

    public function showProduct($productid) {

        $product = Product::with('Category' , 'productPhotos')->find($productid) ;

        $relatedProducts = Product::where('category_id' , $product->category_id)->where('id', '!=' , $productid)
        ->inRandomOrder()->limit(3)->get() ; 

        return view('Products.showProduct',[ 'product' => $product , 'relatedProducts' => $relatedProducts]);

    }

    public function AddProductImages($productid) {

        $product = Product::find($productid) ;

        $productImages = ProductPhoto::where('product_id' , $productid)->get() ;

        return view('Products.AddProductImage',[ 'product' => $product , 'productImages' => $productImages ]);

    }

    public function StoreProductImage (Request $request) {

        $request->validate([
            'product_id' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $photo = new ProductPhoto() ;
        $photo->product_id = $request->product_id ;

        if($request->has('photo')) {

            $path = $request->photo->move( 'uploads' , $request->photo ) ; 

            $photo->imagepath = $path ;
        }

        $photo->save() ;

        return redirect('/ProductsTable') ;
        
    }

    public function EditProduct($productid = null) {

        if($productid != null){
            
            $currentProduct = Product::find($productid);
            if($currentProduct == null) {
                abort("403" , "can not find the product" ) ;
            }
            $allcategories = Category::all();

            $qrCode= QrCode::size(200)->generate('www.codewithsaad.com') ;

            $barcode= DNS1D::getBarcodeHTML('00201069873029' ,'C39') ;

            return view('Products.editproduct' , ['product' => $currentProduct , 'allcategories' => $allcategories ,
             'qrCode' => $qrCode , 'barcode' => $barcode]) ;

        } else {

            return redirect('/addproduct') ;

        }


    }

    public function RemoveProduct($productid = null ) {

        if ($productid != null ) {

            $currentProduct = Product::find($productid);
            $currentProduct->delete();

            return redirect('/products') ;

        } 

        else {

            abort(403 , "please enter product id in the route") ;

        }

    }

    public function Removeproductphoto($imageid = null ) {

            $photo = ProductPhoto::find($imageid);
            $photo->delete();

            return redirect('/ProductsTable') ;

    }

    public function StoreProduct(Request $request) {

        $request->validate([
            'name' => ['required' , 'max: 10'] , 
            'price' => 'required|integer' ,
            'quantity' => 'required|integer',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);


        // Product Editing 
        if($request->id) {

            $currentProduct = Product::find($request->id) ;
            $currentProduct->name = $request->name ;
            $currentProduct->price = $request->price ;
            $currentProduct->quantity = $request->quantity ;
            $currentProduct->description = $request->description ;
            $currentProduct->category_id = $request->category_id ;

            if($request ->has('photo')) {
                $path= $request -> photo -> move ('uploads' , $request->photo) ; 
                $currentProduct -> imagepath = $path ;
            }

            $currentProduct->save() ;
            return redirect('/products') ;

        } else {

            // Product Adding
            $newProduct = new Product() ;
            $newProduct -> name = $request -> name ;
            $newProduct -> price = $request -> price ;
            $newProduct -> quantity = $request -> quantity ;
            $newProduct -> description = $request -> description ;
            $newProduct -> imagepath =  'imagepath' ;
            $newProduct -> category_id =  $request -> category_id ;

            // $path= $request -> photo -> move ('uploads' , 
            //         Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()) ;

            $path = '' ;

            if($request ->has('photo')) {
                $path= $request -> photo -> move ('uploads' , $request->photo) ; 
            }

            $newProduct -> imagepath = $path ;

            $newProduct->save() ;

            return redirect('/') ;


        }
        
    }

    public function getAllProducts() {

        $products = Product::all();

        return response()->json([
            'status' => true,
            'data' => $products
        ]);

    }
}
