<?php


function check($module_id, $permission_id, $permissions){

    $found = 0;

    foreach($permissions as $permission){

    if($permission['module_id'] == $module_id && $permission['permission_id'] == $permission_id){
    // return 1;
    $found = 1;
    break;
    }

    }

    return $found;

    }


