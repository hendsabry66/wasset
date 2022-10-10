<div class="row">

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.name')</label>
        <input type="text"  class="form-control" placeholder="{{__('admin.name')}}" name="name" @if(isset($user)) value="{{$user->name}}" @endif>
    </div>

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.email')</label>
        <input type="email"  class="form-control" placeholder="{{__('admin.email')}}" name="email"  @if(isset($user)) value="{{$user->email}}" @endif>
    </div>

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.phone')</label>
        <input type="text"  class="form-control" placeholder="{{__('admin.phone')}}" name="phone"  @if(isset($user)) value="{{$user->phone}}" @endif>
    </div>

    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.password')</label>
        <input type="password"  class="form-control" placeholder="{{__('admin.password')}}" name="password"  >
    </div>
    <div class="form-group col-md-6 mb-2">
        <label for="projectinput4">@lang('admin.roles')</label>
        @if(isset($user))
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
        @else
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
        @endif
    </div>

</div>
