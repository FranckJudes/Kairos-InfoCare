@extends('admin.main-layout')
    @section('HeadLink') 
    
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
    <div class="card">
      <div class="card-header">
        <h4>Viewer</h4>
            <div class="card-header-action">
              <a href="#" class="btn btn-primary">View All</a>
              <a href="#" class="btn btn-danger">Delete All</a>
            </div>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-4">
              <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                  <div class="accordion-body collapse show" >
                      <ul id="treeDemo" class="ztree"></ul>
                  </div>
               </ul>
            </div>
            <input type="hidden" id="patients_id" value="{{$patients}}">
            <div class="col-8">
                <div class="tab-content no-padding"  id="myTab2Content">

                  <hr>
                    <div class="col-lg-12">
                      <iframe src="" id="pdfViewer" frameborder="0" style="height:84vh; border: 1px" width="100%" height="100%"></iframe>
                    </div>    
                </div>
            </div>
        </div>
      </div>
    </div>
  @endsection
 
    @section('FootLink')
    <script src="{{asset('assets/Ztree/js/jquery.ztree.all.js')}}"></script>
    <script src="{{asset('assets/Ztree/js/jquery.ztree.core.js')}}"></script>
    <script src="{{ asset('assets/bundles/ckeditor/ckeditor.js')}}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/ckeditor.js')}}"></script>
    <!-- Template JS File -->
    
    <script>
        var zTreeObj; 
        var id_Noeud;
          var id_patient =  document.getElementById('patients_id').value;
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
                        
                        $.ajax({
                          url: "/getDossierPatient/"+id_patient,
                          type: 'GET',
                          dataType: 'json',
                            success: function(data) {
                              var treeData = data.treeData;
                              //  console.log(treeData); 
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
                                 id_Noeud = treeNode.id;
                                 if (treeNode.type == "fichier") {
                                   var iframe = document.querySelector('iframe');
                                   iframe.src = "/afficherPDF/" + id_Noeud;
                                  
                                 }
                        }  
                    });
     </script>
      
        
    @endsection