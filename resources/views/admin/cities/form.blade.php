<div class="row">
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.country')</label>
        <select class="select2 form-control" name="country_id">
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->getTranslation('name','en')}} - {{$country->getTranslation('name','ar')}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.name_en')</label>
        <input type="text"  class="form-control" @if(isset($city)) value="{{$city->getTranslation('name','en')}}" @endif placeholder="{{__('admin.name_en')}}" name="name_en">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.name_ar')</label>
        <input type="text"  class="form-control" @if(isset($city)) value="{{$city->getTranslation('name','ar')}}" @endif placeholder="{{__('admin.name_ar')}}" name="name_ar">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.status')</label>
        <select class="select2 form-control" name="status">

            <option value="active" @if(isset($city) && $city->status =="active") selected @endif >@lang('admin.active')</option>
            <option value="in_active" @if(isset($city) && $city->status =="in_active") selected @endif>@lang('admin.in_active')</option>

        </select>
    </div>
</div>
