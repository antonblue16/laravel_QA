@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Question</h2>
                        <div class="ml-auto">
                        <a href="{{route('qustions.create')}}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    @include('layouts.messages')

                    @foreach ($qustions as $qustion)
                        <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{$qustion->votes}}</strong> {{str_plural('vote',$qustion->votes)}}
                            </div>
                            <div class="status {{$qustion->status}}">
                                <strong>{{$qustion->answers}}</strong> {{str_plural('answers',$qustion->answers)}}
                            </div>
                            <div class="view">
                                {{$qustion->views . " " . str_plural('view',$qustion->views)}}
                            </div>
                        </div>

                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{ $qustion->url}}">{{$qustion->title}}</a></h3>
                                    <div class="ml-auto">
                                        @can ('update', $qustion)
                                            <a href="{{route('qustions.edit', $qustion->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan

                                        @can ('delete', $qustion)
                                            <form class="form-delete" method="POST" action="{{route('qustions.destroy', $qustion->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
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
