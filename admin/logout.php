<?php
  session_start();
  include ("../include/functions.php");
  destroy_session();
  header( 'Location: login.php' );
?>