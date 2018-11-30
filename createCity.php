<?php
require_once 'City.php';
require_once 'Country.php';

$countries = Country::findAllCountries();
$country_code = $_GET['country_code'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $city = new City($_POST['name'], $_POST['country_code'], $_POST['district'], (int) $_POST['population']);
    $city->saveNewCity();

    header('Location:index.php');
    exit();
}
include 'header.php';
?>

<h1>Naujas miestas</h1>
<form method="POST">
    Pavadinimas: <input type="text" name="name"><br>
    Rajonas: <input type="text" name="district"><br>
    Populiacija: <input type="text" name="population"><br>
    Šalies kodas: <?php echo $country_code; ?> <input type="hidden" name="country_code" value="<?php echo $country_code; ?>">
    <input type="submit" value="Išsaugoti">

</form>
</div>
</body>
</html>

