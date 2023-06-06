<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = category::all();
        return view('category.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'jenis' => 'required',
        ]);

            $datas = new category;
            $datas->jenis = $request->jenis;
            $datas->save();

            return redirect()->route('categories.index')->with('status' ,$request->jenis_category. '  Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admins = category::find($id);
        return view('category.edit', compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis' => 'required',
        ]);
    
        $category = Category::find($id);
        $category->jenis = $request->jenis;
        $category->save();
    
        return redirect()->route('categories.index')->with('status', $request->jenis . ' Data berhasil diubah!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = category::find($id);
        if ($data){
            $data->delete();
            return redirect()->route('categories.index')->with('status' ,'Data berhasil dihapus!');
        } else {
            return redirect()->route('categories.index')->with('status' ,'Data gagal dihapus!');
        }
    }
}
