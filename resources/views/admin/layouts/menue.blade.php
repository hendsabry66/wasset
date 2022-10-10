<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.countries')</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'countries') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/countries')}}" data-i18n="nav.dash.ecommerce">@lang('admin.countries')</a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'cities') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/cities')}}" data-i18n="nav.dash.project">@lang('admin.cities')</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.ads')</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'ads') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/ads')}}" data-i18n="nav.dash.ecommerce">@lang('admin.ads')</a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'categories') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/categories')}}" data-i18n="nav.dash.project">@lang('admin.categories')</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.pages')</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'pages') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/pages')}}" data-i18n="nav.dash.ecommerce">@lang('admin.pages')</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.banners')</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'banners') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/banners')}}" data-i18n="nav.dash.ecommerce">@lang('admin.banners')</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.users')</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'users') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/users')}}" data-i18n="nav.dash.ecommerce">@lang('admin.users')</a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'roles') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/roles')}}" data-i18n="nav.dash.project">@lang('admin.roles')</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.contacts')</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'contacts') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/contacts')}}" data-i18n="nav.dash.ecommerce">@lang('admin.contacts')</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href=""><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.settings')</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'settings') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/settings')}}" data-i18n="nav.dash.ecommerce">@lang('admin.settings')</a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'menue') ? 'active' : '' }}"><a class="menu-item" href="{{url('admin/menue')}}" data-i18n="nav.dash.ecommerce">@lang('admin.menue')</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
