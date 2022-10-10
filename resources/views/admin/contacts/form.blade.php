<div class="row">
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.country')</label>
        <select class="select2 form-control" name="country_id">
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.city')</label>
        <input type="text"  class="form-control" placeholder="{{__('admin.city')}}" name="name">
    </div>
</div>
