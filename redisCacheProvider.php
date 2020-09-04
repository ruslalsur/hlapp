<?php


class redisCacheProvider
{
    private $connection;

    /**
     * redisCacheProvider constructor.
     * @param null $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function get($key)
    {
        return $this->connection->get($key);
    }

    public function set($key, $value, $time = 0)
    {
        $this->connection->set($key, $time);
    }

    public function del($key)
    {
        $this->connection->delete($key);
    }

    public function clear()
    {
        $this->connection->flushDB();
    }
}