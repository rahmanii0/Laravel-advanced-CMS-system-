@extends('layouts.app')





@section('content')

    @include('admin.inc.errors')


    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>create a new category</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('category.store') }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text"  name="name" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" value="submit">store category</button>
                </div>
            </form>
        </div>
    </div>


@stop