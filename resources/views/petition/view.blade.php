@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-tabs">

                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="{{ url('petition/'.$petition->id) }}">Petition</a></li>

                        @if (Auth::user() && $petition->user_id == Auth::user()->id)
                            <li><a href="{{ url('petition/'.$petition->id.'/signatures') }}">Signatures</a></li>
                            <li><a href="{{ url('petition/'.$petition->id.'/edit') }}">Edit</a></li>
                        @endif
                    </ul>
                </div>

                <div class="panel-body">
                    <h2 class="section-title">{{ $petition->title }}</h2>

										<p class="details">
												Created by {{ $petition->user->name }}
											 	on {{ date('F j, Y', strtotime($petition->created_at)) }}.

                        @if ($petition->created_at != $petition->updated_at)
                            Last modified on {{ date('F j, Y', strtotime($petition->updated_at)) }}.
                        @endif
										</p>

										<p>{{ $petition->summary }}</p>

                    <hr />

										<p>{{ $petition->body }}</p>

                    <hr />

                    <div class="col-md-offset-3 col-md-9">
                        <h3 class="section-title">Sign the petition</h3>
                    </div>

                    <form class="form-horizontal" role="form" method="POST" action="{{  url('petition/'.$petition->id.'/sign') }}">
												{{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
														<label for="name" class="col-md-3 control-label">Name</label>

														<div class="col-md-6">
																<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

																@if ($errors->has('name'))
																		<span class="help-block">
																				<strong>{{ $errors->first('name') }}</strong>
																		</span>
																@endif
														</div>
												</div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
														<label for="email" class="col-md-3 control-label">Email Address</label>

														<div class="col-md-6">
																<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

																@if ($errors->has('email'))
																		<span class="help-block">
																				<strong>{{ $errors->first('email') }}</strong>
																		</span>
																@endif
														</div>
												</div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
														<label for="phone" class="col-md-3 control-label">Phone Number</label>

														<div class="col-md-6">
																<input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}">

																@if ($errors->has('phone'))
																		<span class="help-block">
																				<strong>{{ $errors->first('phone') }}</strong>
																		</span>
																@endif
														</div>
												</div>

                        <div class="form-group">
														<div class="col-md-6 col-md-offset-3">
																<button type="submit" class="btn btn-primary">
																		<i class="fa fa-pencil fa-user"></i> Sign it!
																</button>
														</div>
												</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
