@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="pb-1">
                                    <div class="clearfix mb-1">
                                        <i class="icon-star font-large-1 blue-grey float-left mt-1"></i>
                                        <span class="font-large-2 text-bold-300 info float-right">{{$ads}}</span>
                                    </div>
                                    <div class="clearfix">
                                        <span class="text-muted">اجمالي الاعلانات</span>
                                        {{--                                        <span class="info float-right"><i class="ft-arrow-up info"></i> 16.89%</span>--}}
                                    </div>
                                </div>
                                <div class="progress mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="pb-1">
                                    <div class="clearfix mb-1">
                                        <i class="icon-user font-large-1 blue-grey float-left mt-1"></i>
                                        <span class="font-large-2 text-bold-300 danger float-right">{{$users}}</span>
                                    </div>
                                    <div class="clearfix">
                                        <span class="text-muted">الاعضاء المسجلين</span>
                                        {{--                                        <span class="danger float-right"><i class="ft-arrow-up danger"></i> 5.14%</span>--}}
                                    </div>
                                </div>
                                <div class="progress mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="pb-1">
                                    <div class="clearfix mb-1">
                                        <i class="icon-shuffle font-large-1 blue-grey float-left mt-1"></i>
                                        <span class="font-large-2 text-bold-300 success float-right">{{$contacts}}</span>
                                    </div>
                                    <div class="clearfix">
                                        <span class="text-muted">رسائل التواصل</span>
                                        {{--                                        <span class="success float-right"><i class="ft-arrow-down success"></i> 2.24%</span>--}}
                                    </div>
                                </div>
                                <div class="progress mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="pb-1">
                                    <div class="clearfix mb-1">
                                        <i class="icon-wallet font-large-1 blue-grey float-left mt-1"></i>
                                        <span class="font-large-2 text-bold-300 warning float-right">{{$cities + $countries}}</span>
                                    </div>
                                    <div class="clearfix">
                                        <span class="text-muted">اجمالي المدن او المناطق</span>
                                        {{--                                        <span class="warning float-right"><i class="ft-arrow-up warning"></i> 43.84%</span>--}}
                                    </div>
                                </div>
                                <div class="progress mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/ Sales by Campaigns & Year -->

    <!-- Recent Orders -->
    <div class="row">
        <div class="col-xl-8 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">احدث الاعلانات  </h4>
                    <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>الاسم </th>
                                <th> الصوره </th>
                                <th> القسم </th>
                                <th> المدينه </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads_data as $ad)
                                <tr>
                                    <td class="text-truncate">{{$ad->name}}</td>
                                    <td class="text-truncate"><img src="{{$ad->image}}" alt="{{$ad->title}}" width="50" height="50"></td>
                                    <td class="text-truncate">{{$ad->category->name}}</td>
                                    <td class="text-truncate">{{$ad->city->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Recent Orders -->


@endsection
