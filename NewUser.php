<?php

class NewUser
{
    protected $db;

    protected string $meno;
    protected string $priezvisko;
    protected string $prezivka;
    protected string $heslo;
    protected string $adresa;



    public function __construct(MyPDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return string
     */
    public function getMeno(): string
    {
        return $this->meno;
    }

    /**
     * @param string $meno
     */
    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return string
     */
    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }

    /**
     * @param string $priezvisko
     */
    public function setPriezvisko(string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    /**
     * @return string
     */
    public function getPrezivka(): string
    {
        return $this->prezivka;
    }

    /**
     * @param string $prezivka
     */
    public function setPrezivka(string $prezivka): void
    {
        $this->prezivka = $prezivka;
    }

    /**
     * @return string
     */
    public function getHeslo(): string
    {
        return $this->heslo;
    }

    /**
     * @param string $heslo
     */
    public function setHeslo(string $heslo): void
    {
        $this->heslo = $heslo;
    }

    /**
     * @return string
     */
    public function getAdresa(): string
    {
        return $this->adresa;
    }

    /**
     * @param string $adresa
     */
    public function setAdresa(string $adresa): void
    {
        $this->adresa = $adresa;
    }

    public function save()
    {
        $this->db->run("INSERT INTO users (`name`, `surname`, `login`, `password`, `email`) VALUES (?, ?, ?, ?, ?)",
            [$this->meno, $this->priezvisko, $this->prezivka, $this->heslo, $this->adresa]);

    }
}