{!! Form::model($project, array('method' => 'PATCH', 'route' => ['projects.update', $project->slug], 'class' => 'form-horizontal', 'role' => 'form')) !!}
@include('projects/sub/_form', array('submit_text' => 'Edit Project', 'submit_icon' => 'pencil'))
{!! Form::close() !!}
