@extends('layouts.admin_app')

@section('content')
<body>
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
				@if (session('success-status'))
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
						<center>{{ session('success-status') }}</center>
					    </div>
					</div>
				@endif

              <div class="row">
                <div class="col-md-12">
					  <div class="col-lg-12">
                    	<div class="panel panel-default">
							<div class="panel-heading">Coupon Codes Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
								<tr><td><b>Total Coupons</b></td><td><b> {{$code_count}}</b></td></tr>

									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Coupon codes</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-6">

								  </div>
								</div>
							</div>
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>
											<th>code</th>

										</tr>
									</thead>
									<tbody>
                    @foreach($codes as $key => $data)
      <tr>
        	<th><b>{{ $key+1 }}</b></th>
        <th>{{$data->code}}</th>


      </tr>
  @endforeach

									</tbody>
								</table>

							</div>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
