<!DOCTYPE html>
<head>
<style type="text/css">

 table.dataTable tbody tr{
  background-color: transparent !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button{
  padding: 0 !important;
  margin-left: 0 !important;
}
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">  </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
</head>


	<title>Home</title>
    <div>
                {{-- messsage pop up open --}}
                @if(session()->get('success'))
                    <div class="alert alert-success col-8">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="col-8">
                    @if(session()->get('danger'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('danger') }}
                        </div>
                    @endif
                </div>
                @if(count($errors) > 0)
                    <div class="col-8 error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <p class="text-center"> {{$error}}</p>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- messsage pop up close --}}

<table class="table table-bordered table-striped" id="files">
 <tr>
  <th width="10%">File</th>

  <th width="30%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('storage/app/public/'.$row->file) }}" class="file" width="75" /></td>

   <td><a href="{{url('delete-file/'.$row->id)}}"  class="button" type="btn btn-danger">Delete</a>
 
   </td>
  </tr>
 @endforeach
</table>
<body>
</div>
</body>
</html>


@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
 
   $(document).ready(function() {
    $('#files').DataTable( {
        "pagingType": "full_numbers",
         "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ -1,0, 1, 2, 3,4,5] }, 
        { "bSearchable": false, "aTargets": [ -1,0, 1, 2, 3,4,5 ] }
    ]
      
    } );
} );
 </script>
 

 @endsection