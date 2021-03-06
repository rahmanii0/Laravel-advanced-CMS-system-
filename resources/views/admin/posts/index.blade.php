@extends('layouts.app')




@section('content')


    <div class="panel panel-default">

        <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>image</th>
                <th>title</th>
                <th> content</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
         <tbody>
                @foreach($posts as $post)

                    <tr>
                     <td><img src=" {{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                     <td>{{$post->title}}</td>
                     <td>{{$post->content}}</td>
                     <td><a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info">Edit</a></td>
                     <td><a href="{{ route('post.delete',['id'=>$post->id])}}" class="btn btn-danger">trash</a></td>
                    </tr>

                @endforeach
         </tbody>
            </table>
        </div>
    </div>

    @stop
