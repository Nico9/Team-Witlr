<?php

header("Content-Disposition: application/json");

$dsn = 'mysql:host=localhost;dbname=cardiff_hack';
$username = 'cardiff_hack';
$password = 'Zm6YPwApdfnNcGbs';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$conn = new PDO($dsn, $username, $password, $options);
define(CONN,$conn);

function get_messages($conn,$from,$to,$since) {
  $q = $conn->prepare("SELECT * FROM messages WHERE `from_user` = ? AND `to_user` = ? AND `created_at` > ?");
  $q->execute(array((int)$from,(int)$to,date("Y-m-d H:i:s",strtotime($since))));

  $result = $q->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

function get_user_by_id($id) {
  $conn = new PDO($GLOBALS["dsn"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["options"]);
  $q = $conn->prepare("SELECT * FROM `users` where id = ?");
  $q->execute(array($id));

  $result = $q->fetchAll(PDO::FETCH_ASSOC);

  return $result[0];
}

function get_user_by_name($name) {
  $conn = new PDO($GLOBALS["dsn"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["options"]);
  $q = $conn->prepare("SELECT * FROM `users` where `name` = ?");
  $q->execute(array($name));

  $result = $q->fetchAll(PDO::FETCH_ASSOC);

  return $result[0];
}

function get_timeline($from,$to,$since) {
  $conn = new PDO($GLOBALS["dsn"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["options"]);
  $us = implode(",", array($from,$to));
  $q = $conn->prepare("SELECT * FROM messages WHERE `from_user` IN ($us) AND `to_user` IN ($us) AND `created_at` > ?");
  $q->execute(array(date("Y-m-d H:i:s",strtotime($since))));
  $result = $q->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function save_message($conn,$from,$to,$subject,$message) {
  $q = $conn->prepare("INSERT INTO messages (`from_user`,`to_user`,`subject`,`message`,`created_at`) VALUES(?,?,?,?,?)");
  $q->execute(array($from,$to,"",$message,date("Y-m-d H:i:s")));

  return array("status"=>"ok");
}


switch($_GET["action"]) {
  case "get":
    $from  = $_GET["from"];
    $to    = $_GET["to"];
    $since = $_GET["since"];

    $result = json_encode(get_messages($conn,$from,$to,$since));
    break;
  case "put":
    $from  = $_GET["from"];
    $to    = $_GET["to"];
    $subject = $_GET["subject"];
    $message = $_GET["message"];

    $result = json_encode(save_message($conn,$from,$to,$subject,$message));
    break;
  case "userIdToUsername":
    $result = json_encode(user_id_to_username($_GET["user_id"]));
    break;
  case "gettimeline":
    $from  = (int)$_GET["from"];
    $to    = (int)$_GET["to"];
    $since = (int)$_GET["since"];
    $result = json_encode(get_timeline($from,$to,$since));
    break;
}

$conn = null;

echo $result;


?>

