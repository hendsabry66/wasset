<?php

function settings(){
    $array =[];
    foreach(\App\Models\Setting::all() as $key=>$value){
        $array[$value->key] = $value->value;
    }
    return $array;

}

function categories(){
    $array = \App\Models\Category::where('parent_id',null)->where('status','active')->get();
    return $array;

}


