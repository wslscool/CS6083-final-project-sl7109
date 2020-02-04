<?php

$formattedAddr = "13353 Washington Blvd, Los Angeles, CA 90066, United States";

$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key=AIzaSyC6PqA7MVuR1hYpfm-iFfFzcp1tzkC6-sc');

var_dump($geocodeFromAddr);
?>