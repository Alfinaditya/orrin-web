<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.product.index', [
            'data' => Product::where('user_id', auth()->user()->id)
                ->with('users')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.product.create', [
            'categories' => Categories::where('user_id', auth()->user()->id)
                ->with('users')
                ->get(),
            'cat' => CategoryProduct::where('user_id', auth()->user()->id)
                ->with('users')
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'category_product_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required|max:255',
            'harga' => 'required',
            'link_product' => 'required|url',
            'image' => 'image|mimes:jpeg,jpg,png',
        ]);

        //cek gambar kosong atau tidak
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Product::create($validatedData);

        return redirect('/dashboard/product')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $id)
    {
        return view('dashboard.product.edit', [
            'data' => $id,
            'categories' => Categories::all(),
            'cat' => CategoryProduct::all(),
        ]);
    }

    public function update(Request $request, Product $id)
    {

        $rules = [
            'category_id' => 'required',
            'category_product_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required|max:255',
            'harga' => 'required',
            'link_product' => 'required|url',
            'image' => 'image|mimes:jpeg,jpg,png',
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

        Product::where('id', $id->id)->update($validatedData);

        return redirect('/dashboard/product')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(Product $id)
    {
        if ($id->image) {
            Storage::delete($id->image);
        }

        Product::destroy($id->id);

        return redirect('/dashboard/product')->with('success', 'Data berhasil dihapus!');
    }

    public function listParfume()
    {
        $list_data = Product::where('user_id', auth()->user()->id)
            ->with('users', 'categories', 'category_product')
            ->get();

        return Datatables::of($list_data)
            ->addColumn('kategori', function ($item) {
                // dd($item);
                return $item->categories->kategori;
            })
            ->addColumn('username', function ($item) {
                // dd($item->users);
                return $item->users->username;
            })
            ->addColumn('jenis', function ($item) {
                // dd($item->users);
                return $item->category_product->kategori;
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
        $data = Product::where('id', $request->id)
            ->with('users')
            ->first();
        $data->image = asset('storage/' . $data->image);
        return $data;
    }
}
