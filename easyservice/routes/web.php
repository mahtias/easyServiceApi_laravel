<?php

 use Illuminate\Support\Facades\Route;


    Route::get('/', function () { 
        $data=['page_name'=>'bientot'];
        return view('bientot')->with($data);
    });

    Route::get('/hello', function () { 
        $data=['page_name'=>'bientot'];
        return view('bientot')->with($data);
    });

