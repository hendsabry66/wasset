<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\DataTables\CityDataTable;
use App\Models\Country;
use App\Repositories\CityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DashboardController extends AppBaseController
{

    public function index()
    {

        $users = \App\Models\User::count();
        $cities = \App\Models\City::count();
        $countries = \App\Models\Country::count();
        $ads = \App\Models\Ad::count();
        $contacts = \App\Models\Contact::count();
        $ads_data = \App\Models\Ad::orderBy('id','desc')->limit(5)->get();

        return view('admin.dashboard')->with('users', $users)->with('cities', $cities)->with('countries', $countries)->with('ads', $ads)->with('contacts', $contacts)->with('ads_data', $ads_data);

    }






}
