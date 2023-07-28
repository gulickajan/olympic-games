<?php

class NewUser
{
    protected $db;

    protected string $name;
    protected string $surname;
    protected string $login;
    protected string $password;
    protected string $adress;



    public function __construct(MyPDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return string
     */
    public function getMeno(): string
    {
        return $this->name;
    }

    /**
     * @param string $meno
     */
    public function setMeno(string $meno): void
    {
        $this->name = $meno;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getAdress(): string
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     */
    public function setAdress(string $adress): void
    {
        $this->adress = $adress;
    }

    public function save()
    {
        $this->db->run("INSERT INTO users (`name`, `surname`, `login`, `password`, `email`) VALUES (?, ?, ?, ?, ?)",
            [$this->name, $this->surname, $this->login, $this->password, $this->adress]);

    }
}