# php-17
# Užduotis 1
Pamėginkime sukurti klasę Country kuri atspindėtų vieną įrašą esantį DB.

Pamėginkime konstruktorių:

◦ __construct(int $code, string $name, string $surfaceArea);



# Užduotis 2
Sukurkime Trait klasę savo duomenų bazės prisijungimui

Kvieskime getConnection() klasės Country konstruktoriuje


# Užduotis 3
Sukurkime statinį metodą kuris turi paimti duomenis iš DB ir užkrauti objekto laukus.

Panaudokime pdo metodą užkrauti objektams iš DB https://phpdelusions.net/pdo/objects



public static function findOneByCode($code){
    self::pdo->prepare('SELECT... WHERE code=:code');
    //...
}




# Užduotis 4
Pamėginkite sukurti klasę City kuri atstovautų vieną DB įrašą lentelėje Cities.

City  laukai: id, name, countryCode, district, population



# Užduotis 5
Sukurkite statinį metodą 

Country::findallCountries(): array

kuris grąžintų iš duomenų bazės visas šalis masyve.



# Užduotis 6
Sukurkime statinį metodą City::findCities($countryCode):

Kuris gražintų tos šalies miestus.


# Užduotis 7
Sukurkime metodą "City->save" išsaugojimui miesto į duomenų bazę.

Sukurkime statinį metodą "City::delete($id)" miesto trynimui 



# Užduotis 8
Sukurkime  Countries.php puslapį šalių atvaizdavimui. Rodomos visos šalys. Kiekviena šalis turi nuoroda į peržiūros puslapį
Paspaudus ant šalies matomi jos duomenys ir jos miestai. Miestams rodomos nuorodos: ištrinti, redaguoti: Country.php?id=1
Galima Šaliai pridėti miestą, matoma pridėjimo forma CreateCity.php?country=1
Galima Ištrinti miestą: DeleteCity.php# php-17-nd
