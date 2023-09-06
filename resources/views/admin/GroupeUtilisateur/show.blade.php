@extends('admin.main-layout')
    @section('HeadLink')
    {{--  --}}
    @endsection

    @section('content')
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Details sur {{$groupeUtilisateur->libelle}}</h4>
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
                            <td>{{$groupeUtilisateur->libelle}}</td>
                            <td>{{$groupeUtilisateur->description}}</td>
                            <td>{{$groupeUtilisateur->users_count}}</td>
                          </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel"
                  aria-labelledby="list-profile-list">
                  Deserunt cupidatat anim ullamco ut dolor anim sint nulla amet incididunt tempor ad ut
                  pariatur officia culpa laboris occaecat. Dolor in nisi aliquip in non magna amet nisi sed
                  commodo proident anim deserunt nulla veniam occaecat reprehenderit esse ut eu culpa fugiat
                  nostrud pariatur adipisicing incididunt consequat nisi non amet.
                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel"
                  aria-labelledby="list-messages-list">
                  In quis non esse eiusmod sunt fugiat magna pariatur officia anim ex officia nostrud amet
                  nisi pariatur eu est id ut exercitation ex ad reprehenderit dolore nostrud sit ut culpa
                  consequat magna ad labore proident ad qui et tempor exercitation in aute veniam et velit
                  dolore irure qui ex magna ex culpa enim anim ea mollit consequat ullamco exercitation in.
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel"
                  aria-labelledby="list-settings-list">
                  Lorem ipsum culpa in ad velit dolore anim labore incididunt do aliqua sit veniam commodo
                  elit dolore do labore occaecat laborum sed quis proident fugiat sunt pariatur. Cupidatat ut
                  fugiat anim ut dolore excepteur ut voluptate dolore excepteur mollit commodo.
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