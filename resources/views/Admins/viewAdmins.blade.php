@extends('Admins.AdminDashBoard')
@section('MenuContent')

<div class="row" >
<div class="col-md-4">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
</div>
</div>
<table id="myTable" class="table-bordered">
  <tr class="header-table">
  	<th style="width:5%;">Id</th>
    <th style="width:30%;">Name</th>
    <th style="width:30%;">Email</th>
      <th style="width:15%;">Role</th>
      <th style="width:20%;">Action</th>


  </tr>
  <div class="container-fluid table-wrapper-scroll-y">
    @if(isset($users))
      <?php $i=0; ?>
  @foreach($users as $user)
  @if($user->id==2)
  @php continue; @endphp
  @endif
  <tr id="data">
    <td>{{++$i}}</td>
    <td>{{$user->first_name}} {{$user->last_name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$roletype}}</td>
    <td > <form action="/viewAdmin/{{$user->id}}" id="idUser" method="post" >
          {{csrf_field()}}
        {{method_field('DELETE')}}
        <button  type="submit" class="btn btn-danger"id="confirm"><i class="fa fa-trash-o" style="font-size:20px"></i> Delete</button>
        </form>
      </td>
  </tr>
</div>
 @endforeach
 @endif
</table>
</div>




    

<script>
  $('#idUser').submit(function() {
   return confirm("Are you sure u want to delete?");
  });
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

@endsection