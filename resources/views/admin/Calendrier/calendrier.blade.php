@extends('admin.main-layout')
    @section('HeadLink')
        <link rel="stylesheet" href="{{asset('assets/bundles/fullcalendar/fullcalendar.min.css')}}">
    @endsection

    @section('content')
        <section class="section">
            <div class="section-body">
            <div class="row">
                {{--  --}}
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="card">
                      <div class="body">
                        <div id="mail-nav">
                          <label  class="btn btn-danger waves-effect btn-compose m-b-15">Utilisateur</label>
                    
                          <ul class="online-user" id="online-offline">
                            <li><a href="javascript:;"> <img alt="image" src="assets/img/users/user-2.png"
                                  class="rounded-circle" width="35" data-toggle="tooltip" title="Sachin Pandit">
                                Sachin Pandit
                              </a></li>
                            <li><a href="javascript:;"> <img alt="image" src="assets/img/users/user-1.png"
                                  class="rounded-circle" width="35" data-toggle="tooltip" title="Sarah Smith">
                                Sarah Smith
                              </a></li>
                            <li><a href="javascript:;"> <img alt="image" src="assets/img/users/user-3.png"
                                  class="rounded-circle" width="35" data-toggle="tooltip" title="Airi Satou">
                                Airi Satou
                              </a></li>
                            <li><a href="javascript:;"> <img alt="image" src="assets/img/users/user-4.png"
                                  class="rounded-circle" width="35" data-toggle="tooltip" title="Angelica Ramos	">
                                Angelica Ramos
                              </a></li>
                            <li><a href="javascript:;"> <img alt="image" src="assets/img/users/user-5.png"
                                  class="rounded-circle" width="35" data-toggle="tooltip" title="Cara Stevens">
                                Cara Stevens
                              </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                {{--  --}}
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                    <h4>Agenda de passage</h4>
                    </div>
                    <div class="card-body">
                    <div class="fc-overflow">
                        <div id="myEvent"></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    @endsection

    @section('FootLink')
     <script src="{{ asset('assets/bundles/fullcalendar/fullcalendar.min.js')}}"></script>
     <script src="{{ asset('assets/js/page/calendar.js')}}"></script>
    @endsection
