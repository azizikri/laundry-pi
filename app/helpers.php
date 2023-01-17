<?php

use Illuminate\Support\Facades\Request;


function active_class($path, $active = 'active') {
  return in_array(Request::url(), $path) ? $active : '';
}

function is_active_route($path) {
  return in_array(Request::url(), $path) ? 'true' : 'false';

}

function show_class($path) {
  return in_array(Request::url(), $path) ? 'show' : '';

}
