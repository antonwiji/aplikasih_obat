<?php
   function sendsms($notujuan,$pesan){
 
    $idmesin = "601";
    $pin = "1234";

    $pesan = str_replace(" ", "%20", $pesan);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$notujuan&text=$pesan");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);

    curl_close($ch);

    return $output;

}
