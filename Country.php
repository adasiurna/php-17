<?php

require_once 'DBConnectionTrait.php';
class Country
{
    use DBConnectionTrait;
    protected $code;
    protected $name;
    protected $surface;

    public function __construct(string $code, string $name, string $surface)
    {
        $this->code = $code;
        $this->name = $name;
        $this->surface = $surface;
        self::loadDatabase();
    }

    public static function findOneCountry(string $code): array
    {
        self::loadDatabase();
        $query = self::$pdo->prepare('SELECT code, name, surface FROM country where code = :code');
        $query->execute(['code' => $code]);

        return $query->fetch();
    }

    // Užduotis 5
    // Sukurkite statinį metodą 
    // Country::findallCountries(): array
    // kuris grąžintų iš duomenų bazės visas šalis masyve.


    public static function findAllCountries(): array
    {
        self::loadDatabase();
        $query = self::$pdo->prepare('SELECT code, name, surface FROM country');
        $query->execute();

        return $query->fetchAll();
    }
}
