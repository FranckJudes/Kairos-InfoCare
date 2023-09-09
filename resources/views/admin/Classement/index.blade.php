@extends('admin.main-layout')
@section('HeadLink')
    <link rel="stylesheet" href="{{asset('assets/bundles/prism/prism.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" href="{{asset('assets/Ztree/css/zTreeStyle/zTreeStyle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Ztree/css/awesomeStyle/awesomeStyle.css')}}">
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                          <div class="card-header">
                              <h4>Agenda de passage</h4>
                          </div>
                          <div class="card-body">
                            <ul id="treeDemo" class="ztree"></ul>
                        </div>
                    </div>
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Gestion</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <button  class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#exampleModal" style="width: 100%"><i class="fas fa-plus"></i> Ajouter</a>
                      </div>
                      <div class="col-6">
                        <button class="btn btn-icon icon-left btn-primary" id="modifier"  data-toggle="modal" data-target="#exampleModal2"  style="width: 100%"><i class="far fa-edit"></i> Modifier</a>
                      </div>
                      <div class="col-12 p-3">
                        <button  id="supprimer" class="btn btn-icon icon-left btn-danger" style="width: 100%"><i class="fas fa-trash-alt"></i> Suppression</a>
                      </div>
                    </div>
                  </div>
                </div>
    </section>

@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">  
          <h5 class="modal-title" id="formModal">Ajouter un Dossier / un Fichier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form  id="create-folder-form">
              <div class="form-group">
                <label name="libelle">Type de document</label>
                  <select class="form-control" name="type" id="type" @required(true)>
                      <option value="" selected>Choisir ...</option>
                          <option value="dossier">Dossier</option>
                          <option value="fichier">Fichier</option>
                  </select> 
              </div>
              <div class="form-group">
                <label name="libelle">Libelle</label>
                <input type="text" @required(true) name="libelle" value="{{old('libelle')}}" id="libelle" class="form-control">
              </div>
              <div class="form-group">
                <label name="description">L'element Parent</label>
                  <select class="form-control" name="parent_id" id="parent_id">
                    <option value="null" selected>Choisir ...</option>
                      @foreach ($PlanClassement as $item)
                        <option  value="{{$item->id}}">{{$item->libelle}}</option>
                      @endforeach
                </select> 
             </div>
              <div class="form-group">
                  <label name="description">Description</label>
                  <input type="text"  @required(true) class="form-control" value="{{old('description')}}" id="description" value="" placeholder="Description" name="description"></textarea> 
              </div>
              <div class="form-group">
                <button value="Enregistrer" type="submit"  class="btn btn-success m-t-15 waves-effect" value="Enregistrer">Enregistrer</button>
              </div>
          </form>
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
    $(document).ready(function(){
     
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
                    // Fonction d'evement cliquable
                    function onClick(event, treeId, treeNode) {
                              id_Noeud = treeNode.id;
                               console.log(id_Noeud);
                               var bouton = $('#modifier');

                            bouton.attr('data-toggle', 'modal'); // Modifiez la valeur de l'attribut 'data-action'
                            bouton.attr('data-target', '#exampleModal'); // Modifiez la valeur de l'attribut 'data-action'
                            bouton.prop('disabled', false); 
              
                      }  
                  $.ajax({
                  url: "get-tree",
                  type: 'GET',
                  dataType: 'json',
  
                    success: function(data) {
                      var treeData = data.treeData;
                      console.log(treeData); 
                      zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, treeData);
                     }
                  });
                  
                  });

                  $('#supprimer').on('click', function (e) {
                    console.log(id_Noeud);
                    var node = zTreeObj.getNodeByParam("id", id_Noeud, null); // Obtenez le nœud à supprimer
                    if (node) {
                      location.reload();
                      zTreeObj.removeNode(node); // Supprimez le nœud de l'arborescence
                        $.ajax({
                            url: "deleteClassement/" + id_Noeud,
                            type: 'get',
                            success: function (data) {
                              
                            }
                        });

              }})

              // 
            $('#modifier').on('click', function (e) {
              var h5Element = $('#formModal');
              h5Element.text('Modifier L\'element '); 
              var node = zTreeObj.getNodeByParam("id", id_Noeud, null); // Obtenez le nœud à supprimer
              if (node) {
                  $.ajax({
                      url: "classement/" + id_Noeud,
                      type: 'get',
                      success: function (data) {
                        console.log(data);
                          document.getElementById('libelle').value = data.libelle;
                          document.getElementById('description').value = data.description;
                          document.getElementById('type').value = data.type;
                          document.getElementById('parent_id').value = data.parent_id;
                          var form = document.getElementById("create-folder-form"); 
                          form.id = "update-folder-form";
                          console.log(form);
                        }
                      });
                    }else{
                      alert('Veuillez selectionnez l\'element a modifier');
                      
                    }
                    
                   
              });
      </script>
      <script>
               $(document).ready(function () {

                    $('#create-folder-form').submit(function (e) {
                        e.preventDefault();

                        // Récupérez les données du formulaire
                        var libelle = $('#libelle').val();
                        var parent_id = $('#parent_id').val(); // Vous pouvez récupérer cette valeur depuis votre arborescence zTree
                        var description = $('#description').val();
                        var type = $('#type').val();

                        console.log(libelle , parent_id,description,type);
                        // Envoyez les données au serveur via AJAX
                        $.ajax({
                            url: "classement", // Remplacez par la route appropriée
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                libelle: libelle,
                                parent_id: parent_id,
                                description: description,
                                type :  type
                            },
                            
                            success: function (response) {
                              location.reload(true); 
                                
                            },
                            error: function (xhr, status, error) {
                                // Gérez les erreurs ici
                                console.error(error);
                            }
                        });
                    
                    });


                    
                    
                });

                $('#exampleModal').on('hidden.bs.modal', function () {
                    var h5Element = $('#formModal');
                  h5Element.text('Ajouter un Dossier / un Fichier');
              });
      </script>

  

    
@endsection
