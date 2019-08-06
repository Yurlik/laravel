@extends('todo')

@section('task_content')
    <h4>Your categorys</h4>
    <ul class="categorys_wrapper">
        <?php //dump($categorys); ?>
        @foreach($categorys as $category)
            <a class="block" href="/todo/cat/{{$category->id}}"><li> {{ $category->name }} </li></a>
        @endforeach
    </ul>
    <hr>
    @foreach($todos as $task)

        <article class="task">
            @foreach($categorys as $cat)
                @if($cat->id == $task->cat_id)
                    <b class="block" data-category="{{$task->cat_id}}" href="/todo/cat/{{$task->cat_id}}">Category: {{ $cat->name }}</b>
                @endif
            @endforeach

            <a href="{{ action('TodoController@show', [$task->id]) }}">{{$task->title}}</a>


            {!! Form::model($task, ['method' => 'DELETE', 'action' => ['TodoController@destroy', $task->id], 'class'=>'del_btn']) !!}
                {!! Form::submit('delete', ['class' => 'btn btn-danger form-control']) !!}
            {!! Form::close() !!}

            <a class="edit_btn btn btn-warning" href="/todo/{!! $task->id !!}/edit">edit</a>

            <p>{{$task->description}}</p>
        </article>
        <hr>

    @endforeach

@endsection
