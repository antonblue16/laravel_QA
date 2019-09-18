@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h1>{{$qustion->title}}</h1>
                        <div class="ml-auto">
                            <a href="{{route('qustions.index')}}" class="btn btn-outline-secondary">Back to All Qustions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {!! $qustion->body_html !!}
                    <div class="float-right">
                        <span class="tet-muted">Answered {{$qustion->created_date}}</span>
                        <div class="media mt-2">
                            <a href="{{$qustion->user->url}}" class="pr-2">
                                <img src="{{$qustion->user->avatar}}">
                            </a>
                            <div class="media-body mt-1">
                                <a href="{{$qustion->user->url}}">{{$qustion->user->name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$qustion->answers_count . " " . str_plural('Answer', $qustion->answers_count)}}</h2>
                    </div>
                    <hr>
                    @foreach ($qustion->answers as $answer)
                        <div class="media">
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="float-right">
                                    <span class="tet-muted">Answered {{$answer->created_date}}</span>
                                    <div class="media mt-2">
                                        <a href="{{$answer->user->url}}" class="pr-2">
                                            <img src="{{$answer->user->avatar}}">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
