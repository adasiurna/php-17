<?php
require_once 'Country.php';
require_once 'City.php';

$countries = Country::findAllCountries();

//var_dump($countries);
include 'header.php';
?>

    <h1>Šalys</h1>
    <table class="table table-hover">
        <thead>
            <td>Šalies kodas</td>
            <td>Šalies pavadinimas</td>
            <td>Šalies kraštovaizdis</td>
        </thead>
        <?php foreach ($countries as $country) {?>
        <tr>
            <td><?php echo $country['code'] ?></td>
            <td>
            <a href="getCountry.php?code=<?php echo $country['code']; ?>">
                <?php echo $country['name'] ?>
            </a>
            </td>
            <td><?php echo $country['surface'] ?></td>
        </tr>
        <?php }?>
    </table>
</div>
</body>
</html>