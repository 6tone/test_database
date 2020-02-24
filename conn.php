<?php
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'cinf';
  
  
  $conn =  new mysqli($servername, $username, $password,$dbname);
  //$conn = mysql_connect("localhost","root","");
  $conn->query('SET NAMES UTF8');
  if($conn->connect_error) {
      die("connection failed: " . $conn->connect_error);
  }

?>