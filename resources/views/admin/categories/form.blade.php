<div class="row">

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.name_en')</label>
        <input type="text"  class="form-control" @if(isset($category)) value="{{$category->getTranslation('name','en')}}" @endif placeholder="{{__('admin.name_en')}}" name="name_en">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.name_ar')</label>
        <input type="text"  class="form-control" @if(isset($category)) value="{{$category->getTranslation('name','ar')}}" @endif placeholder="{{__('admin.name_ar')}}" name="name_ar">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.category')</label>
        <select class="select2 form-control" name="parent_id">
            <option value=""> @lang('admin.category')</option>
            @foreach($categories as $_category)
                <option value="{{$_category->id}}" @if(isset($category) && $category->parent_id  == $_category->id) selected @endif>{{$_category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.image')</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.status')</label>
        <select class="select2 form-control" name="status">

            <option value="active" @if(isset($category) && $category->status =="active") selected @endif >@lang('admin.active')</option>
            <option value="in_active" @if(isset($category) && $category->status =="in_active") selected @endif>@lang('admin.in_active')</option>

        </select>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.display_in_home')</label>
        <select class="select2 form-control" name="display_in_home">

            <option value="1" @if(isset($category) && $category->display_in_home ==1) selected @endif >@lang('admin.yes')</option>
            <option value="0" @if(isset($category) && $category->display_in_home ==0) selected @endif>@lang('admin.no')</option>

        </select>
    </div>

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.order')</label>
        <input type="text"  class="form-control" @if(isset($category)) value="{{$category->order}}" @endif placeholder="{{__('admin.order')}}" name="order">
    </div>

</div>
