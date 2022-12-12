<?php 
include_once 'header.php';


if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
 
    if(!empty($_SESSION["username"])){
    $ulogovani = $_SESSION["id"];    
    $resultss = mysqli_query($conn, "SELECT * FROM kupljenekarte WHERE user_id = '".$ulogovani."'");
    $rowss = mysqli_fetch_assoc($resultss);
}
else{
    echo "Ne postoji";
}
        

    $upit2 = "SELECT * FROM kupljenekarte WHERE user_id = '".$ulogovani."'";   

    $rs2 = mysqli_query($conn, $upit2);

    $korisnici2 = array();

    while ($row2 = mysqli_fetch_assoc($rs2)){
        $korisnici2[] = $row2;
    }

    mysqli_close($conn);
?>
<?php
    // define("SERVER", "localhost");
    // define("USERNAME", "root");
    // define("PASSWORD", "");
    // define("DATABASE", "web2020");

    // $conn2 = mysqli_connect(SERVER, USERNAME, PASSWORD) or die("Nije moguće konektovati se na server baze podataka!");
    // mysqli_select_db($conn2, DATABASE) or die("Nije moguće odabrati bazu podataka. Da li je kreirana?");


    // $upit = "SELECT * FROM zaposleni ORDER BY id DESC";

    // $rs = mysqli_query($conn2, $upit);

    // $korisnici = array();

    // while ( $row = mysqli_fetch_assoc($rs)){
    //     $korisnici[] = $row;
    // }

    // mysqli_close($conn2);

// -------------------------------

?>
<?php
//Update podataka



if(isset($_POST['update']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "user_db";
   
   $conn = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number
   $id = $_POST['id'];
   $datum = $_POST['datum'];
   $film = $_POST['film'];
   $termin = $_POST['termin'];
   $broj_karata = $_POST['broj_karata'];
   $cijena = $_POST['cijena'];
   $ukupnacijena = floatval($cijena) * floatval($broj_karata); 


           
   // Koristimo redirekciju kao reaload stranice, kako bi se rezultat update odmah prikazao bez koriscenja ajaxa 


   $query8 = "UPDATE kupljenekarte SET datum='".$datum."',film='".$film."',termin='".$termin."',broj_karata='".$broj_karata."',cijena='".$cijena."',`ukupnacijena`='".$ukupnacijena."' WHERE user_id = '".$ulogovani."' AND `id` = '".$id."'";
   
   $result = mysqli_query($conn, $query8);
   
   if($result)
   {
       header('Location: moj_profil.php');
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($conn);
}
   // Brisanje kupovine
   
   $hostname9 = "localhost";
   $username9 = "root";
   $password9 = "";
   $databaseName9 = "user_db"; 
   $conn9 = mysqli_connect($hostname9, $username9, $password9, $databaseName9);


   if(isset($_POST['delete'])){
   
    $id = $_POST['id'];


    $query9 = "DELETE FROM kupljenekarte WHERE id = '$id' AND user_id = '".$ulogovani."'"  ;
    $query9_run = mysqli_query($conn9,$query9);
    
    

    if(mysqli_affected_rows($conn9)==1){
       echo '<script type="text/javascript"> alert("Data Deleted")</script>';
       header('Location: moj_profil.php');
       }
    else
      {
       echo '<script type="text/javascript"> alert("Data Not Deleted")</script>';
       }
    

   }





 //select dropdown
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $databaseName = 'user_db';

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
    $query = "SELECT `movie` FROM `movies`";

    $result1 = mysqli_query($connect, $query);

    

?>


<div class="container">
    <div class="row">
        <div class="col-lg-6 text-light div-tabela">


            <h1 class="text-center second-section-h1 ">Moj profil</h1>
            <p class="text-center podaci-p text-light mt-2">Forma za izmjene u vašoj korpi</p>
            <!-- Forma za izmjenu podataka o kupovini-->
            <form action="moj_profil.php" method="post" class="text-center">
                <input placeholder="ID Vaše kupovine" type="text" name="id" value="" required><br>
                Datum: <input type="date" id="datum" name="datum" value="2022-12-23" min="2022-12-23" max="2023-01-23"> <br>
                Film: <select name="film" id="film">
                    <?php while($row1 = mysqli_fetch_array($result1)):; ?>
                    <option value="<?php echo $row1[0]; ?>">
                        <?php echo $row1[0]; ?>
                    </option>
                    <?php endwhile; ?>
                </select>
                Termin: <select name="termin" id="termin">
                    <option value="12:00">12:00</option>
                    <option value="16:00">16:00</option>
                    <option value="20:00">20:00</option>
                </select><br>
                Broj karata: <input type="number" id="karte" name="broj_karata" step="1" value="1" required><br>
                <label for="cijena">Cijena karte:</label>
                <input type="text" id="cijena" name="cijena" value="2.4" readonly><br>
                <input placeholder="Ukupna cijena" type="text" name="ukupnacijena" style="display:none" readonly><br><br>
                <input type="submit" name="update" value="Update Data">
            </form>

        </div>





        <div class="col-lg-6 text-center text-light mt-5 mb-5 my-auto">
            <p class="text-center podaci-p text-light mt-5">Podaci o prethodnoj kupovini</p>
            <table border="1" class="border-light rounded text-center text-light mt-4">
                <thead>
                    <tr>
                        <th>ID kupovine</th>
                        <th>Datum</th>
                        <th>Film</th>
                        <th>Termin</th>
                        <th>Broj karata</th>
                        <th>Cijena karte</th>
                        <th>Ukupna cijena</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        foreach ( $korisnici2 as $k2 ){
            echo "<tr><td>" . $k2['id'] . "</td><td>" . $k2['datum'] . "</td><td>" . $k2['film'] . "</td><td>" . $k2['termin'] . "</td><td>" . $k2['broj_karata'] . "</td><td>". $k2['cijena'] . "</td><td>" . $k2['ukupnacijena'] . "</td></tr>" ;
        }
    ?>
                </tbody>
            </table>
             <!-- Forma za brisanje kupovine -->
             <p class="text-center podaci-p text-light mt-5">Unesite ID kupovine koju želite obrisati:</p>
             <form action="" method="POST" >
                <input type="text" name="id" placeholder="ID"><br>
                 <input type="submit" name="delete" value="Delete Data">
            </form>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>