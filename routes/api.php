<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('files', 'FileController', ['except' => ['create', 'edit']]);
