<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Repositories\AdRepository;
use App\Models\Ad;

class FavouriteController extends Controller
{
    private $adRepository;

    public function __construct( AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function favourites()
    {
          $ads = Ad::whereIn('id',array_unique(auth()->user()->favourites()->pluck('favouritable_id')->toArray()))->get();
        return view('web.favourite.favourites', compact('ads'));
    }

    public function addFavourite(Request $request)
    {

        $ad = $this->adRepository->find($request->ad_id);

      $favourite = Favourite::create([
            'user_id' => auth()->user()->id,
            'favouritable_id' => $ad->id,
            'favouritable_type' => get_class($ad)
        ]);

        return response()->json(['success' => __('web.added_successfully')]);
    }
}
