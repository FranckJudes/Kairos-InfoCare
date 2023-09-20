@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">
    @endsection

    @section('content')
        <section class="section">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>{{__('patient.patients')}}</h4>
                  <div class="card-header-action">     
                    <a href="{{route('patient.create')}}" class="btn btn-success">
                      {{__('patient.CreerUnPatient')}}</a>
                  </div>
                </div>
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                      <thead>
                        <tr>
                          <th>noms & Prenoms</th>
                          <th>sexe </th>
                          <th>Date de naissance</th>
                          <th>Quartier</th>
                          <th>Email</th>
                          <th>Numero</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($patients as $patient)

                    
                        <tr>
                          <td>
                            {{$patient->name}} {{$patient->lastname}}
                          </td>
                          <td>{{$patient->sexe}}</td>
                          <td>
                            {{$patient->dateNaissance}}
                          </td>
                          <td>
                            {{$patient->adresse}}
                          </td>
                          <td>{{$patient->numeroTelephone}}</td>
                          <td>
                           /
                          </td>
                          <td>
                            <a href="{{route('patient.show',$patient->id)}}"><i class="material-icons">remove_red_eye</i></a>
                            <a href="{{route('patient.edit',$patient->id)}}"><i class="material-icons">mode_edit</i></a>
                            <a href="{{url('deletePatient',$patient->id)}}"><i class="material-icons">delete</i></a>
                            
                            </td>
                         
                        </tr>
                        @empty
                           <tr>
                            <td colspan="7" class="align-middle" style="text-align: center">
                                  {{__('patient.pasPatient')}}
                            </td>
                           </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
      
        
    @endsection

    @section('FootLink')
        <script src="{{asset('assets/js/page/datatables.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/bundles/prism/prism.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/export-tables/jszip.min.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/js/page/datatables.js')}}"></script>
        <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    @endsection