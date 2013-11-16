<?php

header("Content-Disposition: application/json");

$dsn = 'mysql:host=localhost;dbname=cardiff_hack';
$username = 'cardiff_hack';
$password = 'Zm6YPwApdfnNcGbs';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$conn = new PDO($dsn, $username, $password, $options);

function get_messages($conn,$from,$to,$since) {
  $q = $conn->prepare("SELECT * FROM messages WHERE `from_user` = ? AND `to_user` = ? AND `created_at` > ?");
  $q->execute(array((int)$from,(int)$to,date("Y-m-d H:i:s",strtotime($since))));
  //print_r(date("Y-m-d H:i:s",strtotime($since))); die();

  $result = $q->fetchAll(PDO::FETCH_ASSOC);

  return json_encode($result);
}

function save_message($conn,$from,$to,$subject,$message) {
  $q = $conn->prepare("INSERT INTO messages (`from_user`,`to_user`,`subject`,`message`,`created_at`) VALUES(?,?,?,?,?)");
  $q->execute(array($from,$to,"",$message,date("Y-m-d H:i:s")));

  return json_encode(array("status"=>"ok"));
}

switch($_GET["action"]) {
  case "get":
    $from  = $_GET["from"];
    $to    = $_GET["to"];
    $since = $_GET["since"];

    $result = get_messages($conn,$from,$to,$since);
    break;
  case "put":
    $from  = $_GET["from"];
    $to    = $_GET["to"];
    $subject = $_GET["subject"];
    $message = $_GET["message"];

    $result = save_message($conn,$from,$to,$subject,$message);
}

$conn = null;

echo $result;


?>

