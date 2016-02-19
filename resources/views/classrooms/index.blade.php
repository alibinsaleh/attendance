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
							<th>رقم الشعبة</th>
							<th>اسم الشعبة</th>
							<th>المادة</th>
							<th>معلم المادة</th>
							<th>العمليات</th>
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


						@foreach ($classrooms as $classroom)
							<tr>
								<td>
									{{ $classroom->classroom_num }}
								</td>
								<td>
									{{ $classroom->name }}
								</td>
								<td>
									
								</td>
								
								<td>
									
								</td>
								<td>
									{!! link_to_route('classrooms.edit', '  تعديل', [$classroom->id], ['class' => 'fa fa-edit btn btn-primary btn-md']) !!}
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