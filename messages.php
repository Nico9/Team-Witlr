<?php
require("api.php");

$timeline = get_timeline(1,2,0);

$sender    = get_user_by_name($_GET["username"]);
$recipient = get_user_by_name($_GET["contact"]);

function get_bubble_id($user_id) {
  if((int)$user_id==$sender["id"]) {
    return "";
  } else {
    return "2";
  }
}

function get_gravatar($email) {
  $u1_grav = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=80";
  return $u1_grav;
}

if(isset($_POST["message"])) {
  $from_user_id = $sender["id"];
  $recipient_user_id = $recipient["id"];
  save_message($from_user_id,$recipient_user_id,"",$_POST["message"]);
  header("Location: messages.php?username=" . $_POST["from_user"] . "&contact=" . $_POST["to_user"]);
  die();
}

?>
<!doctype html>

<html lang="en-gb">

<head>
  <meta charset="utf-8">
  <title>@output("title") - Witlr messaging system</title>
  <link rel="stylesheet" href="/static/css/fooundation.css" media="all">
  <link rel="stylesheet" href="/static/css/system.css" media="all">
</head>

<body class="page" itemscope itemtype="http://schema.org/WebPage">
  <header>
          <a title="Witlr Graduate Jobs" href="login.php">
            <img src="/static/img/witlr-logo.png" width="140" alt="Witlr - Jobs for Graduates and Students">
          </a>
  </header>
  <article class="background">
    <div class="clearfix"></div>
    <div class="row">
      <div class="contacts large-8 large-centered columns">
        <h1>Messages between <?php echo $_GET["username"]; ?> and <?php echo $_GET["contact"]; ?></h1>
        <?php foreach($timeline as $msg) { ?>
          <?php if($sender["id"] == $msg["to_user"]) { ?>
        <div class="row">
            <div class="large-1 columns">&nbsp;</div>
            <div class="large-2 columns">
              <img src="<?php echo get_gravatar($recipient["email"]);?>" class="pic" width="80">
            </div>
            <div class= "large-8 columns">
             <p class="bubble"><?php echo $msg["message"]; ?></p>
            </div>
            <div class="large-1 columns">&nbsp;</div>
        </div>
          <?php } else { ?>
        <div class="row">
            <div class="large-1 columns">&nbsp;</div>
            <div class= "large-8 columns">
             <p class="bubble2"><?php echo $msg["message"]; ?></p>
            </div>
            <div class="large-2 columns">
              <img src="<?php echo get_gravatar($sender["email"]);?>" class="pic" width="80">
            </div>

            <div class="large-1 columns">&nbsp;</div>
        </div>
        <?php  } ?>
        <?php } ?>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="contacts large-8 large-centered columns">
        <h1>Write your message to <?php echo $_GET["contact"]; ?></h1>
        <form method="post">
          <div class="row">
              <div class= "large-centered large-8 columns">
                <textarea class="mbox" name="message" type="text" placeholder="Enter your message"></textarea>
                <input type="hidden" name="from_user" value="<?php echo $_GET["username"]; ?>" />
                <input type="hidden" name="to_user" value="<?php echo $_GET["contact"]; ?>" />
              </div>
          </div>
          <div class="row">
              <div class= "large-centered large-8 columns">
                <button type="submit" class="add-contact-button">Send message</button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </article>
  <footer class="mainfooter">
    <div class="row" itemscope itemtype="http://schema.org/Organization">
      <div class="large-6 columns">
        <p>&copy; <span itemprop="foundingDate">2012</span>- 2013 <span itemprop="legalName">Witlr Limited</span>. All rights reserved.<br />Company Number 08232956</p>
      </div>
      <div class="large-6 columns">
        <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="address">
          <span itemprop="streetAddress">Landmark House, Wirral Park Road</span>, <span itemprop="addressLocality">Glastonbury</span>, <span itemprop="postalCode">BA6 9FR</span>, <span itemprop="addressCountry">UK</span><br />
          <!-- v{{Config::get("application.version")}} -->
        </p>
      </div>
    </div>
  </footer>

</body>
</html>
