<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
 */
require __DIR__ . '/../bootstrap/autoload.php'; //注册自动加载所有的文件

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
 */

$app = require_once __DIR__ . '/../bootstrap/app.php'; //实例化app 注册事件、服务定义常用属性方法绑定路径别名

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
 */

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class); //加载核心类库
$response = $kernel->handle( //处理输入 构建输出
	$request = Illuminate\Http\Request::capture() //将所有的输入整理到request对象里面
);

$response->send(); //输出

$kernel->terminate($request, $response); //处理结束回调
