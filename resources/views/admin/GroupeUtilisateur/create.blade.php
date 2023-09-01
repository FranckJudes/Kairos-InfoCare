@extends('admin.main-layout')


@section('title', $groupeUtilisateur->exists ? "Editer un groupe" : "Creer un groupe")

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
                            <input type="text" name="libelle" value="{{old('libelle',$groupeUtilisateur->libelle)}}" id="libelle" class="form-control">
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
    
                            <button value="Enregistrer" class="btn btn-primary m-t-15 waves-effect">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection