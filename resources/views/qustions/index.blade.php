@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                    @foreach ($qustions as $qustion)
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{ $qustion->url}}">{{$qustion->title}}</a></h3>
                                <p class="lead">
                                    Asked by
                                    <a href="{{$qustion->user->url}}">{{$qustion->user->name}}</a>
                                    <small class="text-muted">{{$qustion->created_date}}</small>
                                </p>
                                {{str_limit($qustion->body, 250)}}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class = "mx-auto">
                        {{$qustions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
