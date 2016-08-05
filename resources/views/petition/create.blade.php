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

                        <div class="col-md-10 col-md-offset-2">
                            <h3>Petition Content</h3>
                        </div>

												<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
														<label for="title" class="col-md-2 control-label">Title</label>

														<div class="col-md-8">
																<input id="title" type="text" class="form-control" name="title" value="{{ old('title', $petition->title) }}">

																@if ($errors->has('title'))
																		<span class="help-block">
																				<strong>{{ $errors->first('title') }}</strong>
																		</span>
																@endif
														</div>
												</div>

												<div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
														<label for="summary" class="col-md-2 control-label">Summary</label>

														<div class="col-md-8">
																<textarea id="summary" class="form-control" name="summary">{{ old('summary', $petition->summary) }}</textarea>

																@if ($errors->has('summary'))
																		<span class="help-block">
																				<strong>{{ $errors->first('summary') }}</strong>
																		</span>
																@endif
														</div>
												</div>

												<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
														<label for="body" class="col-md-2 control-label">Body</label>

														<div class="col-md-8">
																<textarea id="body" class="form-control" name="body">{{ old('body', $petition->body) }}</textarea>

																@if ($errors->has('body'))
																		<span class="help-block">
																				<strong>{{ $errors->first('body') }}</strong>
																		</span>
																@endif
														</div>
												</div>

                        <div class="form-group">
														<label for="private" class="col-md-offset-2 col-md-8">
                                <input id="private" name="private" type="checkbox" {{ old('private', $petition->private) ? 'checked' : '' }} />
                                Private
                            </label>
												</div>


                        <hr />

                        <div class="col-md-10 col-md-offset-2">
                            <h3>Confirmation Page</h3>
                        </div>

                        <div class="form-group">
														<label for="thankyou_title" class="col-md-2 control-label">Title</label>

                            <div class="col-md-8">
                                <input id="thankyou_title" name="thankyou_title" type="text" class="form-control" value="{{ old('thankyou_title', $petition->thankyou_title) }}" />
                            </div>
												</div>

                        <div class="form-group">
														<label for="thankyou_body" class="col-md-2 control-label">Body</label>

                            <div class="col-md-8">
                                <textarea id="thankyou_body" name="thankyou_body" class="form-control">{{ old('thankyou_body', $petition->thankyou_body) }}</textarea>
                            </div>
												</div>


                        <hr />

                        <div class="col-md-10 col-md-offset-2">
                            <h3>Email Confirmation</h3>
                        </div>

                        <div class="form-group">
														<label for="thankyou_email_subject" class="col-md-2 control-label">Subject</label>

                            <div class="col-md-8">
                                <input id="thankyou_email_subject" name="thankyou_email_subject" type="text" class="form-control" value="{{ old('thankyou_email_subject', $petition->thankyou_email_subject) }}" />
                            </div>
												</div>

                        <div class="form-group">
														<label for="thankyou_email_body" class="col-md-2 control-label">Body</label>

                            <div class="col-md-8">
                                <textarea id="thankyou_email_body" name="thankyou_email_body" class="form-control">{{ old('thankyou_email_body', $petition->thankyou_email_body) }}</textarea>
                            </div>
												</div>


												<div class="form-group">
														<div class="col-md-8 col-md-offset-2">
																<button type="submit" class="btn btn-primary">
																		<i class="fa fa-btn fa-save"></i> Save Petition
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
  														<div class="col-md-8 col-md-offset-2">
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
