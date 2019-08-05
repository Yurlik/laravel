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
<?php

//echo '<hr><pre>';
//echo print_r($categorys);
//echo '</pre><hr>';

?>
                    <h2>To Do List</h2>
                    <hr>
                    {{--@foreach($todos as $task)--}}

                        {{--<article class="task">--}}
                            {{--<a href="{{ action('TodoController@show', [$task->id]) }}">{{$task->title}}</a>--}}


                            {{--{!! Form::model($task, ['method' => 'DELETE', 'action' => ['TodoController@destroy', $task->id], 'class'=>'del_btn']) !!}--}}
                                {{--{!! Form::submit('delete', ['class' => 'btn btn-danger form-control']) !!}--}}
                            {{--{!! Form::close() !!}--}}

                            {{--<a class="edit_btn btn btn-warning" href="/todo/{!! $task->id !!}/edit">edit</a>--}}

                            {{--<p>{{$task->description}}</p>--}}
                        {{--</article>--}}
                        {{--<hr>--}}

                    {{--@endforeach--}}
    @yield('task_content')

                    <div id="add_data">

                    </div>
                    <button id="load_more_button" class="btn btn-success form-control" data-quant="{{ $quant }}">Load more</button>
                </div>



                <div class="create_task_block">

                    {!! Form::open() !!}
                        <div class="form-group form_name">
                            <h4>Create task</h4>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Add task', ['class' => 'btn btn-primary form-control']) !!}

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
