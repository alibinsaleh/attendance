<div class="form-group">
	{!! Form::label('academic_num', 'الرقم الأكاديمي', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::text('academic_num', null, ['class' => 'form-control col-md-4']) !!}
</div>
<div class="form-group">
	{!! Form::label('name', 'اسم الطالب', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control col-md-4']) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'البريد الالكتروني', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::text('email', null, ['class' => 'form-control col-md-4']) !!}
</div>
<div class="form-group">
	{!! Form::label('nationality', 'الجنسية', ['class' => 'col-md-3 control-label']) !!}
	{!! Form::text('nationality', null, ['class' => 'form-control col-md-4']) !!}
</div>
<div class="form-group">
	{!! Form::label('','',  ['class' => 'col-md-3 control-label alert fa fa-lightbulb-o fa-3x']) !!}
	{!! Form::label('','  لاختيار أكثر من مادة قم بالضغط على زر CTRL للويندوز أو Command للماك وذلك أثناء اختيار المواد',  ['class' => 'alert alert-info col-md-4 right-text']) !!}
</div>
<div class="form-group">
	
	{!! Form::label('all_courses', 'المواد الدراسية',  ['class' => 'col-md-3 control-label']) !!}
    {!! Form::select('all_courses[]', $all_courses, null, ['size' => 20, 'multiple' => 'multiple', 'class' => 'form-control col-md-2']) !!}

 	{!! Form::label('courses', 'المواد الدراسية المسجلة للطالب',  ['class' => 'col-md-3 control-label']) !!}
    {!! Form::select('courses[]', $courses, null, ['size' => 20, 'multiple' => 'multiple', 'class' => 'form-control col-md-2']) !!}

</div>
