<?php

declare(strict_types=1);

require_once './PersonData.php';
require_once './RegistryStorage.php';

$registry = new RegistryStorage();

if (isset($_POST['name'], $_POST['surname'], $_POST['id'], $_POST['address'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $id = $_POST['id'];
    $address = $_POST['address'];

    $data = new PersonData($name, $surname, (int)$id, $address);
    $arrayData = $data->toArray();
    $registry->saveToFile($arrayData);
}

if (isset($_POST['searchid'])) {
    $id = $_POST['searchid'];

    $personResult = $registry->getById($id);

    if ($personResult !== null) {
        echo '
<table>
<thead>
  <tr>
    <td>Name:</td>
    <td><b>' . $personResult->getName() . '</b></td>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Surname</td>
    <td><b>' . $personResult->getSurname() . '</b></td>
  </tr>
  <tr>
    <td>Id</td>
    <td><b>' . $personResult->getId() . '</b></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><b>' . $personResult->getAddress() . '</b></td>
  </tr>
</tbody>
</table>
<hr>
';
    } else {
        echo 'A person with that id has not been found';
    }
}
?>

<html>
<body>
<form action="/" method="post">
    <label for="person">Name</label>
    <input type="text" id="person" name="name"/>
    <br><br>

    <label for="person">Surname</label>
    <input type="text" id="person" name="surname"/>
    <br><br>

    <label for="person">Person id</label>
    <input type="text" id="person" name="id"/>
    <br><br>

    <label for="person">Address</label>
    <input type="text" id="person" name="address"/>
    <br><br>

    <button type="Submit">
        Submit
    </button>
    <br>
    <hr>
</form>
<form action="/" method="post">
    <label for="search">Person id</label>
    <input type="text" id="search" name="searchid"/>
    <button type="Submit">
        Search
    </button>
</form>
</body>
</html>
