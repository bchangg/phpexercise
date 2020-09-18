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

  function constructPage($data) {
    $contents = '';

    foreach ($data as $entry) {
      $contents .= <<<HTML
      <tr>
        <td>{$entry->userId}</td>
        <td>{$entry->id}</td>
        <td>{$entry->title}</td>
        <td>{$entry->body}</td>
      </tr>
      HTML;
    }

    return <<<HTML
      <!DOCTYPE html>
        <html lang="en" dir="ltr">
          <head>
            <meta charset="utf-8">
            <title></title>
          </head>
          <body>
            <table>
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Body</th>
                </tr>
              </thead>
              <tbody>
                {$contents}
              </tbody>
            </table>
          </body>
        </html>
    HTML;
  }
?>
