<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WishlistController extends Controller
{

    public function index()
    {
        $data = Wishlist::raw('CONCAT(wishlist.name) as wishlistname')
            ->Join('users', 'users.id', '=', 'wishlist.user_id')
            ->orderBy('user_id')
            ->get(['wishlist.*', 'users.name as user_name']);
        return view('wishlist.list')->with('wishlist', $data);
    }


    public function create()
    {
        return view('wishlist.create');
    }

    public function store(Request $request)
    {

        if (!Auth::check()) { return; }

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move(public_path('/images'), $fileNameToStore);
        } else {
            $fileNameToStore = 'null.jpg';
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::id();
        $wishlist->name = $request->name;
        $wishlist->thumbnail_name = $fileNameToStore;
        $wishlist->description = $request->description;
        $wishlist->price = $request->price;
        $wishlist->product_link = $request->product_link;
        $wishlist->save();

        return redirect('wishlist');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Wishlist::where($where)->first();
        return view('wishlist.edit')->with('wishlist', $data);
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) { return; }

        $request->validate([
            'name' => 'required',
            'image' => 'required|file',
            'product_link' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $update = [
            'name' => $request->name,
            'description' => $request->description,
            'product_link' => $request->product_link,
            'price' => $request->price
        ];

        if ( $request->hasFile('image') ) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move(public_path('/images'), $fileNameToStore);
            $update = Arr::add($update, 'thumbnail_name', $fileNameToStore);
        }  else {
            $fileNameToStore = 'null.jpg';
            $update = Arr::add($update, 'thumbnail_name', $fileNameToStore);
        }


        Wishlist::where('id', $id)->update($update);
        return redirect('wishlist');
    }


    public function destroy($id)
    {
        Wishlist::where('id',$id)->delete();
        return redirect('wishlist');
    }
}
