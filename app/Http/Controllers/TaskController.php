<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * View ToDos listing.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $taskList = Task::where('user_id', Auth::id())->paginate(7);

        return view('task.list', compact('taskList'));
    }

    public function complete()
    {
        $taskList = Task::where('complete', '1')->paginate(7);
        return view('task.list', compact('taskList'));
    }

    public function pending()
    {
        $taskList = Task::where('complete','!=', '1')->paginate(7);
        return view('task.list', compact('taskList'));
    }

    /**
     * View Create Form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Create new Todo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Task::create([
            'name' => $request->get('name'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/task')
            ->with('flash_notification.message', 'New task created successfully')
            ->with('flash_notification.level', 'success');
    }

    /**
     * Toggle Status.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->complete = !$task->complete;
        $task->save();

        return redirect()
            ->route('task.index')
            ->with('flash_notification.message', 'Task updated successfully')
            ->with('flash_notification.level', 'success');
    }

    /**
     * Delete Todo.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()
            ->route('todo.index')
            ->with('flash_notification.message', 'Todo deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
