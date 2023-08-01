@extends('common')
@section('title', 'Update Task')
@section('page_heading') 
<h2 class="mb-3">Update Task</h2>
@endsection

@section('content')
<table class="table table-bordered">
	<form action="{{url('task/update')}}/{{$task->id}}" method="POST">
	{{ csrf_field() }}
	<tbody>
		@if(Session::has('success'))
		<tr class="bg-success">
			<td colspan="2">
				{{session('success')}}
			</td>
		</tr>
		@endif
		<tr>
			<th colspan="4"><a href="{{url('/')}}" class="btn btn-secondary btn-sm"><< Task List</a></th>
		</tr>
		<tr>
			<th>Title</th>
			<td><input type="text" value="{{ $task->title }}" class="form-control" name="title" /></td>
		</tr>
		<tr>
			<th>Description</th>
			<td>
				<textarea name="desc" class="form-control" rows="10">{{ $task->description }}</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-danger" />
			</td>
		</tr>
	</tbody>
	</form>
</table>
@endsection