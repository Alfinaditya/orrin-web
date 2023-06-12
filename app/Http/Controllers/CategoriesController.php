<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.index', [
            'data' => Categories::where('user_id', auth()->user()->id)->with('users')->get(),
        ]);
    }

    public function cat()
    {

        return view('dashboard.categories.index', [
            'data' => Categories::where('user_id', auth()->user()->id)->with('users')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Categories::where('user_id', auth()->user()->id)->with('users')->get()
        ]);
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
            'kategori' => 'required|max:255|unique:categories',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Categories::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $id)
    {
        return view('dashboard.categories.edit', [
            'data' => $id,
            'cat' => Categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $id)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:255|unique:categories'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Categories::where('kategori', $id->kategori)->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $id)
    {
        if ($id->image) {
            Storage::delete($id->image);
        }

        Categories::destroy($id->id);

        return redirect('/dashboard/categories')->with('success', 'Data berhasil diubah!');
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
}
