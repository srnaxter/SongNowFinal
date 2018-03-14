<?php

namespace App\Http\Controllers;

use App\Product;
use App\Menu;
use Illuminate\Http\Request;

use Auth;

class MenuController extends Controller
{
    /*public function getIndex()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('layout', ['products' => $products]);
    }*/

    public function getAdminIndex()
    {
        $user = Auth::user();
        //$products=Product::all();
        $menus = Menu::where("user_id", "=", $user->id)->get();
        //$products=Product::where("menu_id", "=", $menu->id)->get();

        return view('layout',['menus' => $menus]);
    }

    public function getPost($id)
    {
        $menu = Menu::where('id', $id)->first();
        return view('menu', ['menu' => $menu]);
    }

    public function getAdminCreate()
    {
        return view('addMenu');
    }

    public function getAdminEdit($id)
    {
        $menu = Product::find($id);
        return view('editMenu', ['menu' => $menu, 'menuId' => $id]);
    }
    public function getAdminEditt($id)
    {

        $menu = Menu::find($id);
        return view('editMenu', ['menu' => $menu, 'menuId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {

        $user = Auth::user();
        if (!$user) {
            return redirect()->back();
        }
        $menu = new Menu([
            'name' => $request->input('name'),

        ]);




        $user->menus()->save($menu);

        return redirect()->route('admin.index.menu')->with('info', 'Post created, Title is: ' . $request->input('title'));
    }

    public function postAdminUpdate(Request $request)
    {

        $menu = Product::find($request->input('id'));
        $menu->name = $request->input('name');

        $menu->save();
        return redirect()->route('admin.index.menu');
    }

    public function getAdminDelete($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('admin.index.menu')->with('info', 'Post deleted!');
    }
}
