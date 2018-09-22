@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Films</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                    	<table class="table table-vcenter">
                    		<thead>
                    			<tr>
                    				<th>Name</th>
                    				<th>Ticket Price</th>
                    				<th>Release Date</th>
                    				<th></th>
                    			</tr>
                    		</thead>
                    		<tbody></tbody>
                    	</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(function (){
		GetData();

		$(document).on("click", ".back_btn", function(){
			var nFilmId = $(this).attr("data-id");
			GetData(nFilmId, "back");
		});

		$(document).on("click", ".next_btn", function(){
			var nFilmId = $(this).attr("data-id");
			GetData(nFilmId, "next");
		});
		
	});

	function GetData(nFilmId, stepType){
		$.ajax({
			url:"{{ url('/films') }}",
			headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
			type:"post",
			cache:false,
			data:"nFilmId=" + nFilmId + "&stepType=" + stepType,
			dataType:"html",
			success:function(data){
				if(data != null){
					$(".table tbody").html(data);
				}
				else{
					$(".table tbody").html("");
				}
			}
		});
	}
</script>
@endsection
