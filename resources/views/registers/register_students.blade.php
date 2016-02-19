@extends('layout')
@section('content')
<div class="container">
	<h1>تسجيل الطلاب في المواد</h1>
	<div class="row">
		<div class="col-md-4">
			
			<i class="fa fa-spinner fa-spin"></i>
		</div>
	</div>
	<hr>
	<div class="row">
		{!! Form::open(['class' => 'form', 'route' => 'registers.update']) !!}
		<div class="form-group">
			{!! Form::select('courses', $courses, null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::select('students', $students->lists('name'), null, ['name' => 'registerthis[]', 'multiple' => 'multiple','class' => 'form-control', 'size' => 20]) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>

<script>
	$('.fa-spin').removeClass();
</script>

@stop