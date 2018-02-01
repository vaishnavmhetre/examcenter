@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            @if(!!count($reliedGroups))
                <div class="panel-body" style="padding: 28px;">

                    <div class="page-header text-center" style="margin-top: 0;">
                        <h3>Oops..! <i class="em em-face_with_one_eyebrow_raised" style="font-size: large;"></i></h3>
                        <h6 class="text-muted text-center">You cannot delete category {{ $category->name }}</h6>
                    </div>


                    <span class="help-block alert alert-danger">
                        @if(count($reliedGroups) > 1)
                            Groups
                        @else
                            Group
                        @endif
                        @foreach($reliedGroups as $group)
                            <a href="{{ $group->link() }}">
                                    {{ $group->name }}@php echo ($reliedGroups->last() != $group) ? ', ' :  '';  @endphp
                                </a>
                        @endforeach
                        relies on the only category <strong>{{ $category->name }}</strong>.
                        Please relink
                        @if(count($reliedGroups) > 1)
                            them
                        @else
                            it
                        @endif
                        to some other category.
                    </span>
                </div>

            @else

                <div class="panel-body" style="padding: 28px;">

                    <div class="page-header text-center" style="margin-top: 0;">
                        <h3>Are you sure? <i class="em em-face_with_one_eyebrow_raised" style="font-size: large;"></i></h3>
                    </div>

                    <span class="pull-left" style="margin: .5em;">
                        <span class="text-muted">You cannot undo deletion of category {{ $category->name }}</span>
                    </span>
                    <span class="pull-right" style="margin: .5em;">
                        <form action="{{ route('categories.delete', ['category' => $category->id]) }}" method="post" >
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                        </form>
                    </span>
                    <span class="pull-right" style="margin: .5em;">
                        <a href="#" class="btn btn-link btn-sm" style="margin-right: 1em;"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                    </span>


                </div>

            @endif


        </div>
    </div>
@endsection
