@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-body" style="padding-left: 28px;">
                <span class="pull-left">
                    <h5>All Categories</h5>
                </span>
                <span class="pull-right category-modifiers">
                    <a href="{{ route('categories.create') }}"
                       class="btn btn-link" style="margin-right: 1em; vertical-align: middle; margin: .4em;" data-toggle="tooltip" title="Create Category">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </span>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-body" style="padding-left: 28px;">
                @forelse($categories as $category)
                    <a class="list-group-item" href="{{ $category->link() }}"
                       style="border: 0; @php echo ($category->groups->first() == $category) ?: 'border-top: 1px solid #f5f5f5;'; @endphp">
                        {{ $category->name }}
                        <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                    </a>
                @empty
                    <li class="list-group-item text-muted" style="border: 0;">
                        No categories available
                    </li>
                @endforelse
            </div>
        </div>
    </div>
@endsection
