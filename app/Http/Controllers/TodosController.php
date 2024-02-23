<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\Category;

class TodosController extends Controller
{
    //Controllador de Nuestra app de tareas
    /** 
     *index para mostrar todas las task
     *store para guardar una task
     *update para actualizar una task
     *destroy para eliminar una task
     *edit para mosntrar el formulario de edicion
     */


    public function index()
    {
        $todos = Task::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);

    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $todo = new Task;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();
        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
    }
    public function show($id)
    {
        $todo = Task::find($id);
        $categories = Category::all();
        $category_old = Category::find($todo->category_id);
        return view('todos.show', ['todo' => $todo, 'categories' => $categories, 'category_old' => $category_old]);
    }
    public function update(Request $request, $id)
    {
        $todo = Task::find($id);
        $todo->title = $request->title;
        $todo->save();
        return redirect()->route('todos')->with('success', 'Tarea actualizada!');

    }

    public function destroy($id)
    {
        $todo = Task::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarea ha sido eliminada!');


    }

}
