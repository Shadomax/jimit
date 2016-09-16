$(document).ready(function () {

//Event handler for restoring items
$('.restore_item').click(function (e) {
  e.preventDefault();
  $('#restore').modal();
  var address = $(this).attr('href');
  $('#restore').find('#confirm-restore').attr('href', address); ;
});

  //Event handler to permenantly delete action
  $('.delete_permenant').click(function (e) {
    e.preventDefault();
    $('#delete').modal();
    var address = $(this).attr('href');
    $('#delete').find('#confirm-delete').attr('href', address);
      
  });

  //Event handler for delete action
  $('.delete_item').click(function (e) {
    e.preventDefault();
    $('#delete').modal();
    var address = $(this).attr('href');
    $('#delete').find('#confirm-delete').attr("href", address);
  });


    });