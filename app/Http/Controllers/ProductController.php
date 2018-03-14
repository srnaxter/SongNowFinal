<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Menu;
use DB;
use Auth;


class ProductController extends Controller
{
    /*public function getIndex()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('layout', ['products' => $products]);
    }*/

    public function getAdminIndex()
    {
        //$user = Auth::user();

        $products=Product::all();
        //$products = Product::where("user_id", "=", $user->id)->get();
        return view('layout',['products' => $products]);
    }

    public function getPost($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product', ['product' => $product]);
    }

    public function getAdminCreate()
    {
        $user = Auth::user();
        //$products=Product::all();
        $menus = Menu::where("user_id", "=", $user->id)->get();
        //$products=Product::where("menu_id", "=", $menu->id)->get();


        return view('addProduct',['menus' => $menus]);
    }

    public function getAdminEdit($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $menus = Menu::where("user_id", "=", $user->id)->get();
        return view('editProduct', ['product' => $product, 'productId' => $id, 'menus' => $menus]);
    }
    public function getAdminEditt($id)
    {

        $product = Product::find($id);
        return view('editProduct', ['product' => $product, 'productId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {
        if( $request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path(). '/images/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $url =$filename;


        }
        $user = Auth::user();
        if (!$user) {
            return redirect()->back();
        }




        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image'=>$url
        ]);
        //$menu = Menu::where('name',$request->input('type') )->first();
        $menu = Menu::where("id","=",$request->input('type') )->first();





        $menu->products()->save($product);

        return redirect()->route('admin.index.menu')->with('info', 'Post created, Title is: ' . $request->input('title'));
    }

    public function postAdminUpdate(Request $request)
    {

        $product = Product::find($request->input('id'));
        $product->name = $request->input('name');
        $product->menu_id = $request->input('type');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $product->save();
        return redirect()->route('admin.index.menu');
    }

    public function getAdminDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.index.menu')->with('info', 'Post deleted!');
    }

}
