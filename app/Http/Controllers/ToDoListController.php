<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ToDoListController extends Controller
{
    public function index()
    {
        $todolists = ToDoList::all();
        return view('home', compact('todolists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);
        ToDoList::create($data);
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $todolist = ToDoList::findOrFail($id);
        $todolist->delete();
        return redirect()->route('index');
    }
}
