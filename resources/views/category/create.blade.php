@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="padding-bottom: 64px;">
        {!! Form::open(['url' => route('categories.store')]) !!}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Create Category
                    </div>
                    <div class="panel-body" style="padding: 32px;">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
