@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Petitions</div>

								<ul class="list-group">
                    @foreach($petitions as $petition)
												<li class="list-group-item">
                            <span class="badge">{{ count($petition->signatures) }}</span>

                            <a href="{{ url('petition/'.$petition->id) }}">
                                {{ $petition->title }}
                            </a>
                        </li>
										@endforeach
								</ul>
            </div>
        </div>
    </div>
</div>
@endsection
