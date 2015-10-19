@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>数据格式错误！</strong><br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('data/'.$data->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="transform">激活转化</label>
            <input type="text" name="transform" class="form-control" required="required" value="{{ $data->transform }}">
            <br>
            <label for="price">价格</label>
            <input type="text" name="price" class="form-control" required="required" value="{{ $data->price }}">
            <br>
            <label for="income">收入</label>
            <input type="text" name="income" class="form-control" required="required" value="{{ $data->income }}">
            <br>
            
            <button class="btn btn-lg btn-info">确认修改</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection