@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Question {{ $question->getSortOrder() }}</div>
                    <div class="card-body">
                        <form action="{{ route('survey-question-submit', [$question->getId()]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="answer">{{ $question->getText() }}</label>
                                <input type="text"
                                       class="form-control @error('answer') is-invalid @enderror"
                                       name="answer"
                                       id="answer"
                                       placeholder="Your Answer"
                                >
                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
