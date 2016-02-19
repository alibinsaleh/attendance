@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>قائمة المواد والشعب</h3>
			</div>
			<div class="panel-body">
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

						<div class="text-right">
							<a href="/classrooms/create" class="btn btn-success btn-md"> <i class="fa fa-plus-circle"></i> شعبة جديدة</a> 
						</div>
						<br>
						<br>

						@include('partials.errors')
						@include('partials.success')


						@foreach ($attendances as $attendance)
							<tr>
								<td>{{ $attendance->student->academic_num }}</td>
								<td>{{ $attendance->student->name }}</td>
								<td>{{ $attendance->sunday }}</td>
								<td>{{ $attendance->monday }}</td>
								<td>{{ $attendance->tuesday }}</td>
								<td>{{ $attendance->wednesday }}</td>
								<td>{{ $attendance->thursday }}</td>
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