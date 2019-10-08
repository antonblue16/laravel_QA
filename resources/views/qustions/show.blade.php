@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> <!--Question Display-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{$qustion->title}}</h1>
                            <div class="ml-auto">
                                <a href="{{route('qustions.index')}}" class="btn btn-outline-secondary">Back to All Qustions</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="This question is not useful" class="vote-down off">
                                    <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="Click to mark as favourite question (Click again to undo)" class="favorite mt-2 favorited">
                                    <i class="fas fa-star fa-2x"></i>
                                <span class="favourite-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $qustion->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{$qustion->created_date}}</span>
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
        </div>
    </div>
    @include('answers.index',[
        'answers' => $qustion->answers,
        'answersCount' => $qustion->answers_count,
    ])
    @include('answers.create')
</div>
@endsection
