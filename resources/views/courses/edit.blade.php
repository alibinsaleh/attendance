@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>تعديل المادة الدراسية <small>&raquo;  {{ $course->name }}</small></h3>
			</div>
			<div class="panel-body">
				{!! Form::model($course, ['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['CoursesController@update', $course->id]]) !!}
					<div class="form-group">
						{!! Form::label('name', 'اسم المادة الدراسية', ['class' => 'col-md-3 control-label']) !!}
						{!! Form::text('name', null, ['class' => 'form-control col-md-4']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('classroom', 'الشعبة', ['class' => 'col-md-3 control-label']) !!}
						{!! Form::select('classroom_id', $classrooms, null, ['size' => 20, 'multiple' => 'multiple', 'class' => 'form-control col-md-4']) !!}
					</div>
					<div class="col-md-7 col-md-offset-3">
						<div class="form-group">
							{!! Form::submit('  حفظ التعديلات', ['class' => 'fa fa-save btn btn-primary btn-md']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>


@stop