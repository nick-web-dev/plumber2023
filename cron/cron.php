
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://calltheplumber.com/website/expired_plumber_email");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);

?>