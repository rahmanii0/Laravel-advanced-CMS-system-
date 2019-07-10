@extends('layouts.app')




@section('content')
 

    <div class="panel panel-default">

        <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>name</th>
                <th>image</th>
                <th> permission</th>
                <th>Delete</th>
            </thead>
         <tbody>
                @foreach($users as $user)

                    <tr>
                     <td>
                     <img src="{{asset($user->profile->avatar)}}" alt="" width="60px" hight="60px">
                     </td>
                     <td>{{$user->name}}</td>
                     <td>permission</td>
                     <td>delete</td>
                    </tr>

                @endforeach
         </tbody>
            </table>
        </div>
    </div>

    @stop
