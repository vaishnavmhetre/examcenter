@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 3em; margin-bottom: 3em;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <question-create-component csrf_token="{{ csrf_token() }}"></question-create-component>
            </div>
        </div>
    </div>

@endsection