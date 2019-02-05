@extends('admin.layout.page')

@section('content')
	
    <div class="row">
    	<h3 style="float: left;">{{ $title ?? '' }} </h3>
 	</div>
 	
	<div class="clearfix"></div>
	    
    <div class="panel-body">
        {{ $slot }}
    </div>

@endsection