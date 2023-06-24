<?php

namespace App\Http\Controllers;

use App\Models\CasualsParfume;
use App\Models\MensParfume;
use App\Models\Product;
use App\Models\WomensParfume;
use App\Models\SweetsParfume;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function collections()
    {
        $mens_parfumes = Product::get();
        $womens_parfumes = Product::get();
        $casual_parfumes = Product::get();
        $sweets_parfume = Product::get();
        $data = collect();

        foreach ($mens_parfumes as $mens_parfume) {
            $mens_parfume->type = 'mens_parfume';
            $data->push($mens_parfume);
        }

        foreach ($womens_parfumes as $womens_parfumes) {
            $womens_parfumes->type = 'womens_parfumes';
            $data->push($womens_parfumes);
        }

        foreach ($casual_parfumes as $casual_parfume) {
            $casual_parfume->type = 'casual_parfume';
            $data->push($casual_parfume);
        }

        foreach ($sweets_parfume as $sweet_parfume) {
            $sweet_parfume->type = 'sweet_parfume';
            $data->push($sweet_parfume);
        }

        return view('collections', ['collections' => $data]);
    }

    public function collection(Request $request, $id)
    {
        $id = $request->id;
        $data = collect();
        $mens_parfumes = Product::where('category_id', $id)->get();
        $womens_parfumes = Product::where('category_id', $id)->get();
        $casual_parfumes = Product::where('category_id', $id)->get();
        $sweets_parfume = Product::where('category_id', $id)->get();

        foreach ($mens_parfumes as $mens_parfume) {
            $mens_parfume->type = 'mens_parfume';
            $data->push($mens_parfume);
        }

        foreach ($womens_parfumes as $womens_parfumes) {
            $womens_parfumes->type = 'womens_parfumes';
            $data->push($womens_parfumes);
        }

        foreach ($casual_parfumes as $casual_parfume) {
            $casual_parfume->type = 'casual_parfume';
            $data->push($casual_parfume);
        }

        foreach ($sweets_parfume as $sweet_parfume) {
            $sweet_parfume->type = 'sweet_parfume';
            $data->push($sweet_parfume);
        }
        // dd($data);
        return view('collection', ['collections' => $data, 'id' => $id]);
    }

    public function collectionDetail(Request $request, $id, $parfume_id, $type)
    {
        $data = '';
        $recommendations = [];
        $data = Product::where('id', $parfume_id)->first();
        $recommendations = Product::where('id', '!=', $parfume_id)->get();
        // dd($recommendations);
    
        return view('collection-detail', ['collection' => $data, 'recommendations' => $recommendations]);
    }
}
