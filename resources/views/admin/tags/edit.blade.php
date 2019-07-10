@extends('layouts.app')





@section('content')

    @include('admin.inc.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update tag: {{$tag->tag}}
        </div>
        <div class="panel-body">
            <form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">

                    <label for="name"> New tag</label>

                    <input type="text"  name="tag"  value="{{$tag->tag}}" class="form-control">
                </div>

                <div class="form-group">

                    <button class="btn btn-success" value="submit">update tag</button>
                </div>
            </form>
        </div>
    </div>


@stop