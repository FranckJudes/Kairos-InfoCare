@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
    @endsection

    @section('content')
 

    <section>
        <div>
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <h5 class="card-title" id="formModal">{{__('utilisateur.titrePageUpdatePage')}}</h5>
                </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('passwordUpdate') }}">
                            @csrf
                   
                                <div class="form-group">
                                    <label name="valeur"> {{__('utilisateur.titrePageResetPassord')}} </label>
                                    <input type="text" name="valeur" value="{{old('valeur', $Password->valeur)}}" id="valeur" class="form-control">
                                    @if ($errors->has('valeur'))
                                    <span class="text-danger">{{ $errors->first('valeur') }}</span>
                                    @endif
                                </div>
                        
                            <button value="Enregistrer" class="btn btn-primary m-t-15 waves-effect">{{__('utilisateur.enregister')}}</button>
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