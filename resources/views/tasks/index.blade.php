@extends('layouts.app')
@section('content')
<div class="panel-body panel-primary p-sm-5">
    @include('common.errors')
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        @csrf

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label "><h3>Task</h3></label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-dark">
                    <i class="fa fa-plus"></i>Add task
                </button>
            </div>
        </div>
    </form>
</div>
    @if(count($tasks) > 0)
        <div class="panel panel-content p-sm-5">
            <div class="panel-heading">
                <h3>Current Tasks</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-table col-sm-offset-3 col-sm-6">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text table-striped">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                <form action="{{url('task/'.$task->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
