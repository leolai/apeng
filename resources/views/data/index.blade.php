@extends('app')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">详情</a></li>
  <li role="presentation"><a href="{{ URL('data/collect') }}">汇总</a></li>
</ul>

		<table class="table-bordered table table-striped table-responsive table-condensed text-center">
			<thead>
				<tr>
					<td><strong>ID</strong></td>
					<td><strong>用户编号(包ID)</strong></td>
					<td><strong>IMEI</strong></td>
					<td><strong>激活时间</strong></td>
					@if(isset($isAdmin) && $isAdmin)
					<td><strong>管理</strong></td>
					@endif
				</tr>
			</thead>
			
			<tbody>
				@foreach ($datas as $data)
				<tr>
					<td>{{$data->id}}</td>
					<td>{{$data->cpidx}}</td>
					<td>{{$data->imei}}</td>
					<td>{{$data->created_at}}</td>
					@if(isset($isAdmin) && $isAdmin)
					<td>
						<a href="{{ URL('data/'.$data->id.'/edit') }}" class="btn btn-success">编辑</a>
						<form action="{{ URL('data/'.$data->id) }}" method="POST" style="display: inline;">
			              <input name="_method" type="hidden" value="DELETE">
			              <input type="hidden" name="_token" value="{{ csrf_token() }}">
			              <button type="submit" class="btn btn-danger">删除</button>
			            </form>
					</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	
	</div>
	
	<div class="col-md-8 col-md-offset-2">
		{!! $datas->render()!!}
	</div>

</div>



@endsection

