@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
    @endsection

    @section('content')
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>{{__('groupeUtilisateur.titrePage')}}</h4>
                          <div class="card-header-action">     
                            <a type="button" class="btn btn-primary" href="/GroupeUtilisateur/create">
                              {{__('groupeUtilisateur.btnAjout')}}
                            </a>
                          </div>
                        </div>
                            <div>
                              <div class="card-body">
                              </div>
                            </div>

                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                              <thead>
                                <tr>
                                  <th>id</th>
                                  <th>{{__('groupeUtilisateur.libelle')}}</th>
                                  <th>{{__('groupeUtilisateur.description')}}</th>
                                  <th>{{__('groupeUtilisateur.effectif')}}</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                           
                              @forelse ($groupesAvecNombreUtilisateurs as $groupe)
                                <tr>
                                  <td>
                                    {{ $groupe->id}}
                                  </td>
                                  <td>
                                    {{$groupe->libelle}}
                                  </td>
                                  <td>
                                    {{ $groupe->description}}
                                  </td>
                                  <td>
                                    
                                    {{ $groupe->users_count }}
                                  </td>
                                  <td>
                                    <div>
                                      <a  href="{{ route('GroupeUtilisateur.show',$groupe)}}"  ><i class="material-icons">remove_red_eye</i></a>
                                      <a  href="{{ route('GroupeUtilisateur.edit' , $groupe->id)}}"  ><i class="material-icons">mode_edit</i></a>
                                      <a  href="{{url('deleteGroupeUtilisateur',$groupe->id)}}"><i class="material-icons">delete</i></a>
                                    </div>   
                                  </td>
                                </tr>   
                             
                              @empty
                                <tr>
                                  <td colspan="6" style="text-align: center">
                                    {{__('groupeUtilisateur.AucunGroup')}}
                                  </td>
                                </tr>
                              @endforelse  
                                 
                                </tr>
                                <tr>
                              </tbody>
                            </table>
                          </div>
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
    @endsection