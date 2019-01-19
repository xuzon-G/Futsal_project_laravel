<style type="text/css">
  .mybookTable td
  {
    background-color: white;
  }
    .mybookTable th
  {
    background-color:grey;
  }
</style>
@extends('Clients.ClientDashBoard')
@section('MenuContent')

<div class="container-fluid">
  <h2>Booking Details</h2>
    
  <br>
  <table class="table table-bordered mybookTable ">
    <thead>
      <tr> 
        <th>Date</th>
        <th>Time Duration</th>
        <th>price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
       
      @foreach($books as $book)
      
      <tr>
        <td>{{$book->date}}</td>
        <td>{{$book->time}}</td>
        <td>{{$book->price}}</td>
        <td ><form action="/myBooking/{{$book->id}}" id="idUser" method="post" >
          {{csrf_field()}}
        {{method_field('DELETE')}}
        <button  type="submit" class="btn btn-danger" id="confirm"><i class="fa fa-trash-o" style="font-size:20px"></i>Cancel Booking</button>
        </form></td>
      </tr>

    @endforeach
  
    </tbody>
  </table>
  
</div>
<script type="text/javascript">
  
     $('#idUser').submit(function() {
   return confirm("Are you Sure u Want to delete this Booking?");
  });
</script>


</body>
</html>
@endsection