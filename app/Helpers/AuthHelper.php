<?php

function check_privilege($section)
{
    $auth = \Session::get('authorization');
    return ($auth->$section == 1) ? true : false;
}

?>