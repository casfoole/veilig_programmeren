<?php

echo "<h1>Sanitised variables: </h1>";
/* Start code by Hjalmar Snoep */
// references:
// https://stackoverflow.com/questions/386294/what-is-the-maximum-length-of-a-valid-email-address
if(isset($_REQUEST["email"]))
{
	$email = filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
	$email=substr($email,0,254);// no longer than 254 characters.
	echo "EMAIL: '".$email."'<br>"; 
}else
{
	echo "EMAIL: '' (not set)<br>";
}
/* End of code by Hjalmar Snoep */




/*...
	Jouw code toevoegen, zoals hierboven, a.u.b..
	
	Start leerling-code 
*/


/* Start code by Maarten Kampmeijer */
// let op passwords zijn een uitzondering
// ze hoeven niet sanitised te worden
// ze worden gehashed en NOOIT in originele vorm opgeslagen.
if(isset($_REQUEST["password"]))
{
	//$password = mysqli_real_escape_string($dbc,trim($_POST['password']));
	$hashed_password = password_hash(PASSWORD_DEFAULT ,$password); // levert 255 characters op!
	echo "Password_hashed: '".$password."'<br>";
}else {
	echo "Password_hashed: ''(not set)<br>";
/* End of code by Maarten Kampmeijer */

/* Start code by Stef van Egmond */
	// ik mis de isset constructie, dit breekt potentieel de code.
$gender = filter_var ( $_REQUEST["gender"], FILTER_SANITIZE_STRING);;
echo "Gender: " . $gender;
//Did you assume my gender?
// LEUKE grap, nu serieus: er zijn drie mogelijkheden, dus FILTER_SANITIZE_STRING is een beetje ruim.
// ook heb je niet beperkt in ruimte..
/* End of code by Stef van Egmond */




/* Code by Mark van Dooremaal */
if (isset($_POST['submit'])) {
  if ($_POST['range'] > 1 && $_POST['range'] < 10 ) {
    $range = preg_replace('/[^0-9.]*/','',filter_var($_POST['range'], FILTER_SANITIZE_NUMBER_INT));
  } else {
    echo "number is not between 1-10";
  }
  echo $range;
}
/* End Code by Mark van Dooremaal */










/* Start code by Dani de Jong*/
if(isset($_POST['time'])) {
	$time = $_POST['time'];
	if (preg_match("/^(2[0-3]|[01]?[0-9]):[0-5][0-9]$/", $time)) {
		echo $time;
	}
}
/* End Code by Dani de Jong*/










/*Start code by Justin van der Kruit */
if(isset($_REQUEST["datum"])) {
    $date = $_REQUEST["date"];

    list($y, $m, $d) = explode('-', $date);

    if (checkdate($m, $d, $y)) {
        echo "Datum: '".$date."'<br>";
    } else {
        echo "Niet geldige datum";
    }
} else {
    echo "Datum: '' (niet ingevuld)<br>";
}
/*End code by Justin van der Kruit */

/*Start code by Rico Schwab */
if(isset($_REQUEST["search"])){
	//DBC mist.
	$search = $_POST["search"];
	$search = trim($search);
	$search = mysqli_real_escape_string(null, $search);
	$search = strip_tags($search);
	$search = "%$search%";
	
	$query = "SELECT * FROM tablename WHERE rowname = '$search'";
	$result = mysqli_query(null, $query);
}
/* Eend code by Rico Schwab */
	
	
/* Start code by Simon Boerrigter  */
if(isset($_REQUEST["date"]))
{
	$date = $_REQUEST["date"];
	$dateCheck = $_REQUEST["date"];
	$dateCheck = date_parse($dateCheck); // or date_parse_from_format("d/m/Y", $date);
	if (checkdate($dateCheck['month'], $dateCheck['day'], $dateCheck['year'])) {
		echo "Date: '".$date."'<br>";
	} else {
		echo "Invalid date";
	}
} else {
	echo "Date: '' (not set)<br>";
}
// MISSING: beperking qua aantal characters, toevoegen VOOR date_parse.
// verder: nice!
/* End of code by Simon Boerrigter */

  /* Start code by Peter Boersma */
if(isset($_REQUEST["btcnAddress"]))
{
	$btcn = $_REQUEST["btcnAddress"];
if($btcn = preg_match('!?/.>,<:;"{}[]\|=+-_)(#$%^&*', $btcn,0)){
	$btcn = substr($btcn,0,36);// no longer than 36 characters.
	echo "Bitcoin Address: '".$btcn."'<br>"; 
}else{
	echo "Invalid"
}
}else{
	echo "Bitcoin Address: '' (Invalid)<br>";
}
	
/* End of code by Peter Boersma */

/* Start code by Jesse Izeboud  */
if(isset($_REQUEST["animals"])) {
	$options = array("Giraffe","Deer","Pig");
	$animal = $_POST["animals"]);
	$search = array('@<script[^>]*?>.*?</script>@si','@<[\/\!]*?[^<>]*?>@si','@<style[^>]*?>.*?</style>@siU','@<![\s\S]*?--[ \t\n\r]*>@');
        $animal = preg_replace($search, '', $animal);
	if (in_array($animal, $people)) {
		echo $animal;
	} else {
		echo "Invalid Animal";
	}
}
/* End of code by Jesse Izeboud */


/* End of leerling code. */

echo "<a href='form.html'>back</a>";

?>
