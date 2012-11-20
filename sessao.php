<?php

session_set_cookie_params(0);
session_start();

if ($_SESSION["AUTH"] == false) {
    header("location: index.php?r=login");
}
if (time() - $_SESSION['TIME'] > 1800) {
    session_destroy();
    session_unset();
}
/*
  if (!isset($_SESSION['TIME'])) {
  $_SESSION['TIME'] = time();
  } else if (time() - $_SESSION['TIME'] > 1800) {
  //sessao criada a mais de 30 minutos
  session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
  $_SESSION['TIME'] = time();// update creation time

  } */
?>
