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

                    <h2>Edit To Do: {!! $todo->title !!}</h2>

                    <hr>
                    {{--@foreach($todos as $task)--}}

                        {{--<article>--}}
                            {{--<h3>{{$task->title}}</h3>--}}
                            {{--<p>{{$task->description}}</p>--}}
                        {{--</article>--}}
                        {{--<hr>--}}

                    {{--@endforeach--}}

                </div>

                <div class="create_task_block">

                    {!! Form::model($todo, ['method' => 'PATCH', 'action' => ['TodoController@update', $todo->id]]) !!}
                        <div class="form-group form_name">
                            <h4>Edit task!!!</h4>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Edit task', ['class' => 'btn btn-primary form-control']) !!}

                    {!! Form::close() !!}

                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
