
@extends('layout.master')
@section('user')
Welcome 
{{  Sentinel::getUser()->roles()->first()->slug

}}

@endsection
@section('content')
<div class="container-fluid">
<div class="row " >
  
        <div class="col-md-3" >
          <div class="row">
            <div class="col-md-12">
           <section>
           	@yield('sidebar')
           </section>
         </div>
         </div>
         <div class="row">
           <div class="col-md-12">
          <section>
          @yield('calender')
        </section>
         </div>
         </div>
        </div>
  
        <div class="col-md-9" >
        <section>
            @yield('MenuContent')
        </section>
        </div>
</div>
</div>
@endsection