@extends('layouts.app')

@section('content')
<!-- Inner Page Header serction end here -->
<section style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
	    <!--Organisations-->
	      <div class="container">
    		<div class="row">
    		  <div class="col-md-10 offset-md-1">
    			<div class="detail-info">
    				{!! $post->content !!}
					<br><br>
    		    </div>
    	      </div>
    		</div>
	      </div>
	    <!--/ Organisations-->
	</div>
</section>
@endsection
