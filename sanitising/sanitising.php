<?php

echo "<h1>Sanitised variables: </h1>";
/* Start code by Hjalmar Snoep */
if(isset($_REQUEST["email"]))
{
	$email = filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
	$email=substr($email,0,50);// no longer than 50.
	echo "EMAIL: '".$email."'<br>"; 
}else
{
	echo "EMAIL: '' (not set)<br>";
}
/* End of code by Hjalmar Snoep */

/* Start code by Stef van Egmond */

$gender = filter_var ( $_REQUEST["gender"], FILTER_SANITIZE_STRING);;
echo "Gender: " . $gender;
//Did you assume my gender?

/* End of code by Stef van Egmond */

/*...
	Jouw code toevoegen, zoals hierboven, a.u.b..
*/

/* Code by Mark van Dooremaal */
if (isset($_POST['submit'])) {
  $range = filter_var($_POST["range"], FILTER_SANITIZE_NUMBER_INT);
  echo $range;
}
/* End Code by Mark van Dooremaal */

echo "<a href='form.html'>back</a>";

?>
