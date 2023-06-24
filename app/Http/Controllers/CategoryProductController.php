<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{
    public function index(CategoryProduct $id)
    {
        return view('dashboard.index', [
            'data' => CategoryProduct::where('user_id', auth()->user()->id)
                ->with('users')
                ->get(),
            'id' => $id
        ]);
    }

    public function detail(CategoryProduct $id, Request $request)
    {
        return view('dashboard.detail', [
            'id' => $id,
            'data' => CategoryProduct::with('products')->where('id', '=', 'category_product_id' )
        ]);
    }

    public function show()
    {
        return view('dashboard.catProduct.index', [
            'data' => CategoryProduct::where('user_id', auth()->user()->id)
                ->with('users')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.catProduct.create', [
            'categories' => CategoryProduct::where('user_id', auth()->user()->id)
                ->with('users')
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:255|unique:categories',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        CategoryProduct::create($validatedData);

        return redirect('/dashboard/jenis')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(CategoryProduct $id)
    {
        return view('dashboard.catProduct.edit', [
            'data' => $id,
            'cat' => CategoryProduct::all(),
        ]);
    }

    public function update(Request $request, CategoryProduct $id)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:255|unique:category_product',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        CategoryProduct::where('kategori', $id->kategori)->update($validatedData);

        return redirect('/dashboard/jenis')->with('success', 'Data berhasil dihapus!');
    }

    public function destroy(CategoryProduct $id)
    {
        CategoryProduct::destroy($id->id);

        return redirect('/dashboard/jenis')->with('success', 'Data berhasil dihapus!');
    }

    public function listParfume()
    {
        $list_data = CategoryProduct::where('user_id', auth()->user()->id)->with('users');

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

    public function listDetail()
    {
        $list_data = Product::where('user_id', auth()->user()->id)
            ->with('users', 'categories', 'category_product')
            ->get();

        return Datatables::of($list_data)
            ->addColumn('kategori', function ($item) {
                // dd($item->category_product);
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
            //    ->editColumn('image', function ($item) {
            //     return asset('storage/' . $item->image);
            // })
            ->addIndexColumn()
            ->make(true);
    }
}
