@extends('layouts.app')

@section('content')
@include('sections.sidebar_2')
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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if (session('error-status'))
                <div class="alert alert-danger">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                        <b>Error:</b> {{ session('error-status') }}
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">Message Detail</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr><td><b>Sender Name</b></td><td>{{ $message->sender_data->name or 'Support' }}<br /></td></tr>
                                    <tr><td><b>Sender Email:</b></td><td><b>{{ $message->sender_data->email or 'support@bitlifetrading.com' }} <a href="{{ url('/message/reply/'.$message->id) }}" class="btn btn-xs btn-warning">Reply</a></b></td></tr>
                                    <tr><td><b>Receiver Name</b></td><td> {{ $message->receiver_data->name or 'Support' }}<br /></td></tr>
                                    <tr><td><b>Receiver Email:</b></td><td><b>{{ $message->receiver_data->email or 'support@bitlifetrading.com' }}</b></td></tr>
                                    <tr><td><b>Subject:</b></td><td><b>{{ $message->subject or '' }}</b></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <p>{{ $message->message }}</p>
                        @if($message->attachment != null)
                        <b>Attachment:</b>
                        <img class="img-responsive" src="/{{ $message->attachment }}" alt="Message Attachment" />
                        @endif
                        <div class="form-group">
                            <div style="margin-top:20px;" class="col-md-8 offset-md-2 text-center">
                                <a href="{{ url('/messagebox') }}" class="btn btn-sm btn-warning">
                                    Return to Messages
                                </a><br /><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /row -->
</div><!-- /col-lg-9 END SECTION MIDDLE -->
</section>
@endsection
