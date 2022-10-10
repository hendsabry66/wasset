<div class="row">
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput3">@lang('admin.image')</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.details_en')</label>
        <textarea class="form-control" name="details_en">{{(isset($banner)) ? $banner->getTranslation('details','en') : ''}}</textarea>
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.details_ar')</label>
        <textarea class="form-control" name="details_ar">{{(isset($banner)) ? $banner->getTranslation('details','ar') : ''}}</textarea>
    </div>
</div>
