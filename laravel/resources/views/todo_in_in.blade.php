


    @foreach($todos as $task)

        <article class="task">
            @foreach($categorys as $cat)
                @if($cat->id == $task->cat_id)
                    <a class="block" href="/todo/cat/{{$task->cat_id}}">Category: {{ $cat->name }}</a>
                @endif
            @endforeach
            {{--<h5>Category: {{ $task->cat_id }}</h5>--}}
            <a href="{{ action('TodoController@show', [$task->id]) }}">{{$task->title}}</a>


            {!! Form::model($task, ['method' => 'DELETE', 'action' => ['TodoController@destroy', $task->id], 'class'=>'del_btn']) !!}
                {!! Form::submit('delete', ['class' => 'btn btn-danger form-control']) !!}
            {!! Form::close() !!}

            <a class="edit_btn btn btn-warning" href="/todo/{!! $task->id !!}/edit">edit</a>

            <p>{{$task->description}}</p>
        </article>
        <hr>

    @endforeach

