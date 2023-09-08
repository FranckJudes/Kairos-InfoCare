@extends('admin.main-layout')
    @section('HeadLink')
    {{--  --}}
    @endsection

    @section('content')
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Details sur 
            {{$groupeAvecNombreUtilisateurs->libelle}}
          </h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-2">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list"
                  data-toggle="list" href="#list-home" role="tab">Generalites</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                  href="#list-profile" role="tab">Droits</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                  href="#list-messages" role="tab">Access</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                  href="#list-settings" role="tab">Membres</a>
              </div>
            </div>
            <div class="col-10">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                  aria-labelledby="list-home-list">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">libelle</th>
                        <th scope="col">description</th>
                        <th scope="col">nombre d'Utilisateurs</th>
                      </tr>
                    </thead>
                    <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>{{$groupeAvecNombreUtilisateurs->libelle}}</td>
                            <td>{{$groupeAvecNombreUtilisateurs->description}}</td>
                            <td>{{$groupeAvecNombreUtilisateurs->users_count}}</td>
                          </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel"
                  aria-labelledby="list-profile-list">
                    <h5>Les Access</h5>
                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel"
                  aria-labelledby="list-messages-list">
                  <h5>Les Droits</h5>
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel"
                  aria-labelledby="list-settings-list">
                  <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead>
                      <tr>
                        <th>{{__('utilisateur.photo')}}</th>
                        <th>{{__('utilisateur.nom')}}</th>
                        <th>{{__('utilisateur.sexe')}}</th>
                        <th>{{__('utilisateur.dateNaissance')}}</th>
                        <th>{{__('utilisateur.email')}}</th>
                        <th>{{__('utilisateur.telephone')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($utilisateursDuGroupe as $item) 
                        <tr>
                          <td><img  src="{{asset('storage/'. $item->photo)}}" width="35"></td>
                          <td>{{$item->name}}   {{$item->lastname}}</td>
                          <td>{{$item->sexe}}</td>
                          <td>{{$item->dateNaissance}}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->telephone}}</td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="6" style="text-align: center">Pas D'Utilisateur</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
        
    @endsection
  


    @section('FootLink')
     <script src="{{('assets/js/page/form-wizard.js')}}"></script>
     <script src="{{('assets/bundles/jquery-validation/dist/jquery.validate.min.js')}}"></script>
     <script src="{{('assets/bundles/jquery-steps/jquery.steps.min.js')}}"></script>
    @endsection