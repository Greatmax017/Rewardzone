@extends('layouts.d_app')

@section('content')
<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dfb5d4bd96992700fcd0658/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	<div id="wrapper">
		@include('sections.d_header')
		@include('sections.sidebar')
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          		@if (session('error-status'))
					<div class="alert alert-danger alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center><b>Error:</b> {{ session('error-status') }}</center>
					    </div>
					</div>
				@endif
              <div class="row">
              		<div class="col-md-10 col-md-offset-1">
              		    <div class="panel panel-default">
							<div class="panel-heading">Tutorials</div>
							<div class="panel-body">
                                @forelse($posts as $p)
            				      <div class="col-md-12" style="overflow:hidden;">
            				      	<!--Card-->
            						@if($p->thumbnail != null)
            							<img src="{{ $p->thumbnail }}" class="img-responsive img-thumbnail" align="left" style="max-width:320px;min-height:170px; margin:5px" alt="{{ $p->title }}">
            						@endif
            						<h3><a href="/blog/{{ $p->url }}">{{ $p->title }}</a></h3>
            						<b><i class="fa fa-clock-o"></i> <i>{{ $p->created_at->toFormattedDateString() }}</i></b>
            						<p style="text-align:justify;">{!! substr(strip_tags($p->content), 0, 550) !!}...</p>
            						<a class="btn btn-xs pull-right" style="padding:5px;" href="/blog/{{ $p->url }}">Read more</a>
            						<br>
            						<hr>
            				      </div>
            					@empty
                                    <center><i>Tutorials will be added soon</i></center>
            					@endforelse
            					  <center>{{ $posts->links() }}</center>
							</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
