@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $petition->title }}</div>

                <div class="panel-body">
										<p>
												Created by {{ $petition->user->name }}
											 	on {{ date('F j, Y', strtotime($petition->created_at)) }}
										</p>
										<p>{{ $petition->summary }}</p>

										<p>{{ $petition->body }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
