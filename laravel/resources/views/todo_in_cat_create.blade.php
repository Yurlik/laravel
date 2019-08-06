@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img src="/uploads/avatars/{{ $user->avatar }}" alt="" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 20px;">
                        <h3>{{ $user->name }}'s create Category.</h3>
                    </div>

                    <div class="todos_body">

                        <h2>Create Category:</h2>

                        <hr>

                        {!! Form::open(['url' => 'cat']) !!}
                        {{--<div class="form-group form_name">--}}
                            {{--<h4>Create category</h4>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            {!! Form::label('name', 'Category name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Add category', ['class' => 'btn btn-primary form-control']) !!}

                        {!! Form::close() !!}

                        <hr>
                        {{--@yield('task_content')--}}


                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection



