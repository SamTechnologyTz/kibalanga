<?php

class Admin
{
    public static function fetch()
    {
        if (! isset($_SESSION['uid_boss'])) {
            return Redirect::to('in');
        }
    }
}