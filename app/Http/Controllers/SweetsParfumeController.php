<?php

namespace App\Http\Controllers;

use App\Models\SweetsParfume;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SweetsParfumeController extends Controller
{
    public function index()
    {
        return view('dashboard.sweets.index', [
            'data' => SweetsParfume::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.sweets.create', [
            'categories' => Categories::where('user_id', auth()->user()->id)->with('users')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'deskripsi' => 'required|max:255',
            'image' => 'image|file|max:5024',
            'link_product' => 'required|url',
            'harga' => 'required'
        ]);

        //cek gambar kosong atau tidak
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        SweetsParfume::create($validatedData);

        return redirect('/dashboard/sweets')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(SweetsParfume $id)
    {
        return view('dashboard.sweets.show', [
            'data' => $id,
        ]);
    }

    public function edit(SweetsParfume $id)
    {
        return view('dashboard.sweets.edit', [
            'data' => $id,
            'cat' => Categories::all()
        ]);
    }

    public function update(Request $request, SweetsParfume $id)
    {
        $rules = [
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'deskripsi' => 'required|max:255',
            'image' => 'image|file|max:5024',
            'link_product' => 'required|url',
            'harga' => 'required'
        ];

        $validatedData = $request->validate($rules);

        //cek gambar kosong atau tidak
        if ($request->file('image')) {
            //Hapus gambar lama
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        SweetsParfume::where('id', $id->id)->update($validatedData);

        return redirect('/dashboard/sweets')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(SweetsParfume $id)
    {

        if ($id->image) {
            Storage::delete($id->image);
        }

        SweetsParfume::destroy($id->id);

        return redirect('/dashboard/sweets')->with('success', 'Data berhasil dihapus!');
    }

    public function listParfume()
    {
        $list_data =  SweetsParfume::where('user_id', auth()->user()->id)->with('users');
        return Datatables::of($list_data)
            ->addColumn('kategori', function ($item) {
                return $item->categories->kategori;
            })
            ->addColumn('username', function ($item) {
                return $item->users->username;
            })
            ->addColumn('action', function ($item) {
                return $item->id;
            })
            ->editColumn('image', function ($item) {
                return asset('storage/' . $item->image);
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function ajaxParfume(Request $request)
    {
        $data = SweetsParfume::where('id', $request->id)->with('users')->first();
        $data->image = asset('storage/' . $data->image);
        return $data;
    }
}
