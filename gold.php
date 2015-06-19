<?php

$data = file_get_contents('http://www.kitco.com/texten/texten.html');
preg_match_all('/([A-Z]{3,5}\s+[0-9]{1,2},[0-9]{4}\s+([0-9.NA]{2,10}\s+){1,7})/si',$data,$result);


$records = array();
foreach($result[1] as $date) {
    $temp = preg_split('/\s+/',$date);
    $index = array_shift($temp);
    $index.= array_shift($temp);
    $records[$index] = $temp;

    $message .= "\n". $index ."  GOLD: ". $records[$index][0] . " ~ ".$records[$index][1]."   Silver: ". round($records[$index][2],2);
    

}




ini_set("SMTP", "mail.json.x10host.com ");
    ini_set("sendmail_from", "bitcoin@json.x10host.com");

    $hoy = date("H:i:s"); 

    $headers = "";

    $message = "London Fix. US Dollar per ounce.\n" . $message ;

    echo $message;

    mail("manofthevara@gmail.com", $hoy, $message, $headers);
    
    echo $hoy;

?>
