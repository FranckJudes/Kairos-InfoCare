@extends('admin.main-layout')
    @section('HeadLink') 
    <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Accordion</h4>
                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div id="accordion">
                            <div class="accordion">
                                    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                         <h4>Documents list</h4>
                                    </div>
                                    <div class="accordion-body collapse show" >
                                        <p class="mb-0">
                                           ddd
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3" aria-expanded="true">
                                  <h4>Documents Uploader et Visualiser</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-3" data-parent="#accordion">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                              </div>
                       
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
                
  </div>     
        
    @endsection
    @section('FootLink')
        <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    @endsection