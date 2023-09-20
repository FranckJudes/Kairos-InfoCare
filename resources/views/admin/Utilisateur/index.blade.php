@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">

    @endsection

    @section('content')
    <section class="section">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>{{__('utilisateur.titre')}}</h4>
                <div class="card-header-action">     
                  <a type="button" class="btn btn-primary" p href="/Utilisateur/create">
                   {{__('utilisateur.BtnAjout')}}
                  </a>
                </div>
              </div>
              <div class="card-body">

                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead>
                      <tr>
                        <th>{{__('utilisateur.photo')}}</th>
                        <th>{{__('utilisateur.nom')}}</th>
                        <th>{{__('utilisateur.sexe')}}</th>
                        <th>{{__('utilisateur.dateNaissance')}}</th>
                        <th>{{__('utilisateur.email')}}</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($Utilisateur as $item) 
                      <tr>
                        <td><img  src="{{asset('storage/'. $item->photo)}}" width="35"></td>
                        <td>{{$item->name}}   {{$item->lastname}}</td>
                        <td>{{$item->sexe}}</td>
                        <td>{{$item->dateNaissance}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                          <a href=""><i class="material-icons">remove_red_eye</i></a>
                  
                          <a href="{{ route('Utilisateur.edit' , $item->id)}}"><i class="material-icons">mode_edit</i></a>
                          <a href="{{url('deleteUtilisateur',$item->id)}}"><i class="material-icons">delete</i></a>

                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="6" style="text-align: center">Pas D'Utilisateur</td>
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
    <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/page/datatables.js')}}"></script>
     <script src="{{asset('assets/bundles/prism/prism.js')}}"></script>
     <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    @endsection