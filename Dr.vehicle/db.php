<?php
if (session_id() == "")
  session_start();
$db = mysqli_connect('localhost', 'root', '', 'evotingdb');
?>