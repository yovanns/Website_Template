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


    $upit = "SELECT * FROM zaposleni ORDER BY id DESC";

    $rs = mysqli_query($conn, $upit);

    $korisnici = array();

    while ( $row = mysqli_fetch_assoc($rs)){
        $korisnici[] = $row;
    }

    mysqli_close($conn);
?>

<table border="1">
    <thead>
    <tr>
        <th>Ime</th>
        <th>Prezime</th>
        <th>E-mail adresa</th>
        <th>Pol</th>
        <th>Grad</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ( $korisnici as $k ){
            echo "<tr><td>" . $k['ime'] . "</td><td>" . $k['prezime'] . "</td><td>" . $k['email'] . "</td><td>" . $k['pol'] . "</td><td>" . $k['grad'] . "</td></tr>";
        }
    ?>
    </tbody>
</table>