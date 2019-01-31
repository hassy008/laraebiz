@extends('frontEnd.master')
@section('title')
My Order
@endsection 

@section('mainContent')
<style>

    <!-- Progress with steps -->

    ol.progtrckr {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    ol.progtrckr li {
        display: inline-block;
        text-align: center;
        line-height: 3em;
    }

    ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
    ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
    ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
    ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
    ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
    ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
    ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
    ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

    ol.progtrckr li.progtrckr-done {
        color: black;
        border-bottom: 4px solid yellowgreen;
    }
    ol.progtrckr li.progtrckr-todo {
        color: silver; 
        border-bottom: 4px solid silver;
    }

    ol.progtrckr li:after {
        content: "\00a0\00a0";
    }
    ol.progtrckr li:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }
    ol.progtrckr li.progtrckr-done:before {
        content: "\2713";
        color: white;
        background-color: yellowgreen;
        height: 1.2em;
        width: 1.2em;
        line-height: 1.2em;
        border: none;
        border-radius: 1.2em;
    }
    ol.progtrckr li.progtrckr-todo:before {
        content: "\039F";
        color: silver;
        background-color: white;
        font-size: 1.5em;
        bottom: -1.6em;
    }

</style>

<div class="greyBg">
    <div class="container">
		<div class="wrapper">
      <div class="row">
		<div class="col-sm-12">
		<div class="breadcrumbs">
		<ul>
			<li><a href="{{url('/')}}">Home </a></li>
			<li><span class="dot">/</span>
			<a href="{{url('/my-order')}}"> My Order </a></li>
		</ul>
		</div>
		</div>
	     </div>

	     
	     
          <div class="row top25 inboxMain" >
            <div class="row text-center alert alert-info">
            
             <div class="col-md-4"><h3>Order No: {{ $track_order_details->order_id }} </h3> </div>
             <div class="col-md-4"><h3>Total: TK ({{ $track_order_details->order_total }})</h3> </div>
             <div class="col-md-4"><h3> Status: <mark> {{ $track_order_details->order_status }}</h3></mark></div>
            </div>
<div class="widget-body">
               @if( $track_order_details->order_status=='Pending' )
               @include('frontEnd.profile.steps.pending')

               @elseif($track_order_details->order_status=='Dispatched')
               @include('frontEnd.profile.steps.dispatched')

               @elseif($track_order_details->order_status=='Processed')
               @include('frontEnd.profile.steps.processed')

               @elseif($track_order_details->order_status=='Shipped')
               @include('frontEnd.profile.steps.shipped')

               @elseif($track_order_details->order_status=='Delivered')
               @include('frontEnd.profile.steps.delivered')

               @endif
              

        </div>

        </div>
    </div>
  </div>
</div>
@endsection