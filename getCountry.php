<?php

require_once 'Country.php';
require_once 'City.php';

$countryCode = $_GET['code'];
$country = Country::findOneCountry($countryCode);
$cities = City::findCities($countryCode);
include 'header.php';
?>

<p><a href="index.php"><< Atgal</a></p>
    <h1 style="margin: 20px 0;"><?php echo $country['name'] ?></h1>
    <p>Šalies kodas: <?php echo $country['code'] ?>.<br>
    Šalies kraštovaizdis: <?php echo $country['surface'] ?>.</p>
    <h2>Šalies miestai  <a href="createCity.php?country_code=<?php echo $country['code'] ?>" style="font-size: 20px">|  Pridėti miestą  |</a></h2>

    <table class="table table-hover">
            <thead>
                <td>Pavadinimas</td>
                <td>Rajonas</td>
                <td>Populiacija</td>
                <td>Šalies kodas</td>
                <td>Veiksmai</td>
            </thead>
    
            <?php foreach ($cities as $city) {?>        
            <tr>
                <td><?php echo $city['name'] ?></td>
                <td><?php echo $city['district'] ?></td>
                <td><?php echo $city['population'] ?></td>
                <td><?php echo $city['country_code'] ?></td>
                <td><a href="editCity.php?id=<?php echo $city['id'] ?>>">Redaguoti</a>
                <form action="deleteCity.php" method="POST" style="display: inline-block">
                    <input type="hidden" name="id" value="<?php echo $city['id'] ?>">
                    <input type="submit" value="Trinti miestą">
                </form></td>
            </tr>
            <?php }?>
    </table>
</div>
</body>
</html>
