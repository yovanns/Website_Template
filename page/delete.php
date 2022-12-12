<html>
<head>
    <title>Brisanje zaposlenog</title>
</head>
<body>
<?php
    define("SERVER", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "web2020");

    $conn = mysqli_connect(SERVER, USERNAME, PASSWORD) or die("Nije moguće konektovati se na server baze podataka!");
    mysqli_select_db($conn, DATABASE) or die("Nije moguće odabrati bazu podataka. Da li je kreirana?");

    if (isset($_POST['delete'])) {
        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            die("Nevalidan ID zaposlenog!");
        }

        $id = $_POST['id'];
        $upit = "DELETE FROM employee WHERE id = $id";

        mysqli_query($conn, $upit) or die("Greška prilikom brisanja zaposlenog!");
        mysqli_close($conn);

        echo "Uspješno ste obrisali zaposlenog.";
        exit;
    }
    else if (isset($_POST['odustajem'])) {
        die("Uspješno ste poništili brisanje.");
    }

    if (!isset($_GET['id'])) {
        die("Odaberite validan ID zaposlenog!");
    }

    $idZaposlenog = $_GET['id'];

?>
<div>Da li ste sigurni da želite da obrišete zaposlenog #<?php echo $idZaposlenog; ?></div>
<form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $idZaposlenog; ?>"/>
    <button type="submit" name="delete">Da</button>
    <button type="submit" name="odustajem">Ne</button>
</form>
</body>
</html>