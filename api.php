<?php

class Api{



     function showFilms(){
     
        $url = "https://swapi.dev/api/films/";

        $datos = getSsl($url);
        
        $datos = json_decode($datos);

        $rs = $datos->results;

        return $rs;
      }
}


function getSsl($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_REFERER, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

?>