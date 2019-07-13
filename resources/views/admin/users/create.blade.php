@extends('layouts.app')





@section('content')

    @include('admin.inc.errors')


    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>create a new user </h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('user.store') }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">user name</label>
                    <input type="text"  name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">user Email</label>
                    <input type="text"  name="email" class="form-control" type="email">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" value="submit">add user</button>
                </div>
            </form>
        </div>
    </div>


@stop