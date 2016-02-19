@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>ادخال غياب مادة <small>&raquo; {{ $attendances[0]->course->name }}</small></h3>
			</div>
			<div class="panel-body">
				{!! Form::model($attendances, ['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['AttendanceController@update', $course_id]]) !!}
				
				<table id="myTable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>الرقم الأكاديمي</th>
							<th>اسم الطالب</th>
							<th>الأحد</th>
							<th>الاثنين</th>
							<th>الثلاثاء</th>
							<th>الأربعاء</th>
							<th>الخميس</th>
						</tr>
					</thead>
					<tbody>

						@include('partials.errors')
						@include('partials.success')

						
						@foreach ($attendances as $key => $attendance)
							<tr>
								{!! Form::hidden('id['.$key.']', $attendance->id) !!}
								<!-- {!! Form::hidden('course_id['.$key.']', $attendance->course_id) !!} -->
								<td>{{ $attendance->student->academic_num }}</td>
								<td>{{ $attendance->student->name }}</td>
								<td>
									{!! Form::text('sunday['.$key.']', $attendance->sunday, null) !!}
								</td>
								<td>
									{!! Form::text('monday['.$key.']', $attendance->monday, null) !!}
								</td>
								<td>
									{!! Form::text('tuesday['.$key.']', $attendance->tuesday, null) !!}
								</td>
								<td>
									{!! Form::text('wednesday['.$key.']', $attendance->wednesday, null) !!}
								</td>
								<td>
									{!! Form::text('thursday['.$key.']', $attendance->thursday, null) !!}
								</td>

							</tr>
						@endforeach
						
					</tbody>

				</table>
					{!! Form::button('  حفظ', ['type' => 'submit','class' => 'fa fa-save btn btn-primary btn-md']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
    		$('#myTable').DataTable();
    	});
	</script>
	

@stop