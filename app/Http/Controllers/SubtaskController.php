<?php

namespace App\Http\Controllers;

use App\Task;
use App\Subtask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubtaskController extends Controller
{
    /**
     * View ToDos listing.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $taskList = Subtask::where('user_id', Auth::id())->paginate(15);

        return view('subtasks.list', compact('subtaskList'));
    }

    public function complete()
    {
        $taskList = Subtask::where('complete', '1')->paginate(15);
        return view('subtasks.list', compact('subtaskList'));
    }

    public function pending()
    {
        $taskList = Subtask::where('complete','!=', '1')->paginate(15);
        return view('subtasks.list', compact('subtaskList'));
    }

    /**
     * View Create Form.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $task = Task::findOrFail($id);
        return view('subtasks.create', compact('task'));
    }

    /**
     * Create new Todo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($task_id,Request $request)
    {

        $this->validate($request, ['name' => 'required']);
        
        $subtask = Subtask::create([
            'name' => $request->get('name'),
            'user_id' => Auth::user()->id,
            'task_id' => $task_id
        ]);


         return redirect('/task/'.$task_id)
            ->with('flash_notification.message', 'New subtask created successfully')
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

        $subtask = Subtask::findOrFail($id);
      
            $subtask->complete = !$subtask->complete;
            $subtask->save();

            //return redirect('/task/$subtask->task_id'); 
            return redirect()->back()->with('task', [$subtask->task_id]);

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
        $subtask = Subtask::findOrFail($id);
        $subtask->delete();

        return redirect()->back()->with('subtask', [$subtask->task_id])
            ->with('flash_notification.message', 'Task deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
