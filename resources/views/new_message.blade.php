@extends('layouts.d_app')

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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <br>
                <div class="card">
                    <div class="card-header">Compose Message</div>
                    <div class="card-body">
                        <form id="send-message" class="form" role="form" method="POST" action="{{ url('/send_message') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                <label for="subject" class="control-label">Subject:</label>
                                <input id="subject" type="text" class="form-control" placeholder="Message Subject" name="subject" value="{{ $subject or '' }}" required>
                                @if ($errors->has('subject'))
                                <span class="label label-danger">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="message" class="control-label">Message:</label><br />
                                <textarea class="form-control" rows="6" name="message">{{ $message or '' }}</textarea>
                            </div>

                            <div class="col-sm-6">
                                <label for="attachment">Attach Image (Optional):</label>
                                <input type="file" name="attachment" accept="image/*">
                            </div>
                            <br />

                            <div class="form-group">
                                <div style="margin-top:20px;" class="col-md-8 offset-md-2 text-center">
                                    <a onclick="submitForm(this);" form-id="send-message" form-action="send this message" class="btn btn-lg btn-secondary">
                                        Send Message
                                    </a><br /><br />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->
</section>
@endsection
