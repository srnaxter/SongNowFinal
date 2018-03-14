<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commande;

class CommandController extends Controller
{
    public function getAdminIndex()
    {
        $commands=Commande::all();
        return view('commandes',['commands' => $commands]);
    }
    public function getCommandDelete($id)
    {
        $command = Commande::find($id);
        $command->delete();
        return redirect()->route('admin.commands')->with('info', 'Post deleted!');
    }
    public function getAdminEdit($id)
    {
        $command = Commande::find($id);
        $command->etat="accepter";
        $command->save();
        return redirect()->route('admin.commands');
    }
    public function postAdminUpdate(Request $request)
    {

        $product = Product::find($request->input('id'));
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $product->save();
        return redirect()->route('admin.index.menu');
    }
}
