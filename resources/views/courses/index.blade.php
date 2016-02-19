@extends('layout')

@section('content')

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>قائمة المواد الدراسية</h3>
			</div>
			<div class="panel-body">
				<div class="text-right">
					<a href="/courses/create" class="btn btn-success btn-md"> <i class="fa fa-plus-circle"></i> مادة جديدة</a> 
				</div>
				<br>
				<br>
				<table id="myTable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>المادة</th>
							<th>العمليات</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($courses as $course)
							<tr>
								<td>{{ $course->name }}</td>
								<td>
									{!! link_to_route('courses.edit', '  تعديل', [$course->id], ['class' => 'fa fa-edit btn btn-primary btn-md']) !!}
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