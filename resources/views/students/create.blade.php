@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>الطلاب  <small>&raquo;  اضافة طالب جديد</small></h3>
			</div>
			@include('partials.errors')
			@include('partials.success')
			<div class="panel-body">
				{!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'url' => 'students']) !!}
					
					@include('students._form_add')

					<div class="col-md-7 col-md-offset-3">
						<div class="form-group">
							{!! Form::button('  حفظ', ['type' => 'submit', 'class' => 'fa fa-save btn btn-primary btn-md']) !!}
							{!! link_to_route('students.index','  الرجوع لقائمة الطلاب', null, ['class' => 'fa fa-home btn btn-primary btn-md']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>


@stop