@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Film Detail</div>

                <div class="card-body">
                	<form id="films_form" class="form form-horizontal" autocomplete="off">
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Name</label>
                    		</div>
                    		<div class="col-md-9">{{ $f_name }}</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Slug</label>
                    		</div>
                    		<div class="col-md-9">
                    			{{ $f_slug }}
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Description</label>
                    		</div>
                    		<div class="col-md-9">
                    		{{ $f_desc }}
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Photo</label>
                    		</div>
                    		<div class="col-md-9">
			        			@if(!empty($image))
                    			<br>
                    			<div class="image">
                    				<img alt="featured image" src="{{ asset('storage') . '/' . $f_id . '-' . $f_photo }}" style="height:28vh;">
                    			</div>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Release Date</label>
                    		</div>
                    		<div class="col-md-9">
                    		{{ date("d F, Y", strtotime($f_release_date))}}
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Ticket Price</label>
                    		</div>
                    		<div class="col-md-9">
                    		{{strtoupper($f_ticket_price)}}
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Country</label>
                    		</div>
                    		<div class="col-md-9">
                    		{{$f_country}}
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Rating</label>
                    		</div>
                    		<div class="col-md-9">
                    			<input type="hidden" id="nRating" name="nRating"  value=""/>
                    			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Genre</label>
                    		</div>
                    		<div class="col-md-9">
                    		{{$f_genre}}
                    		</div>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
