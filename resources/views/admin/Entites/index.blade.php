@extends('admin.main-layout')
    @section('HeadLink')
    @endsection

    @section('content')
    <section class="section">
      <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Les entites</h4>
                  </div>
                      <div>
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center">     
                            <a type="button" class="btn btn-primary" href="/entites/create">
                              Ajouter Une Entite
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
                            <th>code</th>
                            <th>Organisition</th>
                            <th>Description</th>
                            {{--  <th></th> --}}
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($entites as $groupe)
                     
                          <tr>
                            <td>
                           {{ $groupe->id}} 
                            </td>
                            <td>
                              {{$groupe->libelle}} 
                            </td>
                            <td>
                             
                              @if (!$groupe->parent_id)
                                  /
                              @else
                                  {{$groupe->parent->libelle}}
                              @endif
                            </td>
                            <td>
                              {{ $groupe->description}} 
                            </td>
                            <td>
                              <div>
                                <a  href="{{ route('entites.edit' , $groupe->id)}}" class="btn btn-primary" >modifier</a>
                                <form action="{{ route('entites.destroy' , $groupe->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                    <button  class="btn btn-danger">Supprimer</button>
                                </form>
                              </div>   
                              
                            </td>
                          </tr>   
                        @empty
                          <tr>
                            <td colspan="5" style="text-align: center">
                                Pas d'entites
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
 
    @endsection





    {{--  --}}

   