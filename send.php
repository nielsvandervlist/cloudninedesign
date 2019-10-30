<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "niels.vder.vlist@gmail.com";
    $email_subject = "Cloud Nine";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="jquery/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <title>Cloud Nine Design - Contact</title>
  <meta charset="utf-8">
  <meta name="description" content="Cloud Nine Design contact contactgegevens Get in touch Helpen verder formulier"/>
  <meta name="keywords" content="grafisch, ontwerp, webdesign, wordpress, logo, huisstijl, contact"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Alegreya|Pacifico|Patua+One|Source+Sans+Pro" rel="stylesheet">
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64169856-2', 'auto');
  ga('send', 'pageview');
  ga('set', 'userId', {{USER_ID}}); // De gebruikers-ID instellen op basis van de ingelogde user_id.
</script>
</head>
<body>

<!--HEADER-->
<header id="vheader" class="container-fluid ">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 logo"><a href="index.html"><img height="100px" src="images/logo-small.png"/></a></div>
        <nav class="col-md-9 col-sm-9 col-xs-9">
          <ul>
            <a href="index.html"><li>Home</li></a>
            <a href="work.html"><li>Work</li></a>
            <a href="about.html"><li>About</li></a>
            <a href="contact.html"><li class="active1">Contact</li></a>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>

<section class="container-fluid blok">
    <div class="row">
      <div class="about-text col-md-12 about-pic">
        <h2>Bedankt voor het verzenden!<br/> We nemen zo spoedig mogelijk contact op.</h2>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 about-blok">
        </div>
        <div class="wolkje"></div>
    </div>

    <div class="row contact-blok">
      <div class="col-md-6 col-md-offset-1 formulier">
        <h3>CONTACTFORMULIER</h3>
        <form id="contact_form" action="send.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <label for="name"></label><br />
            <input id="name" placeholder="Uw Naam*" class="input" name="name" type="text" value="" size="30" /><br />
          </div>
          <div class="row">
            <label for="email"></label><br />
            <input id="email" placeholder="Uw email*" class="input" name="email" type="text" value="" size="30" /><br />
          </div>
          <div class="row">
            <label for="message"></label><br />
            <textarea id="message" placeholder="Schrijf hier uw bericht*" class="input" name="message" rows="7" cols="30"></textarea><br />
          </div>
          <div class="row">
            <input id="submit_button" type="submit" value="VERZENDEN" />
          </div>
        </form>
      </div>
      <div class="col-md-4 contactgegevens">
        <h3>CONTACTGEGEVENS</h3>
        <br/>
        <p>Niels van der Vlist
          <br/>
          Deltaweg 1346
          <br/>
          2321KX LEIDEN
          <br/>
          Nederland
          <br/>
          <br/>
          (06) 81366671
          <br/>
          niels.vder.vlist@gmail.com
        </p>
      </div>
    </div>
</section>

<footer class="container-fluid">
  <div class="row">
    <div class="col-md-11 col-md-offset-1 footer">
      <div class="row">
        <div class="col-md-2 col-xs-12 logo-footer">
          <img alt="logo-footer" src="images/logo-stempel.png">
        </div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-12 social">
              <div class="wolkje-home wolkje"></div>
              <div class="row">
                <div class="col-md-11">
                  <a href="https://www.linkedin.com/in/niels-van-der-vlist-89204184/"><img width="30" alt="linkedin" src="images/linkedin.png"></a>
                  <a href="https://www.instagram.com/cloud.nine.design/"><img width="30" alt="instagram" src="images/insta.png"></a>
                  <a href="https://www.facebook.com/Cloud-Nine-2003927219835296/"><img width="30" alt="facebook" src="images/fb.png"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
 
<?php
 
}
?>