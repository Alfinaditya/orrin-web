<?php

namespace App\Http\Controllers;

use App\Models\WomensParfume;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class WomensParfumeController extends Controller
{
    public function index()
    {
        return view('dashboard.womens.index', [
            'data' => WomensParfume::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.womens.create', [
            'categories' => Categories::where('user_id', auth()->user()->id)->with('users')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:1024',
            'harga' => 'required'
        ]);

        //cek gambar kosong atau tidak
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        WomensParfume::create($validatedData);

        return redirect('/dashboard/womens')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(WomensParfume $id)
    {
        return view('dashboard.womens.show', [
            'data' => $id,
        ]);
    }

    public function edit(WomensParfume $id)
    {

        return view('dashboard.womens.edit', [
            'data' => $id,
            'cat' => Categories::all()
        ]);
    }

    public function update(Request $request, WomensParfume $id)
    {
        $rules = [
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:1024',
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

        WomensParfume::where('id', $id->id)->update($validatedData);

        return redirect('/dashboard/womens')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(WomensParfume $id)
    {

        if ($id->image) {
            Storage::delete($id->image);
        }

        WomensParfume::destroy($id->id);

        return redirect('/dashboard/womens')->with('success', 'Data berhasil dihapus!');
    }

    public function listParfume()
    {
        // Log::alert('tes');
        $list_data =  WomensParfume::where('user_id', auth()->user()->id)->with('users');
        // Log::alert('halo');
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
        $data = WomensParfume::where('id', $request->id)->with('users')->first();
        $data->image = asset('storage/' . $data->image);
        return $data;
    }
}
