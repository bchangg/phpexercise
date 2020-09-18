<?php
  function callAPI($method, $url) {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $resultString = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($resultString);

    return $data;
  }
?>
