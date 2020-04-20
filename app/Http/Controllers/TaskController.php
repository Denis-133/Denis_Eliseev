<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**public function __construct()
    {
        $this->middleware('auth');
        //$this->tasks = $tasks;
    }*/

    public function index(Request $request)
    {

        $tasks = $request->user()->tasks()->get();

        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        //Проверка. Данный метод вызывает метод Validate с параметром(полем) $request и проверяет на заполнение и макимальную длинну строки.
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
        //Код создания задачи. Запрос к аутентифицированному пользователю и создание задачи. Через метод request.
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
