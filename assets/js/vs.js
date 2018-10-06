$(document).ready(function(){
  $('.table-data').DataTable() ;

  $('.select2').select2() ;

  $('#ptype').hide() ;
  $('#sskill').hide() ;
  $('#form-hutang').hide() ;
  $('#hide-form-debt').hide() ;
})

function show_delete_class_alert(event, id_class, id_school){
  event.preventDefault() ;
  swal({
    title : '',
    text : 'Are you sure want to delete this data?',
    type : 'warning',
    showCancelButton : true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No'
  })
    .then((result) => {
      if(result.value){
        location.href = '<?php echo base_url();?>School/delete_class/' + id_class + '/' + id_school
        return true ;
      }else if(result.dismiss === 'cancel'){
        swal('Cancelled', 'error') ;
        return false ;
      }
    })
}