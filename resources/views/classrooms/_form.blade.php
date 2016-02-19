<div class="form-group">
	{!! Form::label('classroom_num', 'رقم الشعبة', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::text('classroom_num', null, ['class' => 'form-control col-md-4']) !!}
</div>
<div class="form-group">
	{!! Form::label('name', 'اسم الشعبة', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control col-md-4']) !!}
</div>
{{--  
<div class="form-group">
	{!! Form::label('course_id', 'المادة الدراسية', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::select('course_id', $courses, null,  ['class' => 'form-control col-md-4']) !!}
</div> --}}
<div class="form-group">
	{!! Form::label('max_size', 'أقصى عدد للطلاب', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::text('max_size', null, ['class' => 'form-control col-md-4']) !!}
</div>


<script>
	$('.selectpicker').selectpicker();
</script>
