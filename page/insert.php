<?php
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "Firma");

$conn = mysqli_connect(SERVER, USERNAME, PASSWORD) or die("Nije moguće konektovati se na server baze podataka!");
mysqli_select_db($conn, DATABASE) or die("Nije moguće odabrati bazu podataka. Da li je kreirana?");

$greska = null;                                                 
if (isset($_POST['insert'])) {                                  
    if (!isset($_POST['ime']) || strlen($_POST['ime']) == 0) {  
        $greska = "Morate unijeti ime!";                        
    } else if (!isset($_POST['prezime']) || strlen($_POST['prezime']) == 0) {   
        $greska = "Morate unijeti prezime!";                                    
    } else if (!isset($_POST['plata']) || strlen($_POST['plata']) == 0) {       
        $greska = "Morate unijeti platu!";                               
    } else if (!isset($_POST['Osiguranje']) || strlen($_POST['Osiguranje']) == 0) {           
        $greska = "Morate unijeti osiguranje!";                                       
    } 

    if ($greska === null) {                                 
        $ime = $_POST['ime'];                               
        $prezime = $_POST['prezime'];						
        $plata = $_POST['plata'];
        $Osiguranje = $_POST['Osiguranje'];
       

        $upit = "INSERT INTO Employees (ime, prezime, plata, Osiguranje) "
            . "VALUES('$ime', '$prezime', '$plata', '$Osiguranje')";

        mysqli_query($conn, $upit) or die("Greška u upitu: " . mysqli_error($conn));

        echo "Uspješno ste dodali podatak u bazu podataka. ID podatka je: " . mysqli_insert_id($conn);
        exit;
    }
}
?>







<html>
<head>
    <title>Dodavanje podataka</title>
</head>
<body>           

<?php
if ($greska !== null) {                
    echo "<div>" . $greska . "</div>";                      
}
?>


<form action="insert.php" method="POST">
    <div>
        <label for="ime">Ime:</label>
        <input type="text" name="ime" id="ime"/>
    </div>
    <div>
        <label for="prezime">Prezime:</label>
        <input type="text" name="prezime" id="prezime"/>
    </div>
    <div>
        <label for="Plata">Plata Zaposlenog:</label>
        <input type="text" name="plata" id="plata"/>
    </div>
    <div>
        <label>Osiguranje:</label>
        <label><input type="radio" value="1" id="Osiguranje_da" name="Osiguranje">Da</label>
        <label><input type="radio" value="0" id="Osiguranje_ne" name="Osiguranje">Ne</label>
    </div>
    <div>
        <button type="submit" name="insert">Unesite podatke</button>
    </div>
</form>
</body>
</html>
