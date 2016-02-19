@extends('layout')

@section('content')

	<div class="container-fluid">
		<div class="row page-title-row">
			<div class="col-md-6">
				<h3>الطلاب <small>&raquo; قائمة &raquo; {{ $student->name }}</small></h3>
			</div>
			
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>قائمة المواد المسجلة للطالب</h3>

				</div>
				<div class="panel-body">
					
					<table id="myTable" class="table table-striped table-bordered display">
						<thead>
							<tr>
								<th>اسم المادة</th>
								<th>رقم الشعبة</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($student->courses as $course)
								<tr>
									<td>{{ $course->name }}</td>
									<td>{{ $course->classroom->classroom_num }}</td>
									<!-- <td>
										{!! link_to_route('students.edit', '  تعديل البيانات', [$student->id], ['class' => 'fa fa-edit btn btn-primary btn-md']) !!}
										{!! link_to_route('students.edit', '  ادخال الأعذار', [$student->id], ['class' => 'fa fa-edit btn btn-success btn-md']) !!}
									</td>
 -->
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$('#myTable').DataTable();
		});
	</script>
@stop