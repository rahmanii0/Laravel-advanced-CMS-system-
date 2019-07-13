@extends('layouts.app')




@section('content')
 

    <div class="panel panel-default">

        <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>image</th>
                <th>name</th>
                <th>email</th>
                <th> permission</th>
                <th>Delete</th>
            </thead>
         <tbody>
                @foreach($users as $user)

                    <tr>
                     <td>
{{--            <img src="{{  asset($user->profile->avatar) }}" alt="" width="60px" hight="60px">--}}
                     </td>
                     <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td> @if($user->admin)
                                <form action="{{ route('user.notAdmin',['id'=>$user->id]) }}" method="get">
                                    <button href="" class="btn-xs btn-danger">remove admin</button>
                                </form>

                            @else
                                <form action="{{ route('user.admin',['id'=>$user->id]) }}" method="get">
                                    <button href="" class="btn-xs btn-success">Make admin</button>
                                </form>
                            @endif
                        </td>


                     <td>delete</td>
                    </tr>

                @endforeach
         </tbody>
            </table>
        </div>
    </div>

    @stop
