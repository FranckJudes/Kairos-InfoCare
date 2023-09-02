@extends('admin.main-layout')
    @section('HeadLink')
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">

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
                  {{-- @dump($groupeUtilisateur->description) --}}
                  <form method="POST" action="">
                      {{-- @csrf
                      @method($groupeUtilisateur->exists ? 'PUT': 'POST') --}}
                     <div class="row mb-6">
                      
                      <div class="col-lg-6 col-sm-6">

                                <div class="form-group">
                                    <label name="name" >nom</label>
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="nom" id="name" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label name="description">Prenom</label>
                                    <input type="text" class="form-control"  value="{{old('lastname')}}" placeholder="Prenom"
                                        name="lastname" id="lastname"></textarea> 
                                    @if ($errors->has('lastname'))
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label name="sexe" >Sexe</label>
                                  <select class="form-control form-control-sm" name="sexe">
                                    <option value="masculin">Masculin</option>
                                    <option value="feminin">Feminin</option>
                                  </select>
                                  @if ($errors->has('sexe'))
                                      <span class="text-danger">{{ $errors->first('sexe') }}</span>
                                  @endif
                              </div>

                              <div class="form-group">
                                  <label name="CNI">Carte D'identite</label>
                                  <input type="text" class="form-control"  value="{{old('cni')}}" placeholder="carte d'identite"
                                      name="cni" id="cni"></textarea> 
                                  @if ($errors->has('cni'))
                                      <span class="text-danger">{{ $errors->first('cni') }}</span>
                                  @endif
                              </div>
                              <div class="form-group">
                                <label name="telephone">Telephone</label>
                                <input type="number" class="form-control"  value="{{old('telephone')}}" placeholder="N_Tel"
                                    name="telephone" id="telephone"></textarea> 
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                      </div>
                      <div class="col-lg-6 col-sm-6">

                        <div class="form-group">
                            <label name="dateNaissance" >Date de naissance</label>
                            <input type="date" name="dateNaissance" value="{{old('dateNaissance')}}" id="dateNaissance" class="form-control">
                            @if ($errors->has('dateNaissance'))
                                <span class="text-danger">{{ $errors->first('dateNaissance') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label name="email">Email</label>
                            <input type="email" class="form-control"  value="{{old('email')}}" placeholder="email"
                                name="eamil" id="email"></textarea> 
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label name="libelle" >Organisition parente</label>
                          
                              <select class="form-control select2" name="parent_id">
                                <option selected="" value="">Choose...</option>
                                {{-- @foreach ($Organisation as $entite)
                                    <option id="actuel" value="{{ $entite->id }}">{{ $entite->libelle }}</option>
                                @endforeach --}}
                            </select> 
                          
                          @if ($errors->has('organisation'))
                              <span class="text-danger">{{ $errors->first('organisation') }}</span>
                          @endif
                      </div>
                        

                      <div class="form-group">
                          <label name="Photo">Photo de Profil</label>
                          <input type="file" class="form-control" name="photo" accept="image/*">
                          @if ($errors->has('photo'))
                              <span class="text-danger">{{ $errors->first('photo') }}</span>
                          @endif
                      </div>
  
              </div>

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