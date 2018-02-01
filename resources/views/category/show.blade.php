@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-body" style="padding-left: 28px;">
                <span class="pull-left">
                    <h5>{{ $category->name }}</h5>
                </span>
                <span class="pull-right category-modifiers" style="margin: .7em;">
                    <a href="{{ route('categories.edit.name.view', ['category' => $category->id]) }}"
                       class="btn btn-link btn-sm" style="margin-right: 1em;" data-toggle="tooltip" title="Edit name">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{ route('categories.delete.view', ['category' => $category->id]) }}"
                       class="btn btn-danger btn-sm" style="margin-right: 1em;" data-toggle="tooltip" title="Delete">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="display: inline-block; width: 100%;">
                        <div class="pull-left">
                            Groups in {{ $category->name }}
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('categories.edit.groups.view', ['category' => $category->id]) }}" class="btn btn-xs btn-primary" style="color: inherit;" data-toggle="tooltip" title="Edit groups">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" style="margin-bottom: 0;">
                            @forelse($category->groups as $group)
                                <a class="list-group-item" href="{{ $group->link() }}"
                                   style="border: 0; @php echo ($category->groups->first() == $group) ?: 'border-top: 1px solid #f5f5f5;'; @endphp">
                                    {{ $group->name }}
                                    <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                                </a>
                            @empty
                                <li class="list-group-item text-muted" style="border: 0;">
                                    No groups available
                                </li>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Details
                    </div>
                    <div class="panel-body">
                        <ul class="list-group" style="margin-bottom: 0;">
                            <li class="list-group-item" style="border: 0;">
                                Created by: <a href="{{ $category->creator->link() }}">
                                    {{ $category->creator->name_2() }}
                                </a>
                            </li>
                            <li class="list-group-item" style="border: 0; border-top: 1px solid #f5f5f5;">
                                Created: {{ $category->created_at->diffForHumans() }}
                            </li>
                            <li class="list-group-item" style="border: 0; border-top: 1px solid #f5f5f5;">
                                Last updated: {{ $category->updated_at->diffForHumans() }}
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
