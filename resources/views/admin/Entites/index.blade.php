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
                                @dump($entites);
                              @forelse ($entites as $groupe)
                           
                                <tr>
                                  <td>
                                 {{ $groupe->id}} 
                                  </td>
                                  <td>
                                    {{$groupe->libelle}} 
                                  </td>
                                  <td>
                                   
                                    {{-- @if ($groupe->parent_id)
                                        /
                                    @else
                                        {{$groupe->parent->libelle}}
                                    @endif --}}
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
                                {{-- <ul id="entites-list">
                                  @foreach ($entites as $entite)
                                      <li class="entite-item" data-id="{{ $entite->id }}">
                                      {{ $entite->libelle }}
                                      </li>
                                      <ul class="children-list" data-parent="{{ $entite->id }}"></ul>
                                  @endforeach
                              </ul> --}}
                              <ul id="entites-list">
                                @foreach ($entites as $entite)
                                    <li class="entite-item" data-id="{{ $entite->id }}">
                                        {{ $entite->libelle }}
                                      <ul class="children"></ul>
                                    </li>
                                @endforeach
                            </ul>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style>
          .entite-item {
              cursor: pointer;
            }
        </style>
    <script>
      $(document).ready(function() {
         $('.entite-item').click(function(e) {
          e.stopPropagation(); // Empêche la propagation de l'événement

        var entiteId = $(this).data('id');
        // var childrenList = $(this).next('.children-list');
        var childrenList = $(this).children('.children');
        
        
        if (!childrenList.hasClass('loaded')) {
          
            
          $.ajax({
                url: "get-children/"+entiteId,
                type: 'GET',
                dataType: 'json',

                success: function(response) {
                  console.log(response);
                    var childrenHtml = '';
                    $.each(response, function(index, child) {
                        childrenHtml += '<li class="entite-item" data-id="' + child.id + '">' + child.libelle + '<ul class="children"></ul></li>';
                      });
                    childrenList.html(childrenHtml);
                    childrenList.addClass('loaded');
                  }
                });
              }
              childrenList.toggle();
              
           });
        });

      </script>
    
    @endsection