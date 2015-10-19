<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>数据后台系统</title>
	
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
	<!-- Fonts -->
  	<link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  
  	<!-- 自定义样式 -->
 	 <link href="/css/css.css" rel="stylesheet">
</head>
<body>
@if(isset($user) && $user)
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	  <div class="container">
	    <ul class="nav navbar-nav">
	    	@if(isset($isAdmin) && $isAdmin)
	    	<li><a href="{{ URL('/data/create') }}" >添加</a></li>
	    	@endif
	    	
	    	
	    	<li><a href="{{ URL('/excel') }}" >导出Excel</a></li>
			<li><a href="{{ URL('/reset') }}" >修改密码</a></li>
			<li><a href="{{ URL('/auth/logout') }}" >退出登陆</a></li>
	    	
	   		
		</ul>
	  </div>
	</nav>
@endif
	<!-- 主体部分  -->
	<div class="container-fluid" style="margin-top: 80px">
	@yield('content')
	</div>

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>