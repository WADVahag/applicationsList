@extends('layout')

@section('content')
<h1>list page</h1>

<div class="container">
  <table id="test" class="table table-stripped datatable llldatatable__server-side" data-ajax-url="{{route('applications.index')}}">
    <thead>
      <th>Название</th>
      <th>Дата создания</th>
      <th>Дата завершения</th>
      <th>Статус</th>
      <th>Действия</th>
    </thead>

    <tbody></tbody>

    <thead>
      <th>Название</th>
      <th>Дата создания</th>
      <th>Дата завершения</th>
      <th>Статус</th>
      <th>Действия</th>
    </thead>
  </table>
</div>
@endsection

@push("scripts")

<script>

  $("#test").each(function (){

  const ajaxUrl = $(this).data("ajax-url");

  if(!ajaxUrl.length) throw new Error("Please specify correct url in data-ajax-url attribute!");

   $(this).DataTable({
     processing: true,
     serverSide: true,
     ajax: ajaxUrl,
     columns: [
       { data: "name" },
       { data: "created_at" },
       { data: "finish_date" },
       { data: "status" },
       { data: "actions", searchable: false, orderable: false },
     ]
   });
});

</script>

@endpush
