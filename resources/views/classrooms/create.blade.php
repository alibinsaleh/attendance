@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>اضافة شعبة جديدة</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'url' => 'classrooms']) !!}
					
					@include('classrooms._form')

					<div class="col-md-7 col-md-offset-3">
						<div class="form-group">
							{!! Form::button('  حفظ التعديلات', ['type' => 'submit','class' => 'fa fa-save btn btn-primary btn-md']) !!}
							{!! link_to_route('classrooms.index','  الرجوع لقائمة الشعب', null, ['class' => 'fa fa-home btn btn-success btn-md']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	

@stop