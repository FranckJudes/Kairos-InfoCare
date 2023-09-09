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
                    <h4>
                      {{__('entite.titrePage')}}
                    </h4>
                    <div class="card-header-action">     
                      <a type="button" class="btn btn-primary" href="/entites/create">
                       {{__('entite.btnAjout')}}
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
                            <th>code</th>
                            <th>{{__('entite.organisation')}}</th>
                            <th>Description</th>
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
                                <a  href="classement" class="btn btn-success" >{{__('entite.VoirPlus')}}</a>
                                <a  href="{{ route('entites.edit' , $groupe->id)}}" class="btn btn-primary" >{{__('entite.btnEditer')}}</a>
                                <a  class="btn btn-danger" href="{{url('deleteEntite',$groupe->id)}}">{{__('entite.btnDelete')}}</a>
                                
                              </div>   
                              
                            </td>
                          </tr>   
                        @empty
                          <tr>
                            <td colspan="5" style="text-align: center">
                             {{__('entite.AucuneEntite')}}
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

   