<?php

namespace App\Http\Controllers;

use App\Models\CasualsParfume;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CasualsParfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.casuals.index', [
            'data' => CasualsParfume::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.casuals.create', [
            'categories' => Categories::where('user_id', auth()->user()->id)->with('users')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCasualsParfumeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'deskripsi' => 'required|max:255',
            'image' => 'image|mimes:jpeg,jpg,png',
            'link_product' => 'required|url',
            'harga' => 'required'
        ]);

        //cek gambar kosong atau tidak
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        CasualsParfume::create($validatedData);

        return redirect('/dashboard/casuals')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CasualsParfume  $casualsParfume
     * @return \Illuminate\Http\Response
     */
    public function show(CasualsParfume $id)
    {
        return view('dashboard.casuals.show', [
            'data' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CasualsParfume  $casualsParfume
     * @return \Illuminate\Http\Response
     */
    public function edit(CasualsParfume $id)
    {
        return view('dashboard.casuals.edit', [
            'data' => $id,
            'cat' => Categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCasualsParfumeRequest  $request
     * @param  \App\Models\CasualsParfume  $casualsParfume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CasualsParfume $id)
    {
        $rules = [
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'deskripsi' => 'required|max:255',
            'image' => 'image|mimes:jpeg,jpg,png',
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

        CasualsParfume::where('id', $id->id)->update($validatedData);

        return redirect('/dashboard/casuals')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CasualsParfume  $casualsParfume
     * @return \Illuminate\Http\Response
     */
    public function destroy(CasualsParfume $id)
    {
        if ($id->image) {
            Storage::delete($id->image);
        }

        CasualsParfume::destroy($id->id);

        return redirect('/dashboard/casuals')->with('success', 'Data berhasil dihapus!');
    }

    public function listParfume()
    {
        $list_data =  CasualsParfume::where('user_id', auth()->user()->id)->with('users');
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
        $data = CasualsParfume::where('id', $request->id)->with('users')->first();
        $data->image = asset('storage/' . $data->image);
        return $data;
    }
}
