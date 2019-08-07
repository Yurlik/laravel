<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Category;
use Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;

        $categorys = DB::table('todos_category')->where('owner_id', '=', $id )->get();

        return view('todo_in_cat', array('user' => Auth::user(), 'categorys' => $categorys));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        return 'Show the form for creating a new resource';

        $id = Auth::user()->id;


        return view('todo_in_cat_create', array('user' => Auth::user() ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = Request::all();

        $id = Auth::user()->id;

        if($input!=''){
            DB::table('todos_category')->insert(
                ['name' => $input['name'], 'owner_id' => $id]
            );
        }


        return view('todo_in_cat_create', array('user' => Auth::user() ));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return 'show id category';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $owner_id = Auth::user()->id;
        $cat = DB::table('todos_category')->where([
            ['owner_id', '=', $owner_id],
            ['id', '=', $id],
        ] )->get();

        return view('todo_in_cat_edit', array('user' => Auth::user(), 'cat' => $cat ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $owner_id = Auth::user()->id;


        $ver = Request::all();

        $cat = DB::table('todos_category')->where([
            ['owner_id', '=', $owner_id],
            ['id', '=', $id],
        ] )->update(['name' => $ver['name']]);


        return redirect('cat');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = DB::delete('delete from todos_category where id = ?',[$id]);

        return redirect('cat');
    }
}
