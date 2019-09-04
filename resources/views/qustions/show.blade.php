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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
