"use strict";

// DropzoneJS
if (window.Dropzone) {
  Dropzone.autoDiscover = false;
}

// 
var id_delete;

var dropzone = new Dropzone("#mydropzone", {
        thumbnailWidth:2000,
        maxFilesize: 10000,
        acceptedFiles:".pdf",
        init: function () {
          this.on('addedfile', function (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // Affichez le PDF dans l'iframe
                var iframe = document.getElementById('pdf-preview');
                iframe.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });


        
        this.on('sending', function (file, xhr, formData) {
          // Récupérez les données supplémentaires à partir des champs de formulaire
          var id_planClassement = document.querySelector('input[name="id_planClassement"]').value;
          var patient_id = document.querySelector('input[name="patients_id"]').value;
          id_delete =  document.querySelector('input[name="id_delete"]').value;
          // Ajoutez ces données supplémentaires à la requête
          formData.append('id_planClassement', id_planClassement);
          formData.append('patient_id', patient_id);

      });


      this.on('success', function (file, response) {
          // Obtenir la liste des fichiers
          const fileList = document.getElementById('file-list');

          // Créer une nouvelle ligne
          const newRow = fileList.insertRow();
          
          // Colonne #
          const countCell = newRow.insertCell(0);
          countCell.innerText = fileList.rows.length - 1; // Numéro de ligne (commence à 1)

          // Colonne Nom du fichier
          const nameCell = newRow.insertCell(1);
          nameCell.innerText = file.name;

          // Colonne Taille
          const sizeCell = newRow.insertCell(2);
          sizeCell.innerText = (file.size / 1024).toFixed(2) + ' KB'; // Afficher la taille en KB

          // Colonne Actions
          const actionsCell = newRow.insertCell(3);

          // Bouton pour visualiser le PDF
          const viewButton = document.createElement('a');
          viewButton.href = response.view_url;
          viewButton.target = '_blank';
          viewButton.setAttribute('data-toggle', 'modal'); // Utilisez setAttribute
          viewButton.setAttribute('data-target', '.bd-example-modal-lg'); 
          viewButton.innerHTML = '<i class="material-icons">remove_red_eye</i>';
          actionsCell.appendChild(viewButton);

          const deleteButton = document.createElement('i');
            deleteButton.className = 'material-icons delete-file';
            deleteButton.innerText = 'delete';
            deleteButton.addEventListener('click', function () {
                if (confirm('Êtes-vous sûr de vouloir supprimer ce fichier ?')) {
                    const fileId = response.file_id; // Remplacez par l'ID du fichier à supprimer
                    console.log(fileId);
                    newRow.remove();
                    $.ajax({
                        url: '/deletePatientFiles/' + id_delete,
                        method: 'get',
                        success: function () {
                        },
                        error: function () {
                            alert('Une erreur s\'est produite lors de la suppression du fichier.');
                        }
                    });
                } 
            });

          actionsCell.appendChild(deleteButton)

          dropzone.removeAllFiles();

          });
      }
        }

);
