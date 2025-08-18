<?php

Route::group(['middleware' => 'web', 'prefix' => \Helper::getSubdirectory(), 'namespace' => 'Modules\CustomApp\Http\Controllers'], function () {
  Route::get('/customapp/content', ['uses' => 'CustomAppController@content'])->name('customapp.content');

  Route::get('/mailbox/customapp/{id}', ['uses' => 'CustomAppController@mailboxSettings', 'middleware' => ['auth', 'roles'], 'roles' => ['admin']])->name('mailboxes.customapp');
  Route::post('/mailbox/customapp/{id}', ['uses' => 'CustomAppController@mailboxSettingsSave', 'middleware' => ['auth', 'roles'], 'roles' => ['admin']])->name('mailboxes.customapp.save');
});
