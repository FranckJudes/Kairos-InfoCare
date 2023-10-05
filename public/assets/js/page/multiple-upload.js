// "use strict";

// // DropzoneJS
// if (window.Dropzone) {
//   Dropzone.autoDiscover = false;
// }

// document.addEventListener("DOMContentLoaded", function () {

// var id_delete;

// var dropzone = new Dropzone("#mydropzone", {
//         thumbnailWidth:20000,
//         maxFilesize: 10000,
//         acceptedFiles:".pdf",
//         init: function () {
//           this.on('addedfile', function (file) {
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 // Affichez le PDF dans l'iframe
//                 var iframe = document.getElementById('pdf-preview');
//                 iframe.src = e.target.result;
//             };
//             reader.readAsDataURL(file);
//         });


        
//             this.on('sending', function (file, xhr, formData) {
//               // Récupérez les données supplémentaires à partir des champs de formulaire
//               var id_planClassement = document.querySelector('input[name="id_planClassement"]').value;
//               var patient_id = document.querySelector('input[name="patients_id"]').value;
//               id_delete =  document.querySelector('input[name="id_delete"]').value;
//               var filesize = document.getElementById('file_size').value = file.size;
              
//               // Ajoutez ces données supplémentaires à la requête
//               formData.append('id_planClassement', id_planClassement);
//               formData.append('patient_id', patient_id);
//               formData.append('filesize', (file.size / 1024).toFixed(2) + ' KB');

//           });


//           this.on('success', function (file, response) {
//               document.getElementById('view-button').style.display = 'inline-block';
//               document.getElementById('save-button').style.display = 'inline-block';
//               document.getElementById('delete-button').style.display = 'inline-block';
              
//               // Obtenir la liste des fichiers
            
//               });
//       }
//     }

// );

// })


"use strict";

// DropzoneJS
if (window.Dropzone) {
  Dropzone.autoDiscover = false;
}

document.addEventListener("DOMContentLoaded", function () {

  var id_delete;

  var dropzone = new Dropzone("#mydropzone", {
    thumbnailWidth: 20000,
    maxFilesize: 10000,
    acceptedFiles: ".pdf",
    init: function () {
      this.on('addedfile', function (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
          var iframe = document.getElementById('pdf-preview');
          iframe.src = e.target.result;
        };
        reader.readAsDataURL(file);
      });

      // this.on('sending', function (file, xhr, formData) {
      //   var id_planClassement = document.querySelector('input[name="id_planClassement"]').value;
      //   var patient_id = document.querySelector('input[name="patients_id"]').value;
      //   id_delete = document.querySelector('input[name="id_delete"]').value;
      //   var filesize = document.getElementById('file_size').value = file.size;

      //   formData.append('id_planClassement', id_planClassement);
      //   formData.append('patient_id', patient_id);
      //   formData.append('filesize', (file.size / 1024).toFixed(2) + ' KB');

      // });

      this.on('success', function (file, response) {
        document.getElementById('view-button').style.display = 'inline-block';
        document.getElementById('save-button1').style.display = 'inline-block';
        document.getElementById('delete-button').style.display = 'inline-block';
      });
    }
  });

  document.getElementById('view-button').addEventListener('click', function () {
    // Obtenez le premier fichier téléchargé dans le Dropzone
    var firstFile = dropzone.files[0];
  
    if (firstFile) {
      var reader = new FileReader();
      reader.onload = function (e) {
        var iframe = document.getElementById('pdf-preview');
        iframe.src = e.target.result;
      };
      reader.readAsDataURL(firstFile);
    }
  });

  document.getElementById('save-button1').addEventListener('click', function () {
    var formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}'); // Ajoutez le jeton CSRF
    formData.append('id_planClassement', document.querySelector('input[name="id_planClassement"]').value);
    formData.append('patient_id', document.querySelector('input[name="patients_id"]').value);
    formData.append('filesize', document.getElementById('file_size').value);
  
    $.ajax({
      url: '/patientFiles', // Spécifiez l'URL d'enregistrement appropriée
      method: 'POST', // Utilisez la méthode POST ou PUT en fonction de votre API
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        'id_planClassement' :  document.querySelector('input[name="id_planClassement"]').value,
        'patient_id' : document.querySelector('input[name="patients_id"]').value,
        'filesize' : document.getElementById('file_size').value,
      },
      processData: false,
      contentType: false,
      success: function (response) {
        console.log("Success");
      },
      error:function (xhr, status, error) {
        // Gérez les erreurs ici
        console.log(error);
      }
    });
  });
  

  document.getElementById('delete-button').addEventListener('click', function () {
    dropzone.removeAllFiles();
  });

});
