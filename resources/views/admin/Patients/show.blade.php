{{-- @extends('admin.main-layout')
    @section('HeadLink') 
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
        <link rel="stylesheet" href="{{asset('assets/Ztree/css/metroStyle/metroStyle.css')}}">

        <link rel="stylesheet" href="{{asset('assets/bundles/dropzonejs/dropzone.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <style>
          .ztree li a {
                  font-size: 16px; /* Augmentez la taille de la police en pixels */
                  font-weight: 100;
                  width: 300px; /* Augmentez la largeur en pixels */
              }
              
              
        </style>
    @endsection
  @section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Other news</h4>
                <div class="card-header-action">
                  <div class="card-header-action">
                     <a href="{{url()->previous()}}" class="btn btn-light">
                        <i class="fas fa-arrow-circle-left"></i> {{__('main.retour')}}
                      </a>
                      <button id="delete-file-button"  class="btn btn-danger">
                        suppprimer
                      </button>
                     <a id="save-button"  href="{{route('patient.show',$patients)}}" class="btn btn-success">
                       Enregister
                     </a>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row" >
                      <div class="col-3">
                          <div id="accordion">
                              <div class="accordion">
                                      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                          <h4>Documents list</h4>
                                      </div>
                                      <div class="accordion-body collapse show" >
                                          <ul id="treeDemo" class="ztree"></ul>
                                      </div>
                              </div>
                          </div>
                      </div>
                    <input type="hidden" id="patients_id" value="{{$patients}}">


                    <div class="col-9" id="iframe1">
                        <div class="tab-content no-padding"  id="myTab2Content">
                          <h3>Téléchargeur/visualiseur de documents</h3>
                          <hr>
                            <div class="col-lg-12">
                              <iframe src="" id="pdfViewer" frameborder="0" style="height:84vh; border: 1px" width="100%" height="100%"></iframe>
                            </div>    
                        </div>
                    </div>


                    <div class="col-9" id="file-upload-form">
                      <h3>Téléchargeur/visualiseur de documents</h3>
                      <hr>
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3" aria-expanded="true">
                                  <h4>Documents Uploader et Visualiser</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-3" data-parent="#accordion">
                                    <section class="section">
                                        <div class="section-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <form action="{{route('patientFiles.store')}}" class="dropzone" id="mydropzone">
                                                      @csrf
                                                          <input type="hidden" name="id_planClassement" id="id_planClassement">
                                                          <input type="hidden" name="id_delete" id="id_delete">

                                                          <input type="hidden" name="patients_id" id="patients_id"  value="{{$patients}}">

                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="table-1_length">
                                        <label>Show 
                                            <select name="table-1_length" aria-controls="tale-1" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
                                            <div class="col-sm-12 col-md-6"><div id="table-1_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="table-1"></label></div></div></div>
                                        <div class="row"><div class="col-sm-12">
                                        <table  class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                                      <thead>
                                        <tr role="row">
                                            <th class="text-center sorting_asc" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"   aria-sort="ascending">#</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="table-2" >name</th>
                                            <th class="text-center sorting_asc" tabindex="0" aria-controls="table-3" rowspan="1" colspan="1"  aria-sort="ascending">Taille </th>
                                            <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 73.1719px;">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody id="file-list">
                                       </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                       
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
                
  </div>     

    

  
  @endsection
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myLargeModalLabel">View PDF</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <iframe src="" id="pdf-preview" width="100%" height="500" frameborder="0"></iframe>
            </div>
          </div>
        </div>
</div>
 
        

    @section('FootLink')
    <script src="{{asset('assets/Ztree/js/jquery.ztree.all.js')}}"></script>
    <script src="{{asset('assets/Ztree/js/jquery.ztree.core.js')}}"></script>
    <script>
      var zTreeObj; 
      var id_Noeud;
      var id_patient =  document.getElementById('patients_id').value;
      var id_delete =  document.getElementById('id_delete').value;
      
      var selectedFileId; // Variable pour stocker l'ID du fichier sélectionné
      var iframe = document.querySelector('iframe1');
      var fileUploadForm = document.querySelector('#file-upload-form');

      $(document).ready(function(){
        $('#file-upload-form').hide();
                    var setting = {
                        data: {
                            simpleData: {
                                enable: true
                            },
                        },
                      callback: {
                          onClick: onClick,
                      }
                      }
                      
                      $.ajax({
                        url: "/getDossierPatient/"+id_patient,
                        type: 'GET',
                        dataType: 'json',
                          success: function(data) {
                            var treeData = data.treeData;
                             console.log(treeData); 
                            zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, treeData);
                          },
                          error: function (xhr, status, error) {
                                    // Gérez les erreurs ici
                                    console.log(error);
                                }
                    });

                    function onClick(event, treeId, treeNode) {

                              id_Noeud = treeNode.id;
                               console.log(id_Noeud);
                               document.getElementById('id_planClassement').value = id_Noeud;
                               selectedFileId = id_Noeud;
                               
                               if (treeNode.type == "fichier") {
                                   var iframe = document.querySelector('#pdfViewer');
                                   console.log(iframe);
                                   iframe.src = "/afficherPDF/" + id_Noeud;

                                     $('#file-upload-form').hide();
                                     $('#iframe1').show();
                                     document.getElementById('delete-file-button').disabled = false;

                                 }else{
                                    $('#file-upload-form').show();
                                     $('#iframe1').hide();
                                     document.getElementById('delete-file-button').disabled = true;

                                 }
                      }  
                  });

                            $("#delete-file-button").click(function () {
                              console.log(selectedFileId);
                                if (selectedFileId) {
                                    // Envoyez une demande de suppression au serveur
                                    $.ajax({
                                        url: "/deletePatientFiles/" + selectedFileId, // Ajoutez une route pour la suppression
                                        type: 'get',
                                      
                                        success: function (data) {
                                            // Gérez la réussite de la suppression, par exemple, affichez un message de confirmation
                                            console.log("Fichier supprimé avec succès");
                                            console.log(data);
                                            var treeNode = zTreeObj.getNodeByParam("id", selectedFileId);
                                                  if (treeNode) {
                                                      zTreeObj.removeNode(treeNode);
                                                  }
                                                  selectedFileId = null;
                                                  var iframe = document.querySelector('#pdfViewer');
                                                  iframe.src = "about:blank";
                                            },
                                        error: function (xhr, status, error) {
                                            // Gérez les erreurs ici
                                            console.log(error);
                                        }
                                    });
                                } else {
                                    // Gérez le cas où aucun fichier n'est sélectionné
                                    alert("Aucun fichier sélectionné.");
                                }
});
   </script>
    
    <script src="{{asset('assets/bundles/prism/prism.js')}}"></script>
    <script src="{{asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset("assets/bundles/dropzonejs/min/dropzone.min.js")}}"></script>
    <script src="{{asset("assets/js/page/multiple-upload.js")}}"></script>
    <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
        
    @endsection --}}


@extends('admin.main-layout')

@section('HeadLink') 
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<link rel="stylesheet" href="{{asset('assets/Ztree/css/metroStyle/metroStyle.css')}}">
<link rel="stylesheet" href="{{asset('assets/bundles/dropzonejs/dropzone.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
  .ztree li a {
    font-size: 16px;
    font-weight: 100;
    width: 100px;
  }
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Other news</h4>
        <div class="card-header-action">
          <a href="{{url()->previous()}}" class="btn btn-light">
            <i class="fas fa-arrow-circle-left"></i> {{__('main.retour')}}
          </a>
          <a id="save-button"  href="{{route('patient.show',$patients)}}" class="btn btn-success">
            Enregistrer
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-3">
            <div id="accordion">
              <div class="accordion">
                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                  <h4>Documents list</h4>
                </div>
                <div class="accordion-body collapse show">
                  <ul id="treeDemo" class="ztree"></ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-9" id="iframe1">
            <div class="tab-content no-padding" id="myTab2Content">
              <h3>Téléchargeur/visualiseur de documents</h3>
              <hr>
              <div class="col-lg-12">
                <iframe src="" id="pdfViewer" frameborder="0" style="height:84vh; border: 1px" width="100%" height="100%"></iframe>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-9" id="file-upload-form">
            <div class="tab-content no-padding" id="myTab2Content">
              <h3>Téléchargeur/visualiseur de documents</h3>
              <hr>
              <div class="col-lg-12">
                <form action="{{route('patientFiles.store')}}" class="dropzone" id="mydropzone">
                  @csrf
                      <input type="hidden" name="id_planClassement" id="id_planClassement">
                      <input type="hidden" name="id_delete" id="id_delete">
                      <input type="hidden" name="patients_id" id="patients_id"  value="{{$patients}}">
                      <input type="hidden" name="file_size" id="file_size">
                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


                </form>
                <div class="mt-2">
                  <!-- Bouton pour visualiser le document -->
                  <button id="view-button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="display: none;">
                    <i class="material-icons">remove_red_eye</i> Visualiser
                  </button>
                  <!-- Bouton pour enregistrer dans la base de données -->
                  <button id="save-button1" class="btn btn-success" style="display: none;">
                    <i class="material-icons">save</i>   Enregistrer
                  </button>
                  <!-- Bouton pour supprimer le document -->
                  <button id="delete-button" class="btn btn-danger" style="display: none;">
                    <i class="material-icons">delete</i> Supprimer
                  </button>
                </div>  
              </div>
            </div>
             <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                      <div class="row"><div class="col-sm-12">
                      <table  class="table" >
                        <thead>
                          <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">name</th>
                              <th class="text-center">Taille </th>
                              <th class="text-center">Nombre Pages</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                      <tbody id="Content12"></tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">View PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="" id="pdf-preview" width="100%" height="500" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>

@section('FootLink')
<script src="{{asset('assets/Ztree/js/jquery.ztree.all.js')}}"></script>
<script src="{{asset('assets/Ztree/js/jquery.ztree.core.js')}}"></script>
<script>
  var zTreeObj;
  var id_Noeud;
  var id_patient = document.getElementById('patients_id').value;
  var id_delete = document.getElementById('id_delete').value;

  var selectedFileId; // Variable pour stocker l'ID du fichier sélectionné
  var iframe = document.querySelector('#iframe1');
  var fileUploadForm = document.querySelector('#file-upload-form');

  $(document).ready(function(){

    $('#file-upload-form').hide();

    var setting = {
      data: {
        simpleData: {
          enable: true
        },
      },
      callback: {
        onClick: onClick,
      }
    }
    
    $.ajax({
      url: "/get-tree/",
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var treeData = data.treeData;
        // console.log(treeData);
        zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, treeData);
      },
      error: function (xhr, status, error) {
        // Gérez les erreurs ici
        console.log(error);
      }
    });
    

    function onClick(event, treeId, treeNode) {
      id_Noeud = treeNode.id;
      console.log(id_Noeud);
      document.getElementById('id_planClassement').value = id_Noeud;
      selectedFileId = id_Noeud;

      if (treeNode.type == "dossier") {
        
        $('#file-upload-form').hide();
        $('#iframe1').show();
        
        // Activer le bouton
      } else {
        
        $('#file-upload-form').show();
        $('#iframe1').hide();

        
        $.ajax({
         
            type: 'post',
            url: '/getPatientFile',
            data: {
                _token: '{{ csrf_token() }}',
                id_Noeud: id_Noeud,
                id_patient: id_patient
            },
            success: function(data) {
                // console.log(data);
                $('#Content12').html(data);
            }

          });
          


        // Désactiver le bouton
      }
    }  
  });


</script>

<script src="{{asset('assets/bundles/prism/prism.js')}}"></script>
<script src="{{asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset("assets/bundles/dropzonejs/min/dropzone.min.js")}}"></script>
<script src="{{asset("assets/js/page/multiple-upload.js")}}"></script>
<script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection
