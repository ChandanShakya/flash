<?php

class Database_conn
{
    private static $host = 'localhost';

    private static $user = 'chandan';

    private static $pass = 'chandan';

    private static $db = 'flash';

    private $con = null;

    public function __construct()
    {
        $this->con = mysqli_connect(self::$host, self::$user, self::$pass, self::$db);
    }

    public function getConnection()
    {
        return $this->con;
    }
}
