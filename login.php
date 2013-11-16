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
    <div class="row login"><form method="get" action="dashboard.php">
      <div class="large-12 columns clear">
        <label>Login to Witlr Messages</label>
      </div>
      <div class="large-12 columns clear">  
        <input name="username" type="text" placeholder="Enter your username ">
      </div>
      <div class="large-12 columns clear">  
        <button type="submit" class="button">Login</button>
      </div></form>
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