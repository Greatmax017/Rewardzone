@extends('layouts.app')

@section('content')
<!-- Inner Page Header serction end here -->
<section style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">

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
                <center> {{ session('success-status') }}</center>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">Transaction History List</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <form method="GET" action="/transaction_history">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="{{ app('request')->input('search') }}" placeholder="Transaction ID or Email">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Amount</th>
                                        <th>Desc</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $t)
                                    <tr>
                                        <td>{{ substr($t->id, 0, 13) }}</td>
                                        <td>${{ number_format($t->amount, 2) }}</td>
                                        <td>{{ $t->description }}</td>
                                        <td>{{ $t->created_at->toDayDateTimeString() }}</td>
                                        <td><b>
                                            @if($t->status == 0)
                                            <span class="badge badge-warning">Confirmation Requested</span>
                                            @elseif($t->status == 1)
                                            <span class="badge badge-warning">Growing ({{ $t->days }})</span>
                                            @elseif($t->status == 2)
                                            <span class="badge badge-primary">Can be Withdrawn</span>
                                            @elseif($t->status == 3)
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-danger">Failed</span>
                                            @endif
                                            </b>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6"><center><i>No Transactions yet</i></center></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /row -->
</section>
@endsection
