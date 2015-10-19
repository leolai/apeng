<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(//实例化出一个app
    realpath(__DIR__.'/../')//根目录
);


/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);
/*
 * e($app);
 * 至此 主要方法、属性都绑定好了
object(Illuminate\Foundation\Application)[2]
  protected 'basePath' => string 'D:\wamp\www\apeng3' (length=18)
  protected 'hasBeenBootstrapped' => boolean false
  protected 'booted' => boolean false
  protected 'bootingCallbacks' => 
    array (size=0)
      empty
  protected 'bootedCallbacks' => 
    array (size=0)
      empty
  protected 'terminatingCallbacks' => 
    array (size=0)
      empty
  protected 'serviceProviders' => 
    array (size=2)
      0 => 
        object(Illuminate\Events\EventServiceProvider)[3]
          protected 'app' => 
            &object(Illuminate\Foundation\Application)[2]
          protected 'defer' => boolean false
      1 => 
        object(Illuminate\Routing\RoutingServiceProvider)[7]
          protected 'app' => 
            &object(Illuminate\Foundation\Application)[2]
          protected 'defer' => boolean false
  protected 'loadedProviders' => 
    array (size=2)
      'Illuminate\Events\EventServiceProvider' => boolean true
      'Illuminate\Routing\RoutingServiceProvider' => boolean true
  protected 'deferredServices' => 
    array (size=0)
      empty
  protected 'monologConfigurator' => null
  protected 'databasePath' => null
  protected 'storagePath' => null
  protected 'environmentPath' => null
  protected 'environmentFile' => string '.env' (length=4)
  protected 'namespace' => null
  protected 'resolved' => 
    array (size=1)
      'events' => boolean true
  protected 'bindings' => 
    array (size=10)
      'events' => 
        array (size=2)
          'concrete' => 
            object(Closure)[4]
              ...
          'shared' => boolean true
      'router' => 
        array (size=2)
          'concrete' => 
            object(Closure)[9]
              ...
          'shared' => boolean false
      'url' => 
        array (size=2)
          'concrete' => 
            object(Closure)[11]
              ...
          'shared' => boolean false
      'redirect' => 
        array (size=2)
          'concrete' => 
            object(Closure)[13]
              ...
          'shared' => boolean false
      'Psr\Http\Message\ServerRequestInterface' => 
        array (size=2)
          'concrete' => 
            object(Closure)[14]
              ...
          'shared' => boolean false
      'Psr\Http\Message\ResponseInterface' => 
        array (size=2)
          'concrete' => 
            object(Closure)[15]
              ...
          'shared' => boolean false
      'Illuminate\Contracts\Routing\ResponseFactory' => 
        array (size=2)
          'concrete' => 
            object(Closure)[16]
              ...
          'shared' => boolean true
      'Illuminate\Contracts\Http\Kernel' => 
        array (size=2)
          'concrete' => 
            object(Closure)[17]
              ...
          'shared' => boolean true
      'Illuminate\Contracts\Console\Kernel' => 
        array (size=2)
          'concrete' => 
            object(Closure)[18]
              ...
          'shared' => boolean true
      'Illuminate\Contracts\Debug\ExceptionHandler' => 
        array (size=2)
          'concrete' => 
            object(Closure)[19]
              ...
          'shared' => boolean true
  protected 'instances' => 
    array (size=10)
      'app' => 
        &object(Illuminate\Foundation\Application)[2]
      'Illuminate\Container\Container' => 
        &object(Illuminate\Foundation\Application)[2]
      'events' => 
        object(Illuminate\Events\Dispatcher)[5]
          protected 'container' => 
            &object(Illuminate\Foundation\Application)[2]
          protected 'listeners' => 
            array (size=0)
              ...
          protected 'wildcards' => 
            array (size=0)
              ...
          protected 'sorted' => 
            array (size=2)
              ...
          protected 'firing' => 
            array (size=0)
              ...
          protected 'queueResolver' => 
            object(Closure)[6]
              ...
      'path' => string 'D:\wamp\www\apeng3\app' (length=22)
      'path.base' => string 'D:\wamp\www\apeng3' (length=18)
      'path.config' => string 'D:\wamp\www\apeng3\config' (length=25)
      'path.database' => string 'D:\wamp\www\apeng3\database' (length=27)
      'path.lang' => string 'D:\wamp\www\apeng3\resources\lang' (length=33)
      'path.public' => string 'D:\wamp\www\apeng3\public' (length=25)
      'path.storage' => string 'D:\wamp\www\apeng3\storage' (length=26)
  protected 'aliases' => 
    array (size=57)
      'Illuminate\Foundation\Application' => string 'app' (length=3)
      'Illuminate\Contracts\Container\Container' => string 'app' (length=3)
      'Illuminate\Contracts\Foundation\Application' => string 'app' (length=3)
      'Illuminate\Auth\AuthManager' => string 'auth' (length=4)
      'Illuminate\Auth\Guard' => string 'auth.driver' (length=11)
      'Illuminate\Contracts\Auth\Guard' => string 'auth.driver' (length=11)
      'Illuminate\Auth\Passwords\TokenRepositoryInterface' => string 'auth.password.tokens' (length=20)
      'Illuminate\View\Compilers\BladeCompiler' => string 'blade.compiler' (length=14)
      'Illuminate\Cache\CacheManager' => string 'cache' (length=5)
      'Illuminate\Contracts\Cache\Factory' => string 'cache' (length=5)
      'Illuminate\Cache\Repository' => string 'cache.store' (length=11)
      'Illuminate\Contracts\Cache\Repository' => string 'cache.store' (length=11)
      'Illuminate\Config\Repository' => string 'config' (length=6)
      'Illuminate\Contracts\Config\Repository' => string 'config' (length=6)
      'Illuminate\Cookie\CookieJar' => string 'cookie' (length=6)
      'Illuminate\Contracts\Cookie\Factory' => string 'cookie' (length=6)
      'Illuminate\Contracts\Cookie\QueueingFactory' => string 'cookie' (length=6)
      'Illuminate\Encryption\Encrypter' => string 'encrypter' (length=9)
      'Illuminate\Contracts\Encryption\Encrypter' => string 'encrypter' (length=9)
      'Illuminate\Database\DatabaseManager' => string 'db' (length=2)
      'Illuminate\Events\Dispatcher' => string 'events' (length=6)
      'Illuminate\Contracts\Events\Dispatcher' => string 'events' (length=6)
      'Illuminate\Filesystem\Filesystem' => string 'files' (length=5)
      'Illuminate\Filesystem\FilesystemManager' => string 'filesystem' (length=10)
      'Illuminate\Contracts\Filesystem\Factory' => string 'filesystem' (length=10)
      'Illuminate\Contracts\Filesystem\Filesystem' => string 'filesystem.disk' (length=15)
      'Illuminate\Contracts\Filesystem\Cloud' => string 'filesystem.cloud' (length=16)
      'Illuminate\Contracts\Hashing\Hasher' => string 'hash' (length=4)
      'Illuminate\Translation\Translator' => string 'translator' (length=10)
      'Symfony\Component\Translation\TranslatorInterface' => string 'translator' (length=10)
      'Illuminate\Log\Writer' => string 'log' (length=3)
      'Illuminate\Contracts\Logging\Log' => string 'log' (length=3)
      'Psr\Log\LoggerInterface' => string 'log' (length=3)
      'Illuminate\Mail\Mailer' => string 'mailer' (length=6)
      'Illuminate\Contracts\Mail\Mailer' => string 'mailer' (length=6)
      'Illuminate\Contracts\Mail\MailQueue' => string 'mailer' (length=6)
      'Illuminate\Auth\Passwords\PasswordBroker' => string 'auth.password' (length=13)
      'Illuminate\Contracts\Auth\PasswordBroker' => string 'auth.password' (length=13)
      'Illuminate\Queue\QueueManager' => string 'queue' (length=5)
      'Illuminate\Contracts\Queue\Factory' => string 'queue' (length=5)
      'Illuminate\Contracts\Queue\Monitor' => string 'queue' (length=5)
      'Illuminate\Contracts\Queue\Queue' => string 'queue.connection' (length=16)
      'Illuminate\Routing\Redirector' => string 'redirect' (length=8)
      'Illuminate\Redis\Database' => string 'redis' (length=5)
      'Illuminate\Contracts\Redis\Database' => string 'redis' (length=5)
      'Illuminate\Http\Request' => string 'request' (length=7)
      'Illuminate\Routing\Router' => string 'router' (length=6)
      'Illuminate\Contracts\Routing\Registrar' => string 'router' (length=6)
      'Illuminate\Session\SessionManager' => string 'session' (length=7)
      'Illuminate\Session\Store' => string 'session.store' (length=13)
      'Symfony\Component\HttpFoundation\Session\SessionInterface' => string 'session.store' (length=13)
      'Illuminate\Routing\UrlGenerator' => string 'url' (length=3)
      'Illuminate\Contracts\Routing\UrlGenerator' => string 'url' (length=3)
      'Illuminate\Validation\Factory' => string 'validator' (length=9)
      'Illuminate\Contracts\Validation\Factory' => string 'validator' (length=9)
      'Illuminate\View\Factory' => string 'view' (length=4)
      'Illuminate\Contracts\View\Factory' => string 'view' (length=4)
  protected 'extenders' => 
    array (size=0)
      empty
  protected 'tags' => 
    array (size=0)
      empty
  protected 'buildStack' => 
    array (size=0)
      empty
  public 'contextual' => 
    array (size=0)
      empty
  protected 'reboundCallbacks' => 
    array (size=0)
      empty
  protected 'globalResolvingCallbacks' => 
    array (size=0)
      empty
  protected 'globalAfterResolvingCallbacks' => 
    array (size=0)
      empty
  protected 'resolvingCallbacks' => 
    array (size=0)
      empty
  protected 'afterResolvingCallbacks' => 
    array (size=0)
      empty
 * 
 */

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
