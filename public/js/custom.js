// import Swal from 'sweetalert2'


$(document).ready( function () {

   window.livewire.on('productoutOfSTock', () => {
      Swal.fire({
        icon: 'warning',
        text: 'La quantité du produit selectioné n\'exist pas dans le stock',
         }).then(() => {});
   });

   $('#Table').DataTable();
   
   $('#TableSelectedProduct').DataTable({
       "columnDefs": [
         { "width": "80%", "targets": 1 }
       ]
   });

   $('#TableRemise').DataTable({
       "columnDefs": [
         { "width": "5%", "targets": 1 },
         { "width": "30%", "targets": 2 },
         { "width": "5%", "targets": 3 },
         { "width": "15%", "targets": 4 },
         { "width": "15%", "targets": 4 },
       ]
   });

   $('#selectProductTable').DataTable({
       "columnDefs": [
         { "width": "5%", "targets": 0 },
         { "width": "25%", "targets": 1 },
         null,
         { "width": "5%", "targets": 3 },
       ]
   });
   
   window.livewire.on('closeModel', () => {
       $('.modal').modal('hide');
   });

   $('#showProductsTable').DataTable({
      "columnDefs": [
        { "width": "20%", "targets": 1 },
      ]
  });
  
   $(document).ready( function () {
      $('#selectProductTable').DataTable({
         "columnDefs": [
            { "width": "10%", "targets": 0 },
            { "width": "15%", "targets": 3 }
         ]
      });
   });



});