@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">
    @endsection

    
    @section('title', $entites->exists ? "Editer une Entite" : "Creer une Entite")

    @section('content')
   
        <section>
            <div>
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h5 class="card-title pt-2" id="formModal">@yield('title')</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route($entites->exists ? 'entites.update' : 'entites.store', $entites->id)}}">
                            @csrf
                            @method($entites->exists ? 'PUT': 'POST')
                            <div class="form-group">
                              <label name="code" >code</label>
                              <input type="text" name="code" placeholder="code" value="{{old('code',$entites->code)}}" id="code" class="form-control">
                              @if ($errors->has('code'))
                                  <span class="text-danger">{{ $errors->first('code') }}</span>
                              @endif
                            </div>
                            <div class="form-group">
                                <label name="libelle" >Libelle</label>
                                <input type="text" name="libelle" placeholder="libelle" value="{{old('libelle',$entites->libelle)}}" id="libelle" class="form-control">
                                @if ($errors->has('libelle'))
                                    <span class="text-danger">{{ $errors->first('libelle') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                              <label name="libelle" >Organisition parente</label>
                              <select class="form-control select2" name="parent_id">
                                <option selected="" value="">Choose...</option>
                                @foreach ($Organisation as $entite)
                                    <option value="{{ $entite->id }}">{{ $entite->libelle }}</option>
                                @endforeach
                            </select> 
                              @if ($errors->has('organisation'))
                                  <span class="text-danger">{{ $errors->first('organisation') }}</span>
                              @endif
                          </div>
                            <div class="form-group">
                                <label name="description">Description</label>
                                <input type="text" class="form-control"  value="{{old('description',$entites->description)}}" placeholder="description"
                                    name="description" id="description"></textarea> 
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
        </section>
        
    @endsection
    @section('FootLink')
     <script src="{{asset('assets/js/page/datatables.js')}}"></script>
     <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
     <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
     <script src="{{asset('assets/bundles/prism/prism.js')}}"></script>
     <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    @endsection