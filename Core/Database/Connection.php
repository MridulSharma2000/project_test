<?php

class Connection
{
    public static function ConnectDb($config)
    {
        try {
            return new PDO(
                $config['connection'] . '; dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['option']
            );
        } catch (PDOException $e) {
            die('Not Able to Connect Due to Some Server Issue');
        }
    }
}
