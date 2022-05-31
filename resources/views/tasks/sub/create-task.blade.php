{!! Form::model(new App\Task, ['route' => ['tasks.store'], 'class'=>'form-horizontal', 'role' => 'form']) !!}
<div class="form-group">
    <label for="task-name" class="col-sm-3 control-label">Task Name</label>

    <div class="col-sm-6">
        <input type="text" name="name" id="task-name" class="form-control"
               value="{{ old('task') }}">
    </div>
</div>
<div class="form-group">
    <label for="task-description"
           class="col-sm-3 control-label">Description</label>

    <div class="col-sm-6">
        <textarea name="description" id="task-description" class="form-control"
                  value="{{ old('task') }}" maxlength="155"></textarea>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        {{Form::button('<span class="fa fa-plus fa-fw" aria-hidden="true"></span> Create Task', array('type' => 'submit', 'class' => 'btn btn-default'))}}
    </div>
</div>

{!! Form::close() !!}
