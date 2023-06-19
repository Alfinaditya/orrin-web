<?php

namespace App\Http\Controllers;

use App\Models\CasualsParfume;
use App\Models\MensParfume;
use App\Models\WomensParfume;
use App\Models\SweetsParfume;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function article()
    {
        return view('article');
    }

    public function collections()
    {
        $mens_parfumes = MensParfume::get();
        $womens_parfumes = WomensParfume::get();
        $casual_parfumes = CasualsParfume::get();
        $sweets_parfume = SweetsParfume::get();
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
        $mens_parfumes = MensParfume::where('category_id', $id)->get();
        $womens_parfumes = WomensParfume::where('category_id', $id)->get();
        $casual_parfumes = CasualsParfume::where('category_id', $id)->get();
        $sweets_parfume = SweetsParfume::where('category_id', $id)->get();

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
        return view('collection', ['collections' => $data, 'id' => $id]);
    }

    public function collectionDetail(Request $request, $id, $parfume_id, $type)
    {
        $data = '';
        $recommendations = [];

        switch ($type) {
            case 'mens_parfume':
                $data = MensParfume::where('id', $parfume_id)->first();
                $recommendations = MensParfume::where('id', '!=', $parfume_id)->first();
                break;
            case 'womens_parfume':
                $data = WomensParfume::where('id', $parfume_id)->first();
                $recommendations = WomensParfume::where('id', '!=', $parfume_id)->firts();
                break;
            case 'casual_parfume':
                $data = CasualsParfume::where('id', $parfume_id)->first();
                $recommendations = CasualsParfume::where('id', '!=', $parfume_id)->first();
                break;
            case 'sweet_parfume':
                $data = SweetsParfume::where('id', $parfume_id)->first();
                $recommendations = SweetsParfume::where('id', '!=', $parfume_id)->first();
                break;
            default:
                break;
        }

        return view('collection-detail', ['collection' => $data, 'recommendations' => $recommendations]);
    }
}
