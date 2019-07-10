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
                <th>Restore</th>
                <th>Destory</th>

            </thead>
         <tbody>
         @if($posts->count() > 0)

         @foreach($posts as $post)
                    <tr>
                     <td><img src=" {{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                     <td>{{$post->title}}</td>
                     <td>{{$post->content}}</td>
                     <td><a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info">Edit</a></td>
                     <td><a href="{{ route('post.restore',['id'=>$post->id])}}" class="btn btn-success">Restore</a></td>
                     <td><a href="{{ route('post.kill',['id'=>$post->id])}}" class="btn btn-danger">Delete</a></td>

                    </tr>

                @endforeach


         @else

            <tr>
            <th cplspan='5' class="text-center">No trash posts</th>
            </tr>

         @endif
        
         </tbody>
            </table>
        </div>
    </div>

    @stop
