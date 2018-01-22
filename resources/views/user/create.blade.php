@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 64px;">
        {!! Form::open(['url' => route('users.store')]) !!}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Personal Details
                    </div>
                    <div class="panel-body" style="padding: 32px;">
                        {{--<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" required autofocus />

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>--}}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                            {!! Form::text('first_name', old('first_name'), ['class' => 'form-control']) !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                            {!! Form::label('middle_name', 'Middle Name', ['class' => 'control-label']) !!}
                            {!! Form::text('middle_name', old('middle_name'), ['class' => 'form-control']) !!}
                            @if ($errors->has('middle_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
                            {!! Form::text('last_name', old('last_name'), ['class' => 'form-control']) !!}
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Credentials
                    </div>
                    <div class="panel-body" style="padding: 32px;">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Groups
                    </div>
                    <div class="panel-body" style="padding: 32px;">
                        @if ($errors->has('groups'))
                            <span class="help-block alert alert-danger">
                                    <strong>{{ $errors->first('groups') }}</strong>
                            </span>
                        @endif
                        <div class="panel-group" id="categoryAccordion">
                            <div class="panel panel-default">
                                @forelse($categories as $category)
                                    <div class="panel-heading accordion-toggle" data-toggle="collapse"
                                         data-target="#{{ $category->id }}" data-parent="#categoryAccordion">
                                        {{ $category->name }}
                                    </div>
                                    <div class="panel-collapse collapse @if($category === $categories[0]) in @endif"
                                         id="{{ $category->id }}">
                                        <div class="panel-body">
                                            <ul class="list-group" style="margin-bottom: 0;">
                                                @forelse($category->groups as $group)
                                                    <li class="list-group-item col-md-6" style="border: 0;">
                                                        {!! Form::checkbox('groups[]', $group->id, null, ['id' => $group->id]) !!}
                                                        {!! Form::label($group->id, $group->name, ['class' => 'control-label']) !!}
                                                    </li>
                                                @empty
                                                    <li class="list-group-item col-md-6 text-muted" style="border: 0;">
                                                        No groups avail in this category
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <div class="panel-body text-muted">
                                        No categories available yet
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
                {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection