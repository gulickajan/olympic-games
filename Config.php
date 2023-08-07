<?php

class Config
{
    private string $username = "root";
    private string $password = "popo123";

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}