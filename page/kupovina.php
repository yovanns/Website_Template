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

    
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $databaseName = 'user_db';

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
    $query = "SELECT `movie` FROM `movies`";

    $result1 = mysqli_query($connect, $query);



?>
<?php 
    

    // $kveri = "SELECT * FROM `kupljenekarte`";
    if(isset($_POST['submit'])){
        $datum = $_POST['datum'];
        $film = $_POST['film'];
        $termin = $_POST['termin'];
        $broj_karata = $_POST['broj_karata'];
        $cijena = $_POST['cijena'];
        $ukupnacijena = floatval($cijena) * floatval($broj_karata); 
        $user_id = $_SESSION["id"];
        

        $kveri = "INSERT INTO kupljenekarte VALUES('', '$datum', '$film', '$termin', '$broj_karata', '$cijena' , '$ukupnacijena', '$user_id')";
        mysqli_query($conn,$kveri);
    }
    

?>
<h4 class="text-light text-center mt-5"> Hello
    <?php echo $row["name"]?>, please choose the movie that you would like to watch from the list below:</h4>

<body>
    <section class="pt-5 pb-5 text-center kupovina-sekcija text-white">
        <form name="kupovina_karata" class="" action="" method="post" autocomplete="off">
            <p id="cijena"></p>
            <label for="ime">Vaš username:</label>
            <input type="text" id="username" name="username" value="<?php echo $row["username"]?>" readonly><br>
            <label for="datumgl">Izaberite datum gledanja filma</label>
            <input type="date" id="datum" name="datum" value="2022-12-23" min="2022-12-23" max="2023-01-23"> <br>
            <label for="film">Izaberite film:</label>
            <select name="film" id="film">
                <?php while($row1 = mysqli_fetch_array($result1)):; ?>
                <option value="<?php echo $row1[0]; ?>">
                    <?php echo $row1[0]; ?>
                </option>
                <?php endwhile; ?>
            </select><br>
            <label for="termin">Izaberite termin gledanja:</label>
            <select name="termin" id="termin">
                <option value="12:00">12:00</option>
                <option value="16:00">16:00</option>
                <option value="20:00">20:00</option>
            </select><br>
            <label for="cijena">Cijena karte:</label>
            <input type="text" id="cijena" name="cijena" value="2.4" readonly><br>
            <label for="karte">Broj karata:</label>
            <input type="number" id="karte" name="broj_karata" step="1" value="1" required>
            <br>
            <button class="mt-5 btn btn-light mt-5" type="submit" name="submit" onClick="Izracunaj()">Kupiti</button>
        </form>
        <p class="mt-5 text-muted">Podatke of Vašoj kupovini možete naći na <a class="moj-profil-a" href="moj_profil.php">Moj profil</a></p>
    </section>
    <script>
    function Izracunaj() {
        let m = 2.4;
        let k = document.kupovina_karata.karte.value * m;
        let ka = k.toFixed(2);
        alert("Ukupna cijena vaše kupovine je " + ka + "€");
        // alert
    };
    </script>
    <?php
include_once 'footer.php'; 


?>
    <!-- // $connY = mysqli_connect('localhost', 'root', '', 'movies_list');

   // if(!$connY){
    //    echo 'Connection error: ' . mysqli_connect_error();
    //}

        
    //$sql = 'SELECT naziv_filma, broj_karata, cijena, id FROM movies';

    //$results = mysqli_query($connY, $sql);

    //$movies = mysqli_fetch_all($results, MYSQLI_ASSOC);


    //free
    //mysqli_free_result($results);

    //close connection 
    //mysqli_close($conn);

    // print_r($movies); -->