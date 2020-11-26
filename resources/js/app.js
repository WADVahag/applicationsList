require('./bootstrap');

// $(".datatable__server-side").each(function (){

//   const ajaxUrl = $(this).data("ajax-url");

//   if(!ajaxUrl.length) throw new Error("Please specify correct url in data-ajax-url attribute!");

//    $(this).DataTable({
//      processing: true,
//      serverSide: true,
//      ajax: ajaxUrl
//    });
// });

$('[data-toggle="datepicker"]').datepicker({
  format: 'yyyy-mm-dd'
});