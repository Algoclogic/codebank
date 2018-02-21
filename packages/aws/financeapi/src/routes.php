<?php
/* ------  Amazon AWS Finance APi Package Route
 *
 *
*/ 

Route::get('timezones/{timezone?}', 
  'aws\financeapi\TimezonesController@index');
