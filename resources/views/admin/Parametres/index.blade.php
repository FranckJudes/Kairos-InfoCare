@extends('admin.main-layout')
 

    @section('content')
        <section class="section">
            <div class="section-body">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                      <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                          <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content">
                                <h5 class="font-15">Update</h5>
                                <h2 class="mb-3 font-18">Paswords</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{asset('assets/img/banner/passwords.svg')}}" alt="">
                            </div>
                        </div>
                        <a class="nav-link" href="{{ url ('passwords')}}">{{__('main.MotPasseDefaut')}}</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                      <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                          <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content">
                                <h5 class="font-15">Change</h5>
                                <h2 class="mb-3 font-18">languages</h2>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                              <div class="banner-img">
                                <img src="{{('assets/img/banner/world.svg')}}" alt="">
                              </div>
                            </div>
                            <a class="nav-link" href="{{ url ('passwords')}}">{{__('main.MotPasseDefaut')}}</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
            </div>
        </section>
  @endsection

