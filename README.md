# FreeScout Redis Driver

Enable Redis caching and queues for FreeScout. 

Inspired by #[4650](https://github.com/freescout-help-desk/freescout/issues/4650).

## Installation

* Ensure Redis server is installed.
* Ensure **phpredis** (not predis) driver for PHP is installed. (Both PHP-FPM and the PHP cli!)
* Double-check your Redis settings in ```config/database.php```. It must use **phpredis**, not predis.
* Add to your .env: 
  ```
  CACHE_DRIVER=redis
  CACHE_PREFIX=freescout
  QUEUE_DRIVER=redis
  # Session drivers in FreeScout appear to be broken or incompatible with PHP 8. Only file and database drivers work.
  # SESSION_DRIVER=redis
  ```
* Activate the Redis Driver module.
* Run php artisan ```freescout:clear-cache```.

Depending on your PHP version, you may see this warning when clearing the cache:
```
In PhpRedisConnection.php line 271:
                                                                                                                                           
  Illuminate\Redis\Connections\PhpRedisConnection::pipeline(): Implicitly marking parameter $callback as nullable is deprecated, the expl  
  icit nullable type must be used instead                                                                                                  
                                                                                                                                           
```

You may also see it in your App Logs. This does not appear to affect normal operation. I hope FreeScout can update the relevant files to make them compatible with PHP 8.

## Verify

You may start ```redis-cli``` and run ```KEYS freescout:*``` to check that the redis cache is being used.
  
## FAQ

* Why phpredis, not predis?
  Using phpredis requires us to install a driver in PHP only. This removes the maintenance burden that comes with adding predis to FreeScout.