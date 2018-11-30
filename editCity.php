<?php
require_once 'City.php';
require_once 'Country.php';

$cityId = $_GET['id'];
$city = City::findOneCity($cityId);
$countries = Country::findAllCountries();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    city::updateCity((int) $_POST['id'], $_POST['name'], $_POST['district'], (int) $_POST['population'], $_POST['country_code']);

    header('Location:index.php');
    exit();}

include 'header.php';
?>


<h1>Miesto redagavimas</h1>
<form method="POST">
    Pavadinimas: <input type="text" name="name" value="<?php echo $city['name']; ?>"><br>
    Rajonas: <input type="text" name="district" value="<?php echo $city['district']; ?>"><br>
    Populiacija: <input type="text" name="population" value="<?php echo $city['population']; ?>"><br>
    Šalies kodas:
        <select name="country_code">
        <?php foreach ($countries as $country) {?>
                <option
                <?php if ($city['country_code'] == $country['code']) {echo 'selected';}?>
                 value="<?php echo $country['code']; ?>"><?php echo $country['code']; ?></option>
            <?php }?>
        </select>
    <input type="hidden" name="id" value="<?php echo $city['id']; ?>">
    <input type="submit" value="Redaguoti">

</form>
</div>
</body>
</html>
