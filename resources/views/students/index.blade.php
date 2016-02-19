@extends('layout')

@section('content')

	<div class="container-fluid">
		<div class="row page-title-row">
			<div class="col-md-6">
				<h3>الطلاب <small>&raquo; قائمة</small></h3>
			</div>
			
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>قائمة جميع الطلاب</h3>

				</div>
				<div class="panel-body">
					<div class="text-right">
						<a href="/students/create" class="btn btn-success btn-md"> <i class="fa fa-plus-circle"></i> طالب جديد</a> 
					</div>
					<br>
					<br>
					@include('partials.errors')
					@include('partials.success')
					<table id="myTable" class="table table-striped table-bordered display">
						<thead>
							<tr>
								<th>الرقم الأكاديمي</th>
								<th>اسم الطالب</th>
								<th>العمليات</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($students as $student)
								<tr>
									<td>{{ $student->academic_num }}</td>
									<td>{{ $student->name }}</td>
									<td>
										{!! link_to_route('students.edit', '  تعديل البيانات', [$student->id], ['class' => 'fa fa-edit btn btn-primary btn-md']) !!}
										{!! link_to_route('students.edit', '  ادخال الأعذار', [$student->id], ['class' => 'fa fa-edit btn btn-success btn-md']) !!}
									</td>

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