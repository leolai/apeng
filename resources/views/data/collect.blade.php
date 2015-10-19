@extends('app')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	
<ul class="nav nav-tabs">
  <li role="presentation" ><a href="{{ URL('data') }}">详情</a></li>
  <li role="presentation" class="active"><a href="#">汇总</a></li>
</ul>

		<table class="table-bordered table table-striped table-responsive table-condensed text-center">
			<thead>
				<tr>
					<td><strong>ID</strong></td>
					<td><strong>推送数量</strong></td>
					<td><strong>日期</strong></td>
				</tr>
			</thead>
			
			<tbody>
				@foreach ($day as $key => $data)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $data->dcount }}</td>
					<td>{{ $data->d }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
		<ul class="nav nav-pills" role="tablist">
		  <li role="presentation" class="active">月汇总：<span class="badge">{{$madd[0]->mcount}}</span></li>
		  <li role="presentation">总数：<span class="badge">{{$all[0]->countuser}}</span></li>
		</ul>
	
	</div>
	
	<div class="col-md-8 col-md-offset-2">
		{!! $day->render()!!}
	</div>

</div>



@endsection

