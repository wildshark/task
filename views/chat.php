<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 26-Apr-17
 * Time: 5:32 PM
 */

$ip = 'google.com'; //some ip
exec("ping -n 4 $ip 2>&1", $output, $retval);
if ($retval != 0) {
    $p="<script type='text/javascript'>alert('No internet connection!')</script>";
    $pageData->pagecontent=$p;
}else{
    $pageData->pagecontent="<iframe src='http://deadsimplechat.com/+ISTnY' frameborder='0' width='100%' height='600px'></iframe>";
}