<?php

namespace Modules\RedisDriver\Services;

class RedisOverrideService
{
    public static function override() {

		$models = [
			\App\Customer::class,
			\App\Email::class,
			\App\User::class,
			\App\MailboxUser::class,
			\App\Conversation::class,
			\App\Mailbox::class,
		];
        
		foreach ( $models as $model_class ) {
			try {
				$model_class::retrieved( function ( $instance ) {
					$instance->rememberCacheDriver = 'redis';
				} );
			} catch (\Exception $e) {
				\Log::warning( "Failed to patch Rememberable for {$model_class}: " . $e->getMessage() );
			}
		}
	}
}
