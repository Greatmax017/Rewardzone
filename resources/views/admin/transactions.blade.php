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
              <div class="row">
              		<div class="col-md-12">
						<div class="col-md-12">
	              			<div class="panel panel-default">
								<div class="panel-heading">Statistics</div>
								<div class="panel-body">
									<div class="col-md-12">
										<table class="table table-condensed">
											<tr><td><b>Transactions Count</b></td><td><b>{{ $transactions_count }}</b></td></tr>
											<tr><td><b>Transactions Today</b></td><td><b>{{ $transactions_today_count }}</b></td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">All Transactions</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6 col-lg-offset-6">
										    <form method="GET" action="{{ url('/admin/transactions') }}">
											    <div class="input-group">
											      <input type="text" name="search" class="form-control" value="{{ app('request')->input('search') }}" placeholder="Transaction ID or Email">
											      <span class="input-group-btn">
												<button class="btn btn-sm btn-default" type="submit">Search</button>
											      </span>
											    </div>
										    </form>
										  </div>
										</div>
									</div>

									<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
	                                            <th>Amount</th>
	                                            <th>Sender/Description</th>
												<th>Detail</th>
												<th>Date</th>
	                                            <th>Status</th>
	                                            <th>Action</th>
											</tr>
										</thead>
										<tbody>
											@forelse($transactions as $t)
											<tr>
												<td class="col-md-2">{{ $t->id or '' }}</td>
												<td  class="col-md-1">
													<b>${{ number_format($t->amount, 2) }}</b><br>
												</td>
												<td class="col-md-2"><a href="{{ url('/admin/user/'.$t->sender) }}">{{ $t->sender_data->email or "" }}</a>
												<br><i>{{ $t->description }}</i>
												@if($t->paid_to != null)<br> Generated Address: {{ $t->paid_to }}@endif</td>
	                                            <td class="col-md-3">
	                                            	@if($t->receiver != 0)
	                                            	@if($t->status == 0)
													<b>Wallet ID:</b> {{ $t->receiver_data->bitcoin_wallet_id or '' }} <br />
		                                            <b>Phone:</b> {{ $t->receiver_data->phone or '' }}
		                                            @else
		                                            <a href="/admin/user/{{ $t->receiver }}">{{ $t->receiver_data->email or "" }}</a>
		                                            @endif
		                                            @else
		                                            <b> SYSTEM </b>
		                                            @endif
												</td>
												<td class="col-md-2">{{ $t->created_at->toDayDateTimeString() }}</td>
	                                            <td class="col-md-2"><b>
													@if($t->status == 0)
													<span class="label label-warning">Confirmation Requested</span>
													@elseif($t->status == 1)
													<span class="label label-warning">Yielding Interest ({{ $t->days }})</span>
													@elseif($t->status == 2)
													<span class="label label-primary">Payout Requested</span>
													@elseif($t->status == 3)
													<span class="label label-success">Paid</span>
													@else
													<span class="label label-danger">Failed</span>
													@endif
													</b>
												</td>
	                                            <td>
	                                                @if($t->status == 0 && $t->sender != 0 && $t->paid_to == null)
	                                                <a onclick="submitForm(this);" form-id="confirm-investment-form-{{ $t->id }}" form-action="confirm this investment" style="margin-top:5px; margin-bottom:5px;" class="btn btn-sm btn-info">
													    Confirm Investment
													</a>
	                                                <form style="display:none;" id="confirm-investment-form-{{ $t->id }}" class="form" role="form" method="POST" action="{{ url('/admin/confirm_investment') }}">
	            										{{ csrf_field() }}
	            										<input type="hidden" value="{{ $t->id }}" name="transaction" >
	            									</form>
	                                                 @endif
	 												 <!--a data-url="/admin_transaction/{{ $t->id }}" onclick="deleteRowDialog(this);" data-msg="this transaction" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a-->
													 <a href="#" data-toggle="modal" data-target="#tr-{{ $t->id }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
													 <div id="tr-{{ $t->id }}" class="modal fade" role="dialog">
														 <div class="modal-dialog">
															 <!-- Modal content-->
															 <div class="modal-content">
																 <div class="modal-header">
																 <h4 class="modal-title">Edit Transaction</h4>
																</div>
																<div class="modal-body">
																	 <form action="{{ url('/admin_edit_transaction') }}" method="POST">
																		 {{ csrf_field() }}
																		 <input type="hidden" name="transaction" value="{{ $t->id }}">
																		 <div class="form-group">
																			 <label class="control-label">Amount:</label>
																			 <input class="form-control" type="number" name="amount" step="0.0000001" value="{{ $t->amount }}" />
																		 </div>
																		 <div class="form-group">
																			 <label class="control-label">Description:</label>
																			 <textarea class="form-control" name="description">{{ $t->description }}</textarea>
																		 </div>
																		 <div class="form-group">
																			 <label class="control-label">Status:</label>
																			 <select name="status" class="form-control" value="{{ $t->status }}">
																				 <option value="0">Confirmation Requested</option>
																				 <option value="1">Yielding Interest</option>
																				 <option value="2">Payout Requested</option>
																				 <option value="3">Paid</option>
																			 </select>
																		 </div>
																		 <div class="form-group">
																			 <center>
																				 <button type="submit" class="btn btn-sm btn-primary">Edit</button><br>
																				 <small>Please be very sure before you save because these changes have no history and the update time is affected thus the user might be aware of the change</small>
																			 </center>
																		 </div>
																	 </form>
																 </div>
															 </div>
														 </div>
													</div>
	                                             </td>
											</tr>
											@empty
											<tr>
												<td colspan="3"><center><i>No Transactions</i></center></td>
											</tr>
											@endforelse
										</tbody>
									</table>
									</div>
									{{ $transactions->links() }}
								</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
