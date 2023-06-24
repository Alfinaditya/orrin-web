<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function result()
    {
        $result = Categories::with('products')->count();
// dd('p');
        return view('dashboard.index', [
            'data' => $result
        ]);
    }
    
    public function index()
    {
        return view('dashboard.categories.index', [
            'data' => Categories::where('user_id', auth()->user()->id)->with('users')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Categories::where('user_id', auth()->user()->id)->with('users')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:255|unique:categories',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Categories::create($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Categories $id)
    {
        return view('dashboard.categories.edit', [
            'data' => $id,
            'cat' => Categories::all()
        ]);
    }

    public function update(Request $request, Categories $id)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:255|unique:categories'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Categories::where('kategori', $id->kategori)->update($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Data berhasil dihapus!');
    }

    public function destroy(Categories $id)
    {
        if ($id->image) {
            Storage::delete($id->image);
        }

        Categories::destroy($id->id);

        return redirect('/dashboard/kategori')->with('success', 'Data berhasil diubah!');
    }

    public function listParfume()
    {
        $list_data =  Categories::where('user_id', auth()->user()->id)->with('users');

        return Datatables::of($list_data)
            ->addColumn('kategori', function ($item) {
                return $item->kategori;
            })
            ->addColumn('action', function ($item) {
                return $item->id;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function ajaxParfume(Request $request)
    {
        $data = Product::where('id', $request->id)
            ->with('users')
            ->first();
        $data->image = asset('storage/' . $data->image);
        return $data;
    }
}
