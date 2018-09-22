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
			        			@if(!empty($f_photo))
                    			<div class="image">
                    				<img alt="featured image" src="{{ asset('storage') . '/' . $f_id . '-' . $f_photo }}" style="height:50vh;">
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
                    			<input type="hidden" id="nRating" name="nRating"  value="{{$f_rating}}"/>
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
                    <hr>
                    <h4>Comments</h4>
                    @foreach ($comments as $comment)
                    <div class="form-group row">
                		<div class="col-md-3 text-right">
                			<label class="label">Name</label>
                		</div>
                		<div class="col-md-9">
                		{{$comment->c_name}}
                		</div>
                	</div>
                	<div class="form-group row">
                		<div class="col-md-3 text-right">
                			<label class="label">Comment</label>
                		</div>
                		<div class="col-md-9">
                		{{$comment->c_comment}}
                		</div>
                	</div>
                	<hr>
                	@endforeach
                	@auth
                    <form id="comments_form" class="form form-horizontal" autocomplete="off">
                    	@csrf
                    	@if(!empty($f_id))
                    	<input type="hidden" id="nId" name="nId" value="{{$f_id}}" />
                    	@endif
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Name</label>
                    		</div>
                    		<div class="col-md-9">
                    			<input type="text" id="strName" name="strName" class="form-control" />
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Comment</label>
                    		</div>
                    		<div class="col-md-9">
                    			<textarea rows="3" id="strDesc" name="strDesc" class="form-control"></textarea>
                    		</div>
                    	</div>
                    </form>
                    <button type="button" class="btn btn-primary save_btn pull-right">Post Comment</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery.form.js') }}" defer></script>
<script>
	$(".fa-star").each(function(){
        if($(this).index() <= $("#nRating").val())
            $(this).addClass("checked");
	});

	$(function(){
	    $(document).on("click", ".save_btn", function(){
	    	$(".save_btn").attr("disabled", true);
	    
	    	if($('#comments_form .form-control').val() != ""){
	        	$('#comments_form').ajaxSubmit({
	        		beforeSend: function() {
	        	    },
	        	    uploadProgress: function(event, position, total, percentComplete) {
	        	    },
	        	    complete: function(xhr) {
	        			if (typeof callback === "function")
	        	            callback();

	        			location.reload();
	        	    },
	        	    error:function(){
	        	    	$(".save_btn").attr("disabled", false);
	        	    },
	        	    iframe: true,
	        	    url:"/films/saveComment",
	        	    dataType:  'json',
	        	    type:"post",
	        	    async: false
	        	});
	    	}
	    	else{
	    		showConfirmDialog("Please provide all fields");
	    		$(".save_btn").attr("disabled", false);
	    	}
	    });
	});
</script>
@endsection
