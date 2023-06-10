<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portofolio;
use App\Models\category;

class portofolioController extends Controller
{
    public function index()
    {
        $portfolios = Portofolio::with(['categories'])->get();
        $categories = Category::all();
        return view('portofolio.index',compact('portfolios','categories'));
    }
    

    public function create()
    {
        $categories = category::all();
        return view('portofolio.create', compact('categories'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
          'photo' => 'required',
            'nama' => 'required',
            'description' => 'required',
        ]);

        $imageName = $request->file('photo')->store('upload', ['disk' => 'public']);

            $datas = new portofolio;
            $datas->id_category = $request->id_category;
            $datas->photo ='/storage/' . $imageName;
            $datas->nama = $request->nama;
            $datas->description = $request->description;
            $datas->save();

            return redirect()->route('portofolios.index')->with('status' ,$request->nama. '  Data berhasil ditambahkan!');
        
    }

    public function show(string $id)
    {

        $admins = portofolio::find($id);
        return view('portofolio.show', compact('admins'));
      
    }

    public function edit(string $id)
    {

        $admins = portofolio::find($id);
        return view('portofolio.edit', compact('admins'));
        
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama' => 'required',
            'description' => 'required',
          ]);
  
              $datas = portofolio::find($id);

              $datas->nama = $request->nama;
              $datas->description = $request->description;
              $datas->save();
  
              return redirect()->route('portfolios.index')->with('status',$request->nama. '  Data berhasil diubah!');
        
    }


    public function destroy(string $id)
    {
        $data = portofolio::find($id);
    
        if ($data) {
            $data->delete();
    
            return redirect()->route('portfolios.index')->with('status',$data->nama. '  Data berhasil dihapus!');
        } else {
            return redirect()->route('portfolios.index')->with('status', '  Data tidak ditemukan!');
        }
    }
    
}
