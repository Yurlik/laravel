@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img src="/uploads/avatars/{{ $user->avatar }}" alt="" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 20px;">
                        <h3>{{ $user->name }}'s to do Categorys.</h3>
                    </div>

                    <div class="todos_body">

                        <h2>Categorys:</h2>
                        <hr>
                        <ul class="categorys_wrapper">
                            <?php //dump($categorys); ?>
                            @foreach($categorys as $category)
                                <li class="cat_wrap">
                                    <h5 class="block">{{ $category->name }} </h5>

                                    {!! Form::model($category, ['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id], 'class'=>'del_btn']) !!}
                                    {!! Form::submit('delete', ['class' => 'btn btn-danger form-control']) !!}
                                    {!! Form::close() !!}

                                    <a class="edit_btn btn btn-warning" href="/cat/{!! $category->id !!}/edit">edit</a>
                                </li>
                                <hr>
                            @endforeach
                        </ul>
                        <hr>
                        {{--@yield('task_content')--}}


                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection



