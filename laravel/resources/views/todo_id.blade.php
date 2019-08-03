@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="/uploads/avatars/{{ $user->avatar }}" alt="" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 20px;">
                    <h3>{{ $user->name }}'s to do list.</h3>
                </div>

                <div class="todos_body">

                    <h2>To Do {{$todo->title}}</h2>
                    <hr>

                    <p>{{$todo->description}}</p>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
