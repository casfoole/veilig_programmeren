<?php

$date=date(time(),"Y-m-d"); // 2017-09-01 = 1 september 2017, datum is achteruit, zodat windows hem netjes sorteert.
$logname="stats/".$date.".txt";

$event="pageload";
$data="index.html"
$ip=$_SERVER[REMOTE_ADRESS]; 

$time=date(time(),"H:i:s"); // uur 0-24, minuten met voorloop 0 , seconden met voorloop 0 
// regel die de gebeurtenis beschrijft.
$log=$ip."|".$time."|".$event."|".$data.PHP_EOL; 
//PHP EOL = PHP end of line, dat teken kan per server verschillen

file_put_contents($logname, $log, FILE_APPEND);

// WAT TE DOEN..

// run dit script meerdere keren en in stats verschijnt een file met de juiste datum.
// zet nu je klok een dag vooruit (of heb gewoon HEEEEEL veel geduld) en run het opnieuw 
// Let op: time() gaat uit van de systeemtijd op de server.

// zorg dat er in de logs directory een .htaccess file staat met daarin "deny from all", anders kunnen mensen vanaf het internet erbij.

// dit is de basis, voor tips hoe je dit in je project verwerkt, kijk bij 2 en 3.

?>