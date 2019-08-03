<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTodoRequest;
use App\Http\Requests\TodoCreateRequest;
use App\Todo;

use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;
use Request;



class TodoController extends Controller
{
    //
    public function index(Request $request){

        $id = Auth::user()->id;

        $todos = Todo::latest('created_at')->where('owner_id', '=', $id )->limit(5)->get();

        $quant = 5;

        return view('todo_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant, 'request' => $request ));
    }

    // show single todo_task
    public function show($id){
        $todo = Todo::findOrFail($id);
        return view('todo_id', array('user' => Auth::user(), 'todo' => $todo ));
    }

    public function store(Request $request){

        $input = Request::all();
        if($input!=''){
            $input['owner_id'] = Auth::user()->id;
            Todo::create($input);
        }


        $todos = Todo::latest()->get();

        //   return view('todo', array('user' => Auth::user(), 'todos' => $todos ));
        return redirect('todo');
    }

    public function edit($id){

        $todo = Todo::findOrFail($id);

        return view('edit_todo', array('user' => Auth::user(), 'todo' => $todo ));

    }

    public function update($id, Request $request){

        $todo = Todo::findOrFail($id);
        $ver = Request::all();
        $todo->update($ver);

        return view('edit_todo', array('user' => Auth::user(), 'todo' => $todo ));

    }

    public function destroy($id){

        $todo = Todo::findOrFail($id);

        $todo->delete();

        $todos = Todo::latest()->get();

        $quant = 5;

        return view('todo_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant ));
    }

    public function load_data(Request $request, $from){

        $id = Auth::user()->id;

        $todos = Todo::latest('created_at')->where('owner_id', '=', $id )->offset($from)->limit(5)->get();

        $quant = 5;

        return view('todo_in_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant, 'request' => $request));

    }




}
