<div class="row">

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.name')</label>
        <input type="text"  class="form-control" @if(isset($ad)) value="{{$ad->name}}" @endif placeholder="{{__('admin.name')}}" name="name">
    </div>

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.details')</label>
        <input type="text"  class="form-control" placeholder="{{__('admin.details')}}" @if(isset($ad)) value="{{$ad->details}}" @endif name="details">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.price')</label>
        <input type="text"  class="form-control" @if(isset($ad)) value="{{$ad->price}}" @endif placeholder="{{__('admin.price')}}" name="price">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.communication')</label>
        <input type="text"  class="form-control" placeholder="{{__('admin.communication')}}" @if(isset($ad)) value="{{$ad->communication}}" @endif name="communication">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.latitude')</label>
        <input type="text"  class="form-control" placeholder="{{__('admin.latitude')}}" @if(isset($ad)) value="{{$ad->latitude}}" @endif name="latitude">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.longitude')</label>
        <input type="text"  class="form-control" placeholder="{{__('admin.longitude')}}" name="longitude" @if(isset($ad)) value="{{$ad->longitude}}" @endif>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.country')</label>
        <select class="select2 form-control" name="country_id">
            <option value="">@lang('admin.choose')</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}" @if(isset($ad) && $ad->country_id  == $country->id) selected @endif>{{$country->getTranslation('name','en')}} - {{$country->getTranslation('name','ar')}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.city')</label>
        <select class="select2 form-control" name="city_id">
            @if(isset($ad) && $ad->city_id != null)
                <option value="{{$ad->city_id}}">{{$ad->city->getTranslation('name','en')}} - {{$ad->city->getTranslation('name','ar')}}</option>
            @else
                <option value="">@lang('admin.choose')</option>
            @endif

        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.category')</label>
        <select class="select2 form-control" name="category_id">
            <option value="">@lang('admin.choose')</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" @if(isset($ad) && $ad->category_id  == $category->id) selected @endif>{{$category->getTranslation('name','en')}} - {{$category->getTranslation('name','ar')}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.subcategory')</label>
        <select class="select2 form-control" name="subcategory_id">
            @if(isset($ad) && $ad->subcategory_id != null)
                <option value="{{$ad->subcategory_id}}">{{$ad->subcategory->getTranslation('name','en')}} - {{$ad->subcategory->getTranslation('name','ar')}}</option>
            @else
                <option value="">@lang('admin.choose')</option>
            @endif
        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.user')</label>
        <select class="select2 form-control" name="user_id">
            <option value="">@lang('admin.choose')</option>
            @foreach($users as $user)
                <option value="{{$user->id}}" @if(isset($ad) && $ad->user_id  == $user->id) selected @endif>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.image')</label>
        <input type="file" name="image"  class="form-control">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.images')</label>
        <input type="file" name="images[]" multiple class="form-control">
    </div>
</div>
