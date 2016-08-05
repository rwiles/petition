@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-tabs">
								<div class="panel-heading">
										<ul class="nav nav-tabs">
												<li><a href="{{ url('petition/'.$petition->id) }}">Petition</a></li>
												<li class="active"><a href="{{ url('petition/'.$petition->id.'/signatures') }}">Signatures</a></li>
												<li><a href="{{ url('petition/'.$petition->id.'/edit') }}">Edit</a></li>
										</ul>
								</div>

								@if ($petition->signatures->count())
										<div class="table-responsive">
												<table class="table">
														<thead>
																<tr>
																		<th>Name</th>
																		<th>Email</th>
																		<th>Phone</th>
																</tr>
														</thead>
				                    @foreach($petition->signatures as $signature)
																<tr>
																		<td>{{ $signature->name }}</td>
																		<td>{{ $signature->email }}</td>
																		<td>{{ $signature->phone }}</td>
				                        </tr>
														@endforeach
												</table>
										</div>
								@else
										<div class="panel-body">
												<p>No one has signed this petition yet.</p>
										</div>
								@endif
        </div>
    </div>
</div>
@endsection
