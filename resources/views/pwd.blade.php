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

          <form action="{{ URL('/reset') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <label for="transform">新密码</label>
            <input type="password" name="pwd" class="form-control" required="required">
            <br>
            
            <label for="transform">再次输入新密码</label>
            <input type="password" name="re-pwd" class="form-control" required="required">
            <br>
            <input type="hidden" name="id" value="{{$id}}">
            <button class="btn btn-lg btn-info">确认修改</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection