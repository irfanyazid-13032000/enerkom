<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('item/index-item');
        // return Item::with('category')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function getItems(Request $request)
     {
        $data = Item::with('category')->get();
        return DataTablesDataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $actionBtn = '<a onclick="editModal('.$row->id.')" class="edit btn btn-success btn-sm">Edit</a> <a onclick="konfirmasi('.$row->id.')" class="delete btn btn-danger btn-sm">Delete</a>';
            return $actionBtn;
        })
        ->make(true);
     }

    public function create()
    {
        $categories = Category::all();

        return view('item.item_create_modal', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'stock' => 'required|numeric',
            'category_id' => 'required',
        ]);
    
        Item::create($validatedData);
        return redirect('/item');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $item = Item::find($id);
        return view('item.item_update_modal', ['categories' => $categories,'item'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'stock' => 'required|numeric',
            'category_id' => 'required',
        ]);


        $item = Item::findOrFail($id);

        $item->update($validatedData);

        return redirect('/item');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/item');
    }
}
