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
                                    <td colspan="7" class="align-middle" style="text-align: center">
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

    @section('FootLink')
     <script src="{{asset('assets/js/page/datatables.js')}}"></script>
     <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
     <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
     <script src="{{asset('assets/bundles/prism/prism.js')}}"></script>
     
    @endsection