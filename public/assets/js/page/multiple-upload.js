"use strict";

// DropzoneJS
if (window.Dropzone) {
  Dropzone.autoDiscover = false;
}

var dropzone = new Dropzone("#mydropzone", {
        thumbnailWidth:200,
        maxFilesize:100000,
        acceptedFiles:".pdf",

        // init: function () {
        //   this.on('success', function (file, response) {
        //     // Ajouter le fichier au tableau des fichiers
        //     const fileList = document.getElementById('file-list');
        //     const newRow = fileList.insertRow();
        //     const idCell = newRow.insertCell(0);
        //     const nameCell = newRow.insertCell(1);
        //     const sizeCell = newRow.insertCell(2);
        //     const actionsCell = newRow.insertCell(3);
        //     idCell.innerText = response.id; // Vous pouvez attribuer un ID unique à chaque fichier
        //     nameCell.innerText = file.name;
        //     sizeCell.innerText = (file.size / 1024).toFixed(2) + 'Ko'; // Taille du fichier

        //     // Bouton pour visualiser le PDF
        //     const viewButton = document.createElement('i');
        //     viewButton.className = 'material-icons view-file';
        //     viewButton.innerText = 'remove_red_eye';
        //     viewButton.addEventListener('click', function () {
        //         // Ajoutez ici le code pour visualiser le PDF
        //     });
        //     actionsCell.appendChild(viewButton);

        //     // Bouton pour supprimer le PDF
        //     const deleteButton = document.createElement('i');
        //     deleteButton.className = 'material-icons delete-file';
        //     deleteButton.innerText = 'delete';
        //     deleteButton.addEventListener('click', function () {
        //         // Ajoutez ici le code pour supprimer le PDF
        //         newRow.remove(); // Supprimer la ligne du tableau
        //     });
        //     actionsCell.appendChild(deleteButton);
        // });

        //     dropzone.removeAllFiles();
        //   }


        init: function () {
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
   
              // Bouton pour supprimer le PDF
              const deleteButton = document.createElement('a');
              deleteButton.href = response.delete_url;
              deleteButton.innerHTML = '<i class="material-icons">delete</i>';
              actionsCell.appendChild(deleteButton);
              // dropzone.removeAllFiles();

          });
      }
        }

);




var minSteps = 6,
  maxSteps = 60,
  timeBetweenSteps = 100,
  bytesPerStep = 100000;

// dropzone.uploadFiles = function (files) {
//   var self = this;

  // for (var i = 0; i < files.length; i++) {

  //   var file = files[i];
  //    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

  //   for (var step = 0; step < totalSteps; step++) {
  //     var duration = timeBetweenSteps * (step + 1);
  //     setTimeout(function (file, totalSteps, step) {
  //       return function () {
  //         file.upload = {
  //           progress: 100 * (step + 1) / totalSteps,
  //           total: file.size,
  //           bytesSent: (step + 1) * file.size / totalSteps
  //         };

  //         self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
  //         if (file.upload.progress == 100) {
  //           file.status = Dropzone.SUCCESS;
  //           self.emit("success", file, 'success', null);
  //           self.emit("complete", file);
  //           self.processQueue();
  //         }
  //       };
  //     }(file, totalSteps, step), duration);
  //   }
  // }
// }