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
                          <h4>Groupe Utilisateur</h4>
                        </div>
                            <div>
                              <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">     
                                  <a type="button" class="btn btn-primary" href="/GroupeUtilisateur/create">
                                    Ajouter Un GroupeUtilisateur
                                  </a>
                                </div>
                              </div>
                            </div>

                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                              <thead>
                                <tr>
                                  <th>id</th>
                                  <th>nom</th>
                                  <th>description</th>
                                  <th>effectif</th>
                                  {{--  <th></th> --}}
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              @forelse ($groupeUtilisateur as $groupe)
                           
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
                                    <div>
                                      <a  href="{{ route('GroupeUtilisateur.edit' , $groupe->id)}}" class="btn btn-primary" >modifier</a>
                                      <form action="{{ route('GroupeUtilisateur.destroy' , $groupe->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                          <button  class="btn btn-danger">Supprimer</button>
                                      </form>
                                    </div>   
                                    
                                  </td>
                                </tr>   
                              @empty
                                <tr>
                                  <td colspan="6" style="text-align: center">
                                      pas de groupe
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('GroupeUtilisateur') }}">
                    @csrf
                    <div class="form-group">
                        <label name="libelle" >Libelle</label>
                        <input type="text" name="libelle" value="{{old('libelle')}}" id="libelle" class="form-control">
                        @if ($errors->has('libelle'))
                            <span class="text-danger">{{ $errors->first('libelle') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label name="description">Description</label>
                        <textarea type="text" class="form-control"  value="{{old('description')}}" placeholder="Description"
                            name="description"></textarea> 
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <button value="Enregistrer" class="btn btn-primary m-t-15 waves-effect">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

    @section('FootLink')
     <script src="{{asset('assets/js/page/datatables.js')}}"></script>
     <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
     <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
     <script src="{{asset('assets/bundles/prism/prism.js')}}"></script>
    @endsection