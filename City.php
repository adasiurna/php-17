<!-- id, name, countryCode, district, population -->
<?php

require_once 'DBConnectionTrait.php';
class City
{
    use DBConnectionTrait;
    protected $id;
    protected $name;
    protected $countryCode;
    protected $district;
    protected $population;

    public function __construct(string $id, string $name, int $countryCode, string $district, int $population)
    {
        $this->id = $id;
        $this->name = $name;
        $this->countryCode = $countryCode;
        $this->district = $district;
        $this->population = $population;
        self::loadDatabase();
    }

    // Užduotis 4
    // Pamėginkite sukurti klasę City kuri atstovautų vieną DB įrašą lentelėje Cities.
    // City  laukai: id, name, countryCode, district, population

    public static function findOneCity(string $id): array
    {
        self::loadDatabase();
        $query = self::$pdo->prepare('SELECT id, name, countryCode, district, population  FROM city where id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    
    // Užduotis 6
    // Sukurkime statinį metodą City::findCities($countryCode):
    // Kuris gražintų tos šalies miestus.   


    public static function findAllCities(): array
    {
        self::loadDatabase();
        $query = self::$pdo->prepare('SELECT id, name, countryCode, district, population FROM city');
        $query->execute();

        return $query->fetchAll();
    }

    // Užduotis 7
    // Sukurkime metodą "City->save" išsaugojimui miesto į duomenų bazę.
    // Sukurkime statinį metodą "City::delete($id)" miesto trynimui 

    public static function saveNewCity(string $id): void
    {
        self::loadDatabase();
        $query = self::$pdo->prepare('INSERT INTO country(name, countryCode, district, population)
         VALUES (:name, :countryCode, :district, :population)');
        $query->execute([
            'name' => $name,
            'countryCode' => $countryCode,
            'district' => $district,
            'population' => $population,
            ]);

        return;
    }
}
