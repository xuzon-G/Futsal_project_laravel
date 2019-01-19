@extends('Admins.AdminDashBoard')
@section('MenuContent')

	<style type="text/css">
		.mybookTable th
  {
    background-color:grey;
  }
  .mybookTable td
  {
  	background-color:#7db9b3;
  }
 .mybookTable
 {
  margin-top:5px;
 }
	</style>
  <div class="container-fluid">
    <div class="row ">
            <form action="/viewBooking">
            <div class="col-md-4" style="">
            <div id="datepicker" class="input-group date "data-date-format="yyyy-mm-dd" >
            <span class="input-group-addon date"><i class="fa fa-calendar"></i></span>
            <input type="text" name="datecal" id="calDate" class="form-control" style="border-radius: 0px;" value="{{$date}}" >
            </div>
            </div>
            <div class=" col-md-2" style="padding:0px ">
            <button type="submit"  id="btncal" class="btn btn-success btn-block" ><i class="fa fa-search-minus "></i> Show Data</button>
            </div>
            </form>
          </div>
  <table class="table table-bordered mybookTable table-responsive ">
     
      <tr style="margin-top: 10px"> 
        <th width="10%">Date</th>
        <th width="30%">Email</th>
        <th width="15%">Contact no.</th>
        <th width="10%">Time Duration</th>
        <th width="15%">price</th>
        <th width="15%">Action</th>
      </tr>
    
    <tbody>

      @foreach($books as $book)
      
      <tr >
	   <td>{{$book->date}}</td>
	   <td>{{$book->email}}</td>
	   <td>{{$book->phone}}</td>
        <td>{{$book->time}}</td>
        <td>{{$book->price}}</td>
        <td > <form action="/viewBooking/{{$book->id}}" id="idUser" method="post" >
          {{csrf_field()}}
        {{method_field('DELETE')}}
        <button  type="submit" class="btn btn-danger"id="confirm"><i class="fa fa-trash-o" style="font-size:20px"></i> Cancel Booking</button>
        </form>
      </td>
      </tr>

    @endforeach
    <tr "><th colspan="5 style="background-color: grey">Total Collection :</th><th>{{$total}}</th></tr></tr>
  
       
   </tbody>
  </table>
</div>  
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

     $('#idUser').submit(function() {
   return confirm("Are you sure u want to cancel this Booking?");
  });

  $(function(){
    $("#datepicker").datepicker({
      autoclose:true,
      todayHighlight:true,
      showAnim:'drop',
      orientation: "bottom left",
        showAnim: "drop"
    });

  });


</script>
@endsection