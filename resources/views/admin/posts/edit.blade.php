@extends('layouts.app')





@section('content')

    @include('admin.inc.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Post: {{$post->name}}
        </div>
        <div class="panel-body">
            <form action="{{ route('post.update',['id'=>$post['id']]) }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">

                    <label for="name"> New title</label>

                    <input type="text"  name="title"  value="{{$post->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file"  name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">select Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)

                    <option value="{{$category->id}}"
                      @if($post->category['id'] == $category->id)
                      selected
                    @endif()
                    >{{$category->name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                 <label for="tags">select tag</label>
                    @foreach($tags as $tag)

                    <div class="checkbox">
                    <label><input type="checkbox"  name="tags[]" value="{{$tag->id}}"
                    
                    @foreach($post->tags as $t)
                       @if($tag->id== $t->id)
                       checked
                       @endif 
                

                    @endforeach
                    >{{$tag->tag}}</label>
                    
                    
                    </div>
                    @endforeach
                 
                 
                 </div>
                <div class="form-group">

                    <label for="name"> New content</label>

                    <input type="text"  name="content"  value="{{$post->content}}" class="form-control">
                </div>
                

                <div class="form-group">

                    <button class="btn btn-success" value="submit">updatepost</button>
                </div>
            </form>
        </div>
    </div>


@stop