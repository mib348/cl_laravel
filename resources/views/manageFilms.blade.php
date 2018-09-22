@extends('layouts.app')

@section('content')
<link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet" defer>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header">Manage Films</h4>

                <div class="card-body">
                    <form id="films_form" class="form form-horizontal" autocomplete="off">
                    	@csrf
                    	@if(!empty($id))
                    	<input type="hidden" id="nId" name="nId" value="{{$id}}" />
                    	@endif
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Name</label>
                    		</div>
                    		<div class="col-md-9">
                    			<input type="text"  id="strName" name="strName" class="form-control"/>
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Description</label>
                    		</div>
                    		<div class="col-md-9">
                    			<textarea rows="3" id="strDesc" name="strDesc" class="form-control"></textarea>
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Photo</label>
                    		</div>
                    		<div class="col-md-9">
                    			<input type="file" id="file" name="file" />
			        			@if(!empty($image))
                    			<br>
                    			<div class="image">
                    				<img alt="featured image" src="{{ asset('storage') . '/' . $id . '-' . $image }}" style="height:28vh;">
                    			</div>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Release Date</label>
                    		</div>
                    		<div class="col-md-9">
                    			<input type="text" autocomplete="new-datepicker"  id="strReleaseDate" name="strReleaseDate" class="form-control datepicker"/>
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Ticket Price</label>
                    		</div>
                    		<div class="col-md-9">
                    			<input type="text"  id="strTicketPrice" name="strTicketPrice" class="form-control"/>
                    		</div>
                    	</div>
                    	<div class="form-group row">
                    		<div class="col-md-3 text-right">
                    			<label class="label">Country</label>
                    		</div>
                    		<div class="col-md-9">
                    			<input type="text"  id="strCountry" name="strCountry" class="form-control"/>
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
                    			<input type="text"  id="strGenre" name="strGenre" value="" class="form-control" data-role="tagsinput"/>
                    		</div>
                    	</div>
                    </form>
                    <button type="button" class="btn btn-primary save_btn pull-right">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap-tagsinput.js') }}" defer></script>
<script src="{{ asset('js/jquery.form.js') }}" defer></script>
<script type="text/javascript">
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });

    $(".fa-star").click(function(){
        $(".fa-star").removeClass("checked");
        var nIndex = $(this).index();
        $(".fa-star").each(function(){
            if($(this).index() <= nIndex)
                $(this).addClass("checked");
        });
        $("#nRating").val($(".fa-star.checked").length);
    });

    $(document).on("click", ".save_btn", function(){
    	$(".save_btn").attr("disabled", true);
    
    	if($('#films_form .form-control').val() != ""){
        	$('#films_form').ajaxSubmit({
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
        	    url:"/films/save",
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
