@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>تعديل بيانات شعبة <small>&raquo;  {{ $classroom->name }}</small></h3>
			</div>
			<div class="panel-body">
				{!! Form::model($classroom, ['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['ClassroomsController@update', $classroom->id]]) !!}
					
					@include('classrooms._form')

					<div class="col-md-7 col-md-offset-3">
						<div class="form-group">
							{!! Form::button('  حفظ التعديلات', ['type' => 'submit','class' => 'fa fa-save btn btn-primary btn-md']) !!}
							{!! Form::button('  حذف الشعبة', ['class' => 'fa fa-trash btn btn-danger btn-md', 'data-toggle' => 'modal', 'data-target' => '#modal-delete']) !!}
							{!! link_to_route('classrooms.index','  الرجوع لقائمة الشعب', null, ['class' => 'fa fa-home btn btn-success btn-md']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	{{-- Confirm Delete --}}

	<div class="modal fade" id="modal-delete" tabIndex="-1"> 
		<div class="modal-dialog">
			<div class="modal-content"> 
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> 
						&times;
					</button>
					<h4 class="modal-title">تأكيد عملية الحذف</h4> </div>
					<div class="modal-body"> 
						<p class="lead">
							<i class="fa fa-question-circle fa-lg"></i> 
							&nbsp;
		            		هل أنت متأكد من رغبتك في حذف هذه الشعبة؟
						</p> 
					</div>
				<div class="modal-footer">
					<form method="POST" action="/classrooms/{{ $classroom->id }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
						<input type="hidden" name="_method" value="DELETE">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button> 
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-times-circle"></i> Yes 
						</button>
	          		</form>
	        	</div>
	      	</div>
	    </div>
	</div>

@stop