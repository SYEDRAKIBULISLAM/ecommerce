<?php

function root(){
    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    return $actual_link;
}
