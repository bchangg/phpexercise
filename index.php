<?php
  include 'helpers.php';

  $data = callAPI("GET", "https://jsonplaceholder.typicode.com/posts");

  $resultHTML = constructPage($data);

  echo $resultHTML;
?>
