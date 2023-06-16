<?php

namespace App\Http\Controllers;

use App\Models\MensParfume;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class MensParfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mens.index', [
            'data' => MensParfume::where('user_id', auth()->user()->id)->with('users')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mens.create', [
            'categories' => Categories::where('user_id', auth()->user()->id)->with('users')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMensParfumeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required|max:255',
            'harga' => 'required',
            'link_product' => 'required|url',
            'image' => 'image|mimes:jpeg,jpg,png'
        ]);

        //cek gambar kosong atau tidak
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        MensParfume::create($validatedData);

        return redirect('/dashboard/mens')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MensParfume  $mensParfume
     * @return \Illuminate\Http\Response
     */
    public function show(MensParfume $id)
    {
        // dd($id);
        return view('dashboard.mens.index', [
            'data' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MensParfume  $mensParfume
     * @return \Illuminate\Http\Response
     */
    public function edit(MensParfume $id)
    {

        return view('dashboard.mens.edit', [
            'data' => $id,
            'cat' => Categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMensParfumeRequest  $request
     * @param  \App\Models\MensParfume  $mensParfume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MensParfume $id)
    {
        $rules = [
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'deskripsi' => 'required',
            'link_product' => 'required|url',
            'image' => 'image|mimes:jpeg,jpg,png',
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

        MensParfume::where('id', $id->id)->update($validatedData);

        return redirect('/dashboard/mens')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MensParfume  $mensParfume
     * @return \Illuminate\Http\Response
     */
    public function destroy(MensParfume $id)
    {

        if ($id->image) {
            Storage::delete($id->image);
        }

        MensParfume::destroy($id->id);

        return redirect('/dashboard/mens')->with('success', 'Data berhasil dihapus!');
    }


    public function listParfume()
    {
        $list_data =  MensParfume::where('user_id', auth()->user()->id)->with('users');
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
        $data = MensParfume::where('id', $request->id)->with('users')->first();
        $data->image = asset('storage/' . $data->image);
        return $data;
    }
}
