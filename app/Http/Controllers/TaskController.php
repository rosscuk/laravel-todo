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
        $taskList = Task::where('user_id', Auth::id())->paginate(15);

        return view('tasks.list', compact('taskList'));
    }

    public function complete()
    {
        $taskList = Task::where('complete', '1')->paginate(15);
        return view('tasks.list', compact('taskList'));
    }

    public function pending()
    {
        $taskList = Task::where('complete','!=', '1')->paginate(15);
        return view('tasks.list', compact('taskList'));
    }

    /**
     * View Create Form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.create');
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

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update($id, Request $request)
    {

        $task = Task::findOrFail($id);

            // if name is set (from edit task form)
            if ($request->has('name')) {
            $this->validate($request, ['name' => 'required']);
            $task->update($request->all());

            return redirect()->route('task.show', ['id' => $id])
            ->with('flash_notification.message', 'Task updated successfully')
            ->with('flash_notification.level', 'success');
            }
            
            // if status changed (from task list)
            if (isset($task->complete)) {
            $task->complete = !$task->complete;
            $task->save();

            return redirect('/task');
            }

    }


    /**
     * Toggle Status.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    

    /**
     * Delete Todo.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $todo = Task::findOrFail($id);
        $todo->delete();

        return redirect()
            ->route('task.index')
            ->with('flash_notification.message', 'Task deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
