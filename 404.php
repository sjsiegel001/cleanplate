<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Page not found · The Kennedy Forum</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <style type="text/css" media="screen">

    body {
      background: #fff;
      color: #777;
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
      font-weight: 400;
      line-height: 1.61;
      margin: 0;
      padding: 0;
      text-align: center;
      text-rendering: optimizeLegibility;
    }

    .container {
      margin: 4em auto;
      max-width: 40em;
      width: 90%;
    }

    h1 {
      color: #000;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      font-size: 2em;
      font-weight: 100;
      letter-spacing: 0;
      line-height: 1.1;
      margin: 0 auto;
      text-shadow: 0 1px 0 #fff;
    }
    @media(min-width: 40em) {
      h1 {
        font-size: 3em;
      }
    }

    p {
      margin: 2em 0;
    }

    a:link,
    a:visited,
    a:hover,
    a:active {
      border-bottom: 1px solid #000;
      color: #000;
      text-decoration: none;
    }

    a:hover,
    a:active {
      border-bottom: 1px solid #777;
      color: #777;
    }

    .technical {
      border-top: 0.5em solid #EAEAEA;
      color: #000;
      display: inline-block;
      font-family: "Menlo", "Consolas", monospace;
      font-size: 0.8em;
      padding: 0.2em 0 0;
    }

  </style>
</head>
<body>

  <div class="container">

    <h1>Page not found</h1>

    <p>
      Sorry, the page you were looking for doesn’t exist.
      Go back to the <a href="<?= get_site_url(); ?>">Kennedy&nbsp;Forum&nbsp;homepage</a>
      or <a href="<?= get_site_url(); ?>/about#contact">contact&nbsp;us</a>
      if you think this is something we need to look into.
    </p>

    <span class="technical">HTTP/1.1 404 Not Found</span>

  </div>

</body>
</html>
