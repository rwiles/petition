@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-tabs">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        @if ($petition->id)
                            <li><a href="{{ url('petition/'.$petition->id) }}">Petition</a></li>
                            <li><a href="{{ url('petition/'.$petition->id.'/signatures') }}">Signatures</a></li>
                            <li class="active"><a href="{{ url('petition/'.$petition->id.'/edit') }}">Edit</a></li>
                        @else
                            <li class="active"><a href="{{ url('petition/create') }}">New Petition</a></li>
                        @endif
                    </ul>
                </div>

                <div class="panel-body">
										<form class="form-horizontal" role="form" method="POST" action="{{ url('/petition/'.$petition->id) }}">
                        @if ($petition->id)
                            <input type="hidden" name="_method" value="PUT">
                        @endif

                        {{ csrf_field() }}

												<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
														<label for="title" class="col-md-4 control-label">Title</label>

														<div class="col-md-6">
																<input id="title" type="text" class="form-control" name="title" value="{{ old('title', $petition->title) }}">

																@if ($errors->has('title'))
																		<span class="help-block">
																				<strong>{{ $errors->first('title') }}</strong>
																		</span>
																@endif
														</div>
												</div>

												<div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
														<label for="summary" class="col-md-4 control-label">Summary</label>

														<div class="col-md-6">
																<textarea id="summary" class="form-control" name="summary">{{ old('summary', $petition->summary) }}</textarea>

																@if ($errors->has('summary'))
																		<span class="help-block">
																				<strong>{{ $errors->first('summary') }}</strong>
																		</span>
																@endif
														</div>
												</div>

												<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
														<label for="body" class="col-md-4 control-label">Body</label>

														<div class="col-md-6">
																<textarea id="body" class="form-control" name="body">{{ old('body', $petition->body) }}</textarea>

																@if ($errors->has('body'))
																		<span class="help-block">
																				<strong>{{ $errors->first('body') }}</strong>
																		</span>
																@endif
														</div>
												</div>

                        <div class="form-group">
														<label for="private" class="col-md-4 control-label">
                                <input id="private" name="private" type="checkbox" {{ old('private', $petition->private) ? 'checked' : '' }} />
                                Private
                            </label>
												</div>

												<div class="form-group">
														<div class="col-md-6 col-md-offset-4">
																<button type="submit" class="btn btn-primary">
																		<i class="fa fa-btn fa-file-text-o"></i> Save Petition
																</button>
														</div>
												</div>
										</form>

                    @if ($petition->id)
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/petition/'.$petition->id) }}">
                          @if ($petition->id)
                              <input type="hidden" name="_method" value="DELETE">
                          @endif

                          {{ csrf_field() }}

                          <div class="form-group">
  														<div class="col-md-6 col-md-offset-4">
  																<button type="submit" class="btn btn-sm btn-danger">
  																		<i class="fa fa-btn fa-trash-o"></i> Delete Petition
  																</button>
  														</div>
  												</div>
  										</form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
