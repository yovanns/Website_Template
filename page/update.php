<html>
<head>
    <title>Update a Record in MySQL Database</title>
</head>
<body>


<?php
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "web2020");

$conn = mysqli_connect(SERVER, USERNAME, PASSWORD) or die("Nije moguće konektovati se na server baze podataka!");
mysqli_select_db($conn, DATABASE) or die("Nije moguće odabrati bazu podataka. Da li je kreirana?");

    $greska = null;										
    if (isset($_POST['update'])) {

        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {		
            $greska = "Unijeli ste nevalidan ID za azuriranje";
        }
        else if (!isset($_POST['emp_salary']) || !is_numeric($_POST['emp_salary'])) {
            $greska = "Unijeli ste nevalidnu platu.";
        }
        else if (!isset($_POST['emp_insurance']) || !is_numeric($_POST['emp_insurance'])) {
            $greska = "Odabrali ste nevalidnu opciju za osiguranje.";
        }

        if ($greska === null) {								
            $id = $_POST['id'];						
            $emp_salary = $_POST['emp_salary'];
            $emp_insurance = $_POST['emp_insurance'];

            $sql = "UPDATE employee SET emp_salary = $emp_salary, emp_insurance = $emp_insurance WHERE id = $id";
            $rezultat = mysqli_query($conn, $sql);


            if (!$rezultat) {									
                die('Nastala je greška: ' . mysqli_error($conn));		
            }
            mysqli_close($conn);

            echo "Uspješno ste ažurirali platu zaposlenog.";
            exit;
        }
    }

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {			
        die("Unijeli ste nevalidan ID");							
    }
    $trazeniId = $_GET['id'];										

    $upit = "SELECT * FROM employee WHERE id = $trazeniId";		

    $rs = mysqli_query($conn, $upit);

    $zaposleni = mysqli_fetch_assoc($rs);							
?>
<?php
    if ($greska !== null) { 
        echo "<div>" . $greska . "</div>"; 
    }
?>
<form method="post" action="update.php">
    <table width="400" border="0" cellspacing="1" cellpadding="2">
        <tr>
            <td width="100">ID</td>
            <td><input name="id" type="text" id="id" value="<?php echo $zaposleni['id'] ?>"></td>
        </tr>
        <tr>
            <td width="100">Plata</td>
            <td><input name="emp_salary" type="text" id="emp_salary" value="<?php echo $zaposleni['emp_salary'] ?>">
            </td>
        </tr>
        <tr>
            <td width="100">Osiguranik</td>
            <td>
                <label><input type="radio" name="emp_insurance" id="emp_insurance_yes"
                              value="1" <?php echo($zaposleni['emp_insurance'] == '1' ? 'checked="checked"' : "") ?>/>Da</label>
                <label><input type="radio" name="emp_insurance" id="emp_insurance_no" value="0"
                        <?php echo($zaposleni['emp_insurance'] == '0' ? 'checked="checked"' : "") ?>/>Ne</label>
            </td>
        </tr>
        <tr>
            <td width="100"></td>
            <td></td>
        </tr>
        <tr>
            <td width="100"></td>
            <td>
                <button name="update" type="submit" id="update">Update</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>