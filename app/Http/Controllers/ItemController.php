<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function demo(Request $request) {
        // If the user is logged in, find the correct store_id for the User
        if ($request->session()->get('team', 'none') === 'demo')
        {
            return view('demo', ['team' => $request->session()->get('team', 'none')]);
        } else {
            return view('no-team');
        }
    }

    public function index(Request $request)
    {
        if ($request->session()->get('team', 'none') === 'demo')
        {
            $i = Item::first();
            return response()->json([
            'pub_name' => $i->name,
            'pub_img' => $i->image,
            'pub_qty' => $i->qty,
            ], 200);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
	    return response()->json([
		'pub_name' => 'Watchtower No.1',
		'pub_img' => 'https://cms-imgp.jw-cdn.org/img/p/wp/202105/E/pt/wp_E_202105_md.jpg',
		'pub_qty' => '23',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
