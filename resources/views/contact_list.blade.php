<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>  
<div class="container mt-5"  style="margin-top: 100px;">
   <a href="{{route('contact.create')}}" class="btn btn-info">Add Contact </a> <small>Tatal: {{$total_contacts}}</small>
   <br><br>
  @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
  @endif
  <div class="row">
     <div class="col-md-12">
         <table class="table table-bordered">
               <tr class="text-center">
                   <th>SN#</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Phone</th>
                   <th>Action</th>
               </tr>
               @foreach($contacts as $key => $contact)
               <tr class="text-center">
                   <td>{{$key+1}}</td>
                   <td>{{ $contact->name }}</td>
                   <td>{{ $contact->lastName }}</td>
                   <td>{{ $contact->phone }}</td>
                   <td><a href="{{ route('contact.edit',$contact->id) }}" class="btn btn-sm btn-info">Edit</a> | <a href="#" onclick="contact_delete_modal('{{ base64_encode($contact->id) }}');" class="btn btn-sm btn-danger">Delete</a></td>
               </tr>
               @endforeach
         </table>
         <div class="pagination">
         {{ $contacts->links() }}
         </div>
     </div>
  </div>

  <div id="contact_delete_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-heading text-left">Delete Warning!</h4>
        <button type="button" class="close btn btn-sm btn-danger" data-dismiss="modal">&nbsp;&nbsp; &times;</button>
      </div>
      <div class="modal-body">
          Are you sure to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        <a id="delete_item" class="btn btn-danger" >Yes, Delete</a>
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>

<script type="text/javascript">
  function contact_delete_modal(id){
    $("#contact_delete_modal").modal('show');
    $("#contact_delete_modal #delete_item").attr('href', `{{url('/contact/destroy')}}/${id}`);
  }
  </script>
