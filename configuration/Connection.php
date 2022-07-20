<?php

class Connection
{
    public $connection;

    function getConnection()
    {
        $connection['db_server']    = 'localhost';
        $connection['db_username']  = 'root';
        $connection['db_password']  = '';
        $connection['db_name']      = 'jrki';

        return $connection;
    }
}
