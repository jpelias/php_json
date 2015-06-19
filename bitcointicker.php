<?php

    # phpinfo(); 
    
$url="https://btc-e.com/api/3/ticker/btc_eur";
     
    $json = file_get_contents($url);
    $data = json_decode($json);
    $vol = round($data->btc_eur->vol,0);
    $last = round($data->btc_eur->last,2); 
    $_btce = "BTC-e: € ".$last." (".$vol.")\n" ;

$url="https://api.bitfinex.com/v1/pubticker/btcusd";
     
    $json = file_get_contents($url);
    $data = json_decode($json);
    $vol = round($data->volume,0);
    $last = round($data->last_price,2);
    $_bitfix = "Bitfnx: $ ".$last." (".$vol.")\n" ;

$url="https://api.kraken.com/0/public/Ticker?pair=XXBTZEUR";
     
    $json = file_get_contents($url);
    $data = json_decode($json);
    $vol = round($data->result->XXBTZEUR->v[0],0);
    $last = round($data->result->XXBTZEUR->c[0],2);
    $_kraken = "Kraken: € ".$last." (".$vol.")\n" ;   

$url="https://data.btcchina.com/data/ticker?market=btccny";
     
    $json = file_get_contents($url);
    $data = json_decode($json);
    $vol = round($data->ticker->vol,0);
    $last = round($data->ticker->last,2);
    $_btchina = "BTChina: ¥ ".$last." (".$vol.")\n" ; 

$url="https://localbitcoins.com/bitcoinaverage/ticker-all-currencies/";
     
    $json = file_get_contents($url);
    $data = json_decode($json);
    #var_dump(json_decode($json));
    #$vol = round($data->EUR->volume_btc,0);
    $last = round($data->EUR->rates->last,2);
    $last2 = round($data->USD->rates->last,2);
    $_localbit = "Local: € ".$last." $ ".$last2."\n" ; 

$url="https://www.okcoin.com/api/ticker.do?ok=1";
     
    $json = file_get_contents($url);
    $data = json_decode($json);
    #var_dump(json_decode($json));
    $vol = round($data->ticker->vol,0);
    $last = round($data->ticker->last,2);
    
    $_okcoin = "OKcoin: € ". $last ." (".$vol.")\n" ; 
    





$message = $_bitfix . $_btce . $_kraken . $_btchina . $_localbit . $_okcoin;


echo $message;



ini_set("SMTP", "mail.smtpserver.com ");
    ini_set("sendmail_from", "sender@email.com");

    $hoy = date("H:i:s"); 

    $headers = "";


    mail("receiver@gmail.com", $hoy, $message, $headers);
    
    echo $hoy;




?>
