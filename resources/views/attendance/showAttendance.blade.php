@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>ادخال غياب مادة <small>&raquo; {{ $attendances[0]->course->name }}</small></h3>
				<h3>الفترة  <small>&raquo; {{ $attendances[0]->week->name }}: 
				من {{ $attendances[0]->week->from_date }}  
				الى {{ $attendances[0]->week->to_date }}</small></h3>
			</div>
			<div class="panel-body">
				{!! Form::model($attendances, ['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['AttendanceController@update', $course_id]]) !!}

				<table id="myTable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>الرقم الأكاديمي</th>
							<th>اسم الطالب</th>
							<th class="col-2">الأحد</th>
							<th>الاثنين</th>
							<th>الثلاثاء</th>
							<th>الأربعاء</th>
							<th>الخميس</th>
							<th>مجموع أيام غياب الأسبوع</th>
						</tr>
					</thead>
					<tbody>

						@include('partials.errors')
						@include('partials.success')

						<div ng-controller="attendanceController">
						@foreach ($attendances as $key => $attendance)
							<tr>
								{!! Form::hidden('id['.$key.']', $attendance->id) !!}
								<td>{{ $attendance->student->academic_num }}</td>
								<td>{{ $attendance->student->name }}</td>
								<td>
									{!! Form::text('sunday['.$key.']', $attendance->sunday, null) !!}
									<!-- <input type="text" name="sunday[{{ $key }}]" value="{{ $attendance->sunday }}"> -->
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
								<td>
									<label><% myname %></label> 
								</td>

							</tr>
						@endforeach
						</div>
						
					</tbody>

				</table>
					<div class="col-md-7 col-md-offset-4">
						<div class="form-group">
							{!! Form::button('  حفظ', ['type' => 'submit','class' => 'fa fa-save btn btn-primary btn-md']) !!}
							{!! link_to_route('attendance.index','  الرجوع لقائمة المواد', null, ['class' => 'fa fa-home btn btn-success btn-md']) !!}
						</div>
					</div>
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