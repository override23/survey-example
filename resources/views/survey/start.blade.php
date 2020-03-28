@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Survey</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <a class="btn btn-primary" href="{{ route('survey-question', [$nextQuestion->getId()]) }}">{{ $nextQuestion->getId() > 1 ? 'Continue' : 'Start' }} Survey</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
