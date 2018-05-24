<?php

Route::get('details', 'ContactController@view');
Route::get('locations', 'ContactController@locations');
Route::get('/{search?}', 'ContactController@index');

