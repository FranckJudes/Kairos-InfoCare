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
                          <h4>Les Patients</h4>
                        </div>
                            <div>
                              <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                  Ajouter Un Patients</button>
                              </div>
                            </div>

                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
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
                                    GAllagher
                                  </td>
                                  <td>Create a mobile app</td>
                                  <td>
                                    fffffffffffffff
                                  </td>
                                  <td>
                                    gggggggg
                                  </td>
                                  <td>2018-01-20</td>
                                  <td>
                                   complete
                                  </td>
                                  <td>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">modifier</a>
                                   
                                        <a href="#" class="btn btn-danger">supprimer</a>
                                    
                                </td>
                                 
                                </tr>
                                @empty
                                   <tr>
                                    <td colspan="6" class="align-middle" style="text-align: center">
                                          Pas de patients
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
            </div>
        </section>
        
    @endsection
            <!-- Modal with form -->
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
                  <form method="POST" action="{{url('patient')}}" class="myForm">
                    @csrf
                   
                    <div class="form-group">
                      <label>Noms et Prenoms</label>
                      <input type="text" class="form-control" placeholder="Nom et prenoms" name="nomPrenoms">
                      <div class="">
                        @if ($errors->has('nomPrenoms'))
                                  <span class="text-danger">{{ $errors->first('nomPrenoms') }}</span>
                              @endif
                      </div>
                    </div>
                      <div class="form-group">
                        <label>date de Naissance</label>
                          <input type="date" class="form-control" placeholder="date de naissance" name="dateNaissance">
                          @if ($errors->has('dateNaissance'))
                              <span class="text-danger">{{ $errors->first('dateNaissance') }}</span>
                          @endif
                        </div>
            
                      <div class="form-group">
                        <label>Sexe</label>
                            <select class="form-control"  name="sexe">
                              <option value="masculin">Masculin</option>
                              <option value="feminin">Feminin</option>
                            </select>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="adresseMail">
                          @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label>Numero de Telephone</label>
                           <input type="tel" class="form-control" placeholder="Ex : 656938482" name="numeroTelephone">
                          @if ($errors->has('numeroTelephone'))
                              <span class="text-danger">{{ $errors->first('numeroTelephone') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label>Quartier</label>
                          <input type="text" class="form-control" placeholder="Ex : Melen" name="quartier">
                          @if ($errors->has('quartier'))
                              <span class="text-danger">{{ $errors->first('quartier') }}</span>
                          @endif
                      </div>
                    
                    <button  value="Enregistrer" class="btn btn-primary m-t-15 waves-effect"> Enregistrer
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
   
      $(document).ready(function () {
          $('.myForm').on('submit', function (event) {
              event.preventDefault();
      
              $.ajax({
                  url: $(this).attr('action'),
                  method: 'POST',
                  data: $(this).serialize(),
                  success: function (response) {
                      // Si la soumission réussit, faites quelque chose
                  },
                  error: function (xhr) {
                      if (xhr.status === 422) { // Erreurs de validation
                          var errors = xhr.responseJSON.errors;
                          // Affichez les erreurs dans le modal
                      }
                  }
              });
          });
      });
  
    @endsection