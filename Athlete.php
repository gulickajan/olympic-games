<?php

class Athlete
{
    private $db;
    private int $placing;
    private string $discipline;
    private string $type1;
    private int $year;
    private int $order;
    private string $city;
    private string $country;
    private string $name1;
    private string $surname;
    private string $birth_day;
    private string $birth_place;
    private string $birth_country;
    private string $death_day;
    private string $death_place;
    private string $death_country;
    private int $person_id;
    private int $place_id;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @return int
     */
    public function getPlacing(): int
    {
        return $this->placing;
    }

    /**
     * @param int $placing
     */
    public function setPlacing(int $placing): void
    {
        $this->placing = $placing;
    }



    /**
     * @return string
     */
    public function getDiscipline(): string
    {
        return $this->discipline;
    }

    /**
     * @param string $discipline
     */
    public function setDiscipline(string $discipline): void
    {
        $this->discipline = $discipline;
    }

    /**
     * @return string
     */
    public function getType1(): string
    {
        return $this->type1;
    }

    /**
     * @param string $type1
     */
    public function setType1(string $type1): void
    {
        $this->type1 = $type1;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getName1(): string
    {
        return $this->name1;
    }

    /**
     * @param string $name1
     */
    public function setName1(string $name1): void
    {
        $this->name1 = $name1;
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
    public function getBirthDay(): string
    {
        return $this->birth_day;
    }

    /**
     * @param string $birth_day
     */
    public function setBirthDay(string $birth_day): void
    {
        $this->birth_day = $birth_day;
    }

    /**
     * @return string
     */
    public function getBirthPlace(): string
    {
        return $this->birth_place;
    }

    /**
     * @param string $birth_place
     */
    public function setBirthPlace(string $birth_place): void
    {
        $this->birth_place = $birth_place;
    }

    /**
     * @return string
     */
    public function getBirthCountry(): string
    {
        return $this->birth_country;
    }

    /**
     * @param string $birth_country
     */
    public function setBirthCountry(string $birth_country): void
    {
        $this->birth_country = $birth_country;
    }

    /**
     * @return string
     */
    public function getDeathDay(): string
    {
        return $this->death_day;
    }

    /**
     * @param string $death_day
     */
    public function setDeathDay(string $death_day): void
    {
        $this->death_day = $death_day;
    }

    /**
     * @return string
     */
    public function getDeathPlace(): string
    {
        return $this->death_place;
    }

    /**
     * @param string $death_place
     */
    public function setDeathPlace(string $death_place): void
    {
        $this->death_place = $death_place;
    }

    /**
     * @return string
     */
    public function getDeathCountry(): string
    {
        return $this->death_country;
    }

    /**
     * @param string $death_country
     */
    public function setDeathCountry(string $death_country): void
    {
        $this->death_country = $death_country;
    }

    /**
     * @return int
     */
    public function getPersonId(): int
    {
        return $this->person_id;
    }

    /**
     * @param int $person_id
     */
    public function setPersonId(int $person_id): void
    {
        $this->person_id = $person_id;
    }

    /**
     * @return int
     */
    public function getPlaceId(): int
    {
        return $this->place_id;
    }

    /**
     * @param int $place_id
     */
    public function setPlaceId(int $place_id): void
    {
        $this->place_id = $place_id;
    }


    public function savePerson()
    {
        $this->db->run("INSERT INTO person (`name`, `surname`, `birth_day`, `birth_place`, `birth_country`, `death_day`, `death_place`, `death_country`)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
                        [$this->name1, $this->surname, $this->birth_day, $this->birth_place, $this->birth_country, $this->death_day,$this->death_place, $this->death_country]);
    }

    public function savePlace()
    {
        $this->db->run("INSERT INTO place (`type`, `year`, `game_order`, `city`, `country`) VALUES (?, ?, ?, ?, ?)",
                        [$this->type1, $this->year, $this->order, $this->city, $this->country]);
    }

    public function savePosition()
    {
        $this->db->run("INSERT INTO position (`person_id`, `place_id`, `placing`, `discipline`) VALUES (?, ?, ?, ?)",
                        [$this->person_id, $this->place_id, $this->placing, $this->discipline]);
    }


}