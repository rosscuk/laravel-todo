    @if(count($task->subtasks))
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($task->subtasks as $subtask)
                    <tr>
                        <td>{{ $subtask->name }}</td>
                        <td>{{ $subtask->complete? 'Completed' : 'Pending' }}</td>
                        <td>
                            {!! Form::open(['route' => ['subtask.update', $subtask->id], 'class' => 'form-inline', 'method' => 'put']) !!}
                                @if($subtask->complete)
                                    {!! Form::submit('Incomplete', ['class' => 'btn btn-info btn-xs']) !!}
                                @else
                                    {!! Form::submit('Complete', ['class' => 'btn btn-success btn-xs']) !!}
                                @endif
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['subtask.destroy', $subtask->id], 'class' => 'form-inline', 'method' => 'delete']) !!}
                                {!! Form::hidden('id', $subtask->id) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    @endif
