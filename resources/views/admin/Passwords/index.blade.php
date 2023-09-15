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
                    <h4>{{__('passwords.titre')}}</h4>
                    <div class="card-header-action">
                      <a href="{{url()->previous()}}" class="btn btn-success">
                       <i class="fas fa-arrow-circle-left"></i> {{__('main.retour')}}</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>libelle</th>
                            <th>Mot de passe</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($Passwords as $groupe)
                     
                          <tr>
                            <td>
                           {{ $groupe->id}} 
                            </td>
                            <td>
                              {{$groupe->libelle}} 
                            </td>
                            <td>
                                {{$groupe->valeur}}
                            </td>
                            <td>
                              {{ $groupe->description}} 
                            </td>
                            <td>
                              <div>
                                <a  href="{{ route('passwords.edit' , $groupe->id)}}" class="btn btn-primary" >modifier</a>
                              </div>   
                              
                            </td>
                          </tr>   
                        @empty
                          <tr>
                            <td colspan="5" style="text-align: center">
                                Pas de Password
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






   