@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">
      @section('title', $Utilisateur->exists ? __('utilisateur.titreUpdate') : __('utilisateur.titreCreer'))

    @endsection

    @section('content')
    <section>
      <div>
      <div class="card">
          <div class="card-content">
              <div class="card-header">
                  <h5 class="card-title" id="formModal">@yield('title')</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route($Utilisateur->exists ? 'Utilisateur.update' : 'Utilisateur.store', $Utilisateur->id)}}"  enctype="multipart/form-data">
                       @csrf
                      @method($Utilisateur->exists ? 'PUT': 'POST') 
                    <div class="row mb-6">
                      
                      <div class="col-lg-6 col-sm-6">

                                <div class="form-group">
                                    <label name="name" >{{__('utilisateur.nom')}}</label>
                                    <input type="text" name="name" value="{{old('name',$Utilisateur->name)}}" placeholder="nom" id="name" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label name="lastname">{{__('utilisateur.prenom')}}</label>
                                    <input type="text" class="form-control"  value="{{old('lastname',$Utilisateur->lastname)}}" placeholder="Prenom"
                                        name="lastname" id="lastname"></textarea> 
                                    @if ($errors->has('lastname'))
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label name="sexe" >{{__('utilisateur.sexe')}}</label>
                                  <select class="form-control form-control-sm" name="sexe">
                                    <option value="" selected>{{__('utilisateur.choisirSexe')}}</option>
                                    <option value="masculin">{{__('utilisateur.masculin')}}</option>
                                    <option value="feminin">{{__('utilisateur.feminin')}}</option>
                                  </select>
                                  @if ($errors->has('sexe'))
                                      <span class="text-danger">{{ $errors->first('sexe') }}</span>
                                  @endif
                              </div>

                              <div class="form-group">
                                  <label name="CNI">{{__('utilisateur.cni')}}</label>
                                  <input type="text" class="form-control"  value="{{old('cni',$Utilisateur->cni)}}" placeholder="carte d'identite"
                                      name="cni" id="cni"></textarea> 
                                  @if ($errors->has('cni'))
                                      <span class="text-danger">{{ $errors->first('cni') }}</span>
                                  @endif
                              </div>
                              <div class="form-group">
                                <label name="telephone">{{__('utilisateur.telephone')}}</label>
                                <input type="number" class="form-control"  value="{{old('telephone',$Utilisateur->telephone)}}" placeholder="N_Tel"
                                    name="telephone" id="telephone"></textarea> 
                                @if ($errors->has('telephone'))
                                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label name="Photo">{{__('utilisateur.photo')}}</label>
                                <input class="form-control" type="file" name="photo" value="{{old('photo',$Utilisateur->photo)}}" accept="image/*"  id="formFile">                        
                              @if ($errors->has('photo'))
                                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>
                      </div>
                      <div class="col-lg-6 col-sm-6">

                            <div class="form-group">
                                <label name="dateNaissance" >{{__('utilisateur.dateNaissance')}}</label>
                                <input type="date" name="dateNaissance" value="{{old('dateNaissance',$Utilisateur->dateNaissance)}}" id="dateNaissance" class="form-control">
                                @if ($errors->has('dateNaissance'))
                                    <span class="text-danger">{{ $errors->first('dateNaissance') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label name="dateNaissance" >{{__('utilisateur.lieuNaissance')}}</label>
                                <input type="text" name="lieuNaissance" value="{{old('lieuNaissance',$Utilisateur->lieuNaissance)}}" id="lieuNaissance" class="form-control">
                                @if ($errors->has('lieuNaissance'))
                                    <span class="text-danger">{{ $errors->first('lieuNaissance') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                    <label name="email">{{__('utilisateur.email')}}</label>
                                    <input type="email" class="form-control"  value="{{old('email',$Utilisateur->email)}}" placeholder="email"
                                        name="email" id="email"></textarea> 
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                            </div>
                            @php
                                $orgId = $Utilisateur->entite()->pluck('id');    
                            @endphp
                            <div class="form-group">
                                <label name="libelle">{{__('utilisateur.organisation')}}</label>
                                
                                    <select class="form-control" multiple="" name="organisation[]" data-height="100%" style="height: 100%;">
                                        @foreach ($Organisation as $entite)
                                            <option id="actuel" @selected($orgId->contains($entite->id)) value="{{ $entite->id }}">{{ $entite->libelle }}</option>
                                        @endforeach
                                    </select>
                                
                                @if ($errors->has('organisation'))
                                    <span class="text-danger">{{ $errors->first('organisation') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label name="libelle">{{__('utilisateur.entites')}}</label>
                                
                                    <select class="form-control" multiple="" name="groupes[]" data-height="100%" style="height: 100%;">
                                        @foreach ($groupes as $entite)
                                            <option id="actuel" @selected($orgId->contains($entite->id)) value="{{ $entite->id }}">{{ $entite->libelle }}</option>
                                        @endforeach
                                    </select>
                                
                                @if ($errors->has('groupes'))
                                    <span class="text-danger">{{ $errors->first('groupes') }}</span>
                                @endif
                            </div>
                        </div>
                    <div class="col-lg-4 col-sm-4">
                    </div> 
                    <div class="col-lg-4 col-sm-4">
                        <button value="Enregistrer" style="width: 100%" class="btn btn-success m-t-15 waves-effect">{{__('utilisateur.enregister')}}</button>
                    </div> 
                    <div class="col-lg-4 col-sm-4">
                    </div> 
                    @if ($Utilisateur->exists)
                        <div class="col-lg-6 col-sm-6">
                            <button value=""  style="width: 100%" class="btn btn-danger m-t-15 waves-effect">{{__('utilisateur.ReninialiserPass')}}</button>
                        </div>
                    @endif
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