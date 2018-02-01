@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if ($errors->has('groups'))
                <div class="col-12" style="padding: 1em;">
                    <span class="help-block alert alert-danger alert-auto-dismiss alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ $errors->first('groups') }}</strong>
                    </span>
                </div>
            @endif

            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Unlink groups in <strong><a href="{{ $category->link() }}"
                                                    style="color: inherit;">{{ $category->name }}</a></strong>
                    </div>
                    {!! Form::open(['url' => route('categories.edit.groups.remove', ['category' => $category->id])]) !!}
                    {{ method_field('DELETE') }}
                    <div class="panel-body" style="padding: 28px 28px 0;">
                        <div class="alert alert-info">
                            Select the groups to be removed from <strong>{{ $category->name }}</strong>
                        </div>

                        <ul class="list-group" style="margin-bottom: 0;">
                            @forelse($linkedGroups as $group)
                                <li class="list-group-item col-md-6" style="border: 0;">
                                    @if($group->categories->count() == 1)
                                        {!! Form::checkbox('groups[]', $group->id, null, ['id' => $group->id, 'disabled', 'data-toggle' => 'tooltip', 'title' => 'Belongs to only one category' ]) !!}
                                        {!! Form::label($group->id, $group->name, ['class' => 'control-label', 'disabled', 'data-toggle' => 'tooltip', 'title' => 'Belongs to only one category' ]) !!}
                                    @else
                                        {!! Form::checkbox('groups[]', $group->id, null, ['id' => $group->id]) !!}
                                        {!! Form::label($group->id, $group->name, ['class' => 'control-label']) !!}
                                    @endif
                                </li>
                            @empty
                                <li class="list-group-item text-muted" style="border: 0;">
                                    No groups available
                                </li>
                            @endforelse
                        </ul>

                    </div>
                    <div class="panel-body" style="padding: 0 28px 28px;">
                        <hr>
                        {!! Form::submit('Unlink Groups', ['class' => 'btn btn-danger btn-sm pull-right']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Link groups to <strong><a href="{{ $category->link() }}"
                                                  style="color: inherit;">{{ $category->name }}</a></strong>
                    </div>
                    {!! Form::open(['url' => route('categories.edit.groups.store', ['category' => $category->id])]) !!}
                    {{ method_field('PUT') }}
                    <div class="panel-body" style="padding: 28px; padding-bottom: 0">
                        <div class="alert alert-info">
                            Select the groups to be added to <strong>{{ $category->name }}</strong>
                        </div>

                        <ul class="list-group" style="margin-bottom: 0;">
                            @forelse($unlinkedGroups as $group)
                                <li class="list-group-item col-md-6" style="border: 0;">
                                    {!! Form::checkbox('groups[]', $group->id, null, ['id' => $group->id]) !!}
                                    {!! Form::label($group->id, $group->name, ['class' => 'control-label']) !!}
                                </li>
                            @empty
                                <li class="list-group-item text-muted" style="border: 0;">
                                    No groups available
                                </li>
                            @endforelse
                        </ul>

                    </div>
                    <div class="panel-body" style="padding: 28px; padding-top: 0;">
                        <hr>
                        {!! Form::submit('Link Groups', ['class' => 'btn btn-primary btn-sm pull-right']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection
