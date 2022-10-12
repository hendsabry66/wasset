<?php

namespace App\Http\Controllers\web;

use App\Models\Ad;
use App\Models\Category;
use App\Models\View;
use Illuminate\Http\Request;
use Flash;
use Response;
use Image;
use App\Repositories\AdRepository;
use App\Http\Requests\CreateAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Http\Controllers\AppBaseController;



class AdController extends AppBaseController
{
    /** @var  AdRepository */
    private $adRepository , $categoryRepository ,$countryRepository ,$cityRepository;
    public function __construct(AdRepository $adRepo , CategoryRepository $categoryRepo , CountryRepository $countryRepo , CityRepository $cityRepo)
    {
        $this->adRepository = $adRepo;
        $this->categoryRepository = $categoryRepo;
        $this->countryRepository = $countryRepo;
        $this->cityRepository = $cityRepo;
    }
    /**
     * home page
     */

    public function index(Request $request){
        //$totalViews = views($ad)->count();
        $ads = $this->adRepository->all();
         $view_ids = array_unique(View::where('ip',$request->ip())->limit(10)->pluck('ad_id')->toArray());
        $myLastViews = Ad::whereIn('id',$view_ids)->get();
        $categories = $this->categoryRepository->allQuery(['parent_id'=>null])->get();
        $homeCategory = Category::where('display_in_home',1)->get();
        return view('web.index', compact('ads','categories','myLastViews','homeCategory'));
    }

    /**
     * get ads by category
     */

    public function ads($category_id){
        $ads = $this->adRepository->getAdsByCategory($category_id);
        return view('web.ad.ads', compact('ads'));
    }

    /**
     * ad details
     */

    public function adDetails($id , Request $request){

        $ad = $this->adRepository->find($id);
        $similarAds = $this->adRepository->getSimilarAds($ad->category_id , $ad->id);
        $category = Category::find($ad->category_id);
        $category_id = ($category->parent_id == null)? $category->id :$category->parent_category->id;
        View::firstOrCreate(
            [
                'ip'=>$request->ip(),
                'user_id'=>(auth()->check()) ? auth()->user()->id : null ,
                'ad_id'=>$id,
                'category_id'=>$category_id,
            ]
        );

        return view('web.ad.adDetails', compact('ad','similarAds'));

    }

    /**
     * add new ad
     */
    public function adCreate(){
        $categories = $this->categoryRepository->all();
        $countries = $this->countryRepository->all();
        $cities = $this->cityRepository->all();
        return view('web.ad.add', compact('categories','countries','cities'));
    }
    public function adStore(CreateAdRequest $request){
        $ad = $this->adRepository->createAd($request->all());
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $img = Image::make($image);
                $imgPath = 'uploads/ads/';
                $imgName =time().$image->getClientOriginalName();
                $img =  $img->save($imgPath.$imgName);
                $ad->images()->create(['name'=>$imgName]);
            }
        }

        return redirect(url('adDetails/'.$ad->id))->with('success',__('messages.added_successfully'));
    }


    public function addFavorite(Request $request)
    {
        $ad = $this->adRepository->find($request->ad_id);
        $ad->favourites()->create([
            'user_id' => auth()->user()->id,
        ]);
        return response()->json(['success'=>'Added to favorite list']);
    }

    public function LikePost(Request $request){

        $post = Post::find($request->id);
        $response = auth()->user()->toggleLike($post);

        return response()->json(['success'=>$response]);
        /*
               <i id="like{{$post->id}}" class="glyphicon glyphicon-thumbs-up {{ auth()->user()->hasLiked($post) ? 'like-post' : '' }}"></i> <div id="like{{$post->id}}-bs3">{{ $post->likers()->get()->count() }}</div>
         */
    }

    public function search(Request $request){
        if($request->category_id == "null"){
            $ads = Ad::where('name', 'LIKE', '%'.$request->text.'%')->get();
        }else{
            $ads = Ad::where('name', 'LIKE', '%'.$request->text.'%')
                ->where('category_id',$request->category_id)->get();
        }
        return view('web.ad.search',compact('ads'));
    }
}


