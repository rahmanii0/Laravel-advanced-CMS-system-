@extends('layouts.app')





@section('content')

    @include('admin.inc.errors')


    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>create a new tag</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('tag.store') }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Tag name</label>
                    <input type="text"  name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" value="submit">store tag</button>
                </div>
            </form>
        </div>
    </div>


@stop 