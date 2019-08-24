@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Question</h2>
                        <div class="ml-auto">
                            <a href="{{route('qustions.index')}}" class="btn btn-outline-secondary">Back to All Qustions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('qustions.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="qustion-title">Question Title :</label>
                        <input type="text" name="title" value="{{old('title')}}" id="qustion-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">

                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('title')}}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="qustion-body">Explain You Question :</label>
                            <textarea name="body" id="qustion-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">
                                {{old('body')}}
                            </textarea>

                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('body')}}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Ask This Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
