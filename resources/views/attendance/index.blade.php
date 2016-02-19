@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>قائمة المواد والشعب</h3>
			</div>
			<div class="panel-body">
			<!-- {!! Form::select('week_id', [1,2,3,4,5,6,7,8,9,10, null, ['class' => 'form-controll']]) !!} -->
				<table id="myTable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>اسم المادة</th>
							<th>الشعبة</th>
							<th>العمليات</th>
							
						</tr>
					</thead>
					<tbody>


						@include('partials.errors')
						@include('partials.success')


						@foreach ($courses as $course)
							<tr>
								<td>{{ $course->name }}</td>
								<td>{{ $course->classroom->classroom_num }}</td>
								<td>
									<!-- {!! link_to_route('attendance.edit', '  ادخال الغياب', [$course->id], ['class' => 'fa fa-edit btn btn-success btn-md']) !!} -->
									
									<!-- <a href="/attendance/{{$course->id}}/{{ '1' }}/showAttendance" class="fa fa-edit btn btn-success btn-md">  ادخال الغياب</a> -->
									<label>اختر الاسبوع</label>
									@foreach($weeks as $i => $week)
										<a href="/attendance/{{$course->id}}/{{ $week->id }}/showAttendance" class="btn btn-default btn-sm">{{ $week->id }}</a>
									@endforeach
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
    		$('#myTable').DataTable();
    	});
	</script>
	


@stop