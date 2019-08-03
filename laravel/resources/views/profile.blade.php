@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="/uploads/avatars/{{ $user->avatar }}" alt="" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 20px;">
                    <h3>{{ $user->name }}'s profile.</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))

                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form enctype="multipart/form-data" action="/profile" method="post">
                            <label for="avatar">Upload avatar</label>
                            <input id="avatar" type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn pull-right btn-primary">
                        </form>
                </div>

                {{--<div class="todos_body">--}}

                    {{--<h2>To Do List</h2>--}}
                    {{--<hr>--}}
                    {{--@foreach($todos as $task)--}}

                        {{--<article>--}}
                            {{--<h3>{{$task->title}}</h3>--}}
                            {{--<p>{{$task->description}}</p>--}}
                        {{--</article>--}}
                        {{--<hr>--}}

                    {{--@endforeach--}}

                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
