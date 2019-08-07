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

                        <h2>Edit Category:</h2>

                        <hr>

                        {!! Form::model($cat[0], ['method'=>'PATCH', 'action' => ['CategoryController@update', $cat[0]->id] ]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Category name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Rename category', ['class' => 'btn btn-primary form-control']) !!}

                        {!! Form::close() !!}

                        <hr>



                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection



