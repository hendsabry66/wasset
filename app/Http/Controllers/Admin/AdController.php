<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdDataTable;
use App\Http\Requests\CreateAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Repositories\AdRepository;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CountryRepository;
use App\Repositories\UploadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Image;
class AdController extends AppBaseController
{
    /** @var AdRepository $adRepository*/
    private $adRepository,$userRepository,$CountryRepository,$categoryRepository,$uploadRepository;

    public function __construct(AdRepository $adRepo ,
                                CountryRepository $countryRepo ,
                                CategoryRepository $categoryRepo ,
                                UserRepository $userRepo ,UploadRepository $uploadRepo)
    {
        $this->adRepository = $adRepo;
        $this->userRepository = $userRepo;
        $this->categoryRepository = $categoryRepo;
        $this->CountryRepository = $countryRepo;
        $this->uploadRepository = $uploadRepo;

        $this->middleware('permission:ad-list|ad-create|ad-edit|ad-delete', ['only' => ['index','show']]);
        $this->middleware('permission:ad-create', ['only' => ['create','store']]);
        $this->middleware('permission:ad-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ad-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Ad.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(AdDataTable $dataTable)
    {
        return $dataTable->render('admin.ads.index');
    }

    /**
     * Show the form for creating a new Ad.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->userRepository->all();
        $categories = $this->categoryRepository->allQuery(['parent_id'=>null])->get();
        $countries = $this->CountryRepository->all();
        return view('admin.ads.create')->with('users',$users)->with('categories',$categories)->with('countries',$countries);
    }

    /**
     * Store a newly created Ad in storage.
     *
     * @param CreateAdRequest $request
     *
     * @return Response
     */
    public function store(CreateAdRequest $request)
    {
        $input = $request->all();
        $image = $request->file('image');
        if(!empty($image)){
            $img = Image::make($image);
            $imgPath = 'uploads/ads/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $input['image'] = $imgName;
        }

        $ad = $this->adRepository->createAd($input);
        foreach ($request->images as $image){
            if(!empty($image)){
                // for save original image
                $img = Image::make($image);
                $imgPath = 'uploads/ads/';
                $imgName =time().$image->getClientOriginalName();
                $img =  $img->save($imgPath.$imgName);
                $upload = $this->uploadRepository->create(['ad_id'=>$ad->id,'name'=>$imgName,'type'=>'image']);
            }
        }
        $messages = ['success' => "Successfully added", 'redirect' => route('ads.index')];
        return response()->json(['messages' => $messages]);
    }

    /**
     * Display the specified Ad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ad = $this->adRepository->find($id);

        if (empty($ad)) {
            Flash::error('Ad not found');

            return redirect(route('ads.index'));
        }

        return view('admin.ads.show')->with('ad', $ad);
    }

    /**
     * Show the form for editing the specified Ad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ad = $this->adRepository->find($id);

        if (empty($ad)) {
            Flash::error('Ad not found');

            return redirect(route('ads.index'));
        }
        $users = $this->userRepository->all();
        $categories = $this->categoryRepository->allQuery(['parent_id'=>null])->get();
        $countries = $this->CountryRepository->all();

        return view('admin.ads.edit')->with('ad', $ad)->with('users',$users)->with('categories',$categories)->with('countries',$countries);
    }

    /**
     * Update the specified Ad in storage.
     *
     * @param int $id
     * @param UpdateAdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdRequest $request)
    {
        $ad = $this->adRepository->find($id);

        if (empty($ad)) {
            Flash::error('Ad not found');

            return redirect(route('ads.index'));
        }
        $input = $request->all();
        $image = $request->file('image');
        if(!empty($image)){
            $img = Image::make($image);
            $imgPath = 'uploads/ads/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $input['image'] = $imgName;
        }
        $ad = $this->adRepository->updateAd($input, $id);
        if(!empty($request->images)){
            foreach ($request->images as $image){
                if(!empty($image)){
                    // for save original image
                    $img = Image::make($image);
                    $imgPath = 'uploads/ads/';
                    $imgName =time().$image->getClientOriginalName();
                    $img =  $img->save($imgPath.$imgName);
                    $upload = $this->uploadRepository->create(['ad_id'=>$ad->id,'name'=>$imgName,'type'=>'image']);
                }
            }
        }


        $messages = ['success' => "Successfully updated", 'redirect' => route('ads.index')];
        return response()->json(['messages' => $messages]);
    }

    /**
     * Remove the specified Ad from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ad = $this->adRepository->find($id);

        if (empty($ad)) {
            Flash::error('Ad not found');

            return redirect(route('ads.index'));
        }

        $this->adRepository->delete($id);

        $messages = ['success' => "Successfully deleted", 'redirect' => route('ads.index')];
        return response()->json(['messages' => $messages]);
    }

    /**
     * Bulk delete
     * @param Request $request
     *
     * @return \Illuminate\Support\Facades\Redirect
     *
     * @throws \Exception
     */
    public function bulkDelete(Request $request) {
        if (! $request->ids) {
            flash('قبل التأكيد على الاختيار المتعدد . من فضلك اختر من القائمة اولا')->error();
            return redirect()->back();
        }

        $this->adRepository->bulkDelete($request->ids);

        $messages = ['success' => "Successfully deleted", 'redirect' => route('ads.index')];
        return response()->json(['messages' => $messages]);
    }


}
