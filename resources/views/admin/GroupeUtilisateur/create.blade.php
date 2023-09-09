@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
    @endsection

@section('title', $groupeUtilisateur->exists ? __('groupeUtilisateur.titreUpdate') : __('groupeUtilisateur.titreCreer'))

@section('content')
    <section>
        <div>
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <h5 class="card-title" id="formModal">@yield('title')</h5>
                </div>
                <div class="card-body">
                    {{-- @dump($groupeUtilisateur->description) --}}
                    <form method="POST" action="{{ route($groupeUtilisateur->exists ? 'GroupeUtilisateur.update' : 'GroupeUtilisateur.store', $groupeUtilisateur->id)}}">
                        @csrf
                        @method($groupeUtilisateur->exists ? 'PUT': 'POST')
                        <div class="form-group">
                            <label name="libelle" >Libelle</label>
                            <input type="text" name="libelle" value="{{old('libelle',$groupeUtilisateur->libelle)}}" id="libelle" class="form-control" placeholder="libelle">
                            @if ($errors->has('libelle'))
                                <span class="text-danger">{{ $errors->first('libelle') }}</span>
                            @endif
                        </div>
    
                        <div class="form-group">
                            <label name="description">Description</label>
                            <input type="text" class="form-control"  value="{{old('description',$groupeUtilisateur->description)}}" placeholder="description"
                                name="description" id="description"></textarea> 
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
    
                            <button value="Enregistrer" class="btn btn-success m-t-15 waves-effect">{{__('groupeUtilisateur.btnEnregistre')}}</button>
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
@endsection