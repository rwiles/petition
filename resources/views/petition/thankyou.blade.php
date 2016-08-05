@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-tabs">

                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li><a href="{{ url('petition/'.$petition->id) }}">Petition</a></li>

                        @if (Auth::user() && $petition->user_id == Auth::user()->id)
                            <li><a href="{{ url('petition/'.$petition->id.'/signatures') }}">Signatures</a></li>
                            <li><a href="{{ url('petition/'.$petition->id.'/edit') }}">Edit</a></li>
                        @endif

                        <li class="active"><a href="{{ url('petition/'.$petition->id) }}">Thank You</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <h2 class="section-title">{{ $petition->thankyou_title }}</h2>

										{!! $petition->thankyou_body !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
