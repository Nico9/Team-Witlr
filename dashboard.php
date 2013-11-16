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
    <form class="row padding">
      <div class="large-4 columns ">
        <label class="text2">Add a new contact</label>
      </div> 
      <div class="large-4 columns"> 
        <input class="text" name="contact" type="text" placeholder="Enter a contact">
        <input name="username" type="hidden" value="<?php echo $_GET["username"]; ?>"> 
      </div>  
      <div class="large-4 columns">
        <button type="submit" class="add-contact-button">Add contact</button>
      </div>
    </form>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="contacts large-8 large-centered columns">
        <?php if(empty($_GET["contact"])){ ?>
          <h1 class="friends">You have no friends :(</h1>
        <?php }else{ ?>
        <h2><a href="messages.php?username=<?php echo $_GET["username"]; ?>&amp;contact=<?php echo $_GET["contact"]; ?>"><?php echo $_GET["contact"]; ?></a></h2>
        <?php } ?>
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