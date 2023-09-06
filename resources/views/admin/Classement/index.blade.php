@extends('admin.main-layout')
    @section('HeadLink')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" href="{{asset('assets/Ztree/css/zTreeStyle/zTreeStyle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Ztree/css/awesomeStyle/awesomeStyle.css')}}">

     @endsection
    @section('content')
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Plan de Classement</h4>
                            &nbsp;
                         
                          </div>
                          <div class="card-body">
                              <ul id="treeDemo" class="ztree"></ul>

                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        
    @endsection
   
    @section('FootLink')
      <script src="{{asset('assets/Ztree/js/jquery.ztree.all.js')}}"></script>
    <SCRIPT LANGUAGE="JavaScript">
          var zTreeObj;          
          var setting = {};
          $(document).ready(function(){
            var setting = {
                    data: {
                        simpleData: {
                            enable: true
                        },
                      view:{
                        showIcon:true
                      }
                    },
                    view: {
                      addDiyDom: null,
                      removeHoverDom: null,
                      selectedMulti: false
                    },
                  edit: {
                      enable: true,
                      showRemoveBtn: true,
                      showRenameBtn: true,
                      removeTitle: "Supprimer",
                      renameTitle: "Renommer"
                  },
                  }
                $.ajax({
                url: "get-tree",
                type: 'GET',
                dataType: 'json',

                  success: function(data) {
                    console.log(data);
                    zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, data);

                   }
                });
                
                });
        
     </SCRIPT>
    @endsection