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

    public function __construct(string $name, string $country_code, string $district, int $population)
    {
        
        $this->name = $name;
        $this->country_code = $country_code;
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
        $query = self::$pdo->prepare('SELECT id, name, country_code, district, population  FROM city where id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    
    // Užduotis 6
    // Sukurkime statinį metodą City::findCities($countryCode):
    // Kuris gražintų tos šalies miestus.   

    public static function findCities($countryCode):array
    {
        self::loadDatabase();
        $query = self::$pdo->prepare('SELECT * FROM city WHERE country_code = :country_code');
        $query->execute(['country_code' => $countryCode]);

        return $query->fetchAll();
        
    }

    public static function findAllCities(): array
    {
        self::loadDatabase();
        $query = self::$pdo->prepare('SELECT id, name, country_code, district, population FROM city');
        $query->execute();

        return $query->fetchAll();
    }

    // Užduotis 7
    // Sukurkime metodą "City->save" išsaugojimui miesto į duomenų bazę.
    // Sukurkime statinį metodą "City::delete($id)" miesto trynimui 

    public function saveNewCity(): bool
    {
        self::loadDatabase();
        $sql = 'INSERT INTO city(name, district, population, country_code) VALUES (:name, :district, :population, :country_code)';
        $query = self::$pdo->prepare($sql);    
      
        return $query->execute([
            'name'=> $this->name,
            'district'=> $this->district,
            'population'=> $this->population,
            'country_code' => $this->country_code
            ]);    
    } 

    public static function deleteCity(int $id) : bool
    {
        self::loadDatabase();      
        $query = self::$pdo->prepare('DELETE FROM city WHERE id=:id');

        return $query->execute(['id' => $id]);
    }

    public static function updateCity(int $id, string $name, string $district, int $population, string $country_code): bool
    {
        self::loadDatabase(); 
        $sql = 'UPDATE city
        SET name=:name,
            district=:district,
            population=:population,
            country_code=:country_code       
        WHERE id=:id';

        $query = self::$pdo->prepare($sql);

        return $query->execute([
        'id' => $id,
        'name' => $name,
        'district' => $district,
        'population' => $population,
        'country_code' => $country_code,     
        ]);
    }    

}
