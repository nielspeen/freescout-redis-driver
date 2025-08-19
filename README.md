# FreeScout Redis Driver

Enable Redis caching for FreeScout. 

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
  
## FAQ

* Why phpredis?
  Using phpredis requires us to install a driver in PHP only. This removes the maintenance burden that comes with adding predis to FreeScout.