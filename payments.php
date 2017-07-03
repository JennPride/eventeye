<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
      <link rel="shortcut icon" href="../favicon.ico">
      <script src="modernizr.custom.js"></script>
    <title>Submit Successful</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Submission Successful!</h1>
        <p class="lead">Thank you for choosing Event Eye! If you have any questions or concerns, please feel free to contact us as Eventeyeapp@gmail.com</p> 
        </div>
        
      <!-- Example row of columns -->

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Event Eye, Inc.</p>
      </footer>

    </div> <!-- /container -->
      
      
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js">
      
    </script>
    <script>
        function submitToDatabase() {
            
        }
    </script>
  </body>
</html>

<?php 

$host = "bmgt407.rhsmith.umd.edu";
$user = "bmgt407_17";
$password = "bmgt407_17";
$dbname = "bmgt407_17_db";
$port = "22";
// PayPal settings

$paypal_email = 'eventeyeapp@gmail.com';

$return_url = 'http://bmgt407.rhsmith.umd.edu/~bmgt407_17/';

$cancel_url = 'http://bmgt407.rhsmith.umd.edu/~bmgt407_17/';

$notify_url = 'http://bmgt407.rhsmith.umd.edu/~bmgt407_17//payments.php';

 

$item_name = 'Test Item';

$item_amount = 5.00;

 

// Include Functions

include("functions.php");

 

// Check if paypal request or response

if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){

    $querystring = '';

  

    // Firstly Append paypal account to querystring

    $querystring .= "?business=".urlencode($paypal_email).";";

    // Append amount&&&;&&;&&;&&;&&;&&; currency (£) to quersytring so it cannot be edited in html

    //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.

    $querystring .= "item_name=".urlencode($item_name).";";
    $querystring .= "amount=".urlencode($item_amount).";";

  

    //loop for posted values and append to querystring

    foreach($_POST as $key => $value) {

        $value = urlencode(stripslashes($value));

        $querystring .= "$key=$value";

    }

  

    // Append paypal return addresses

    $querystring .= "return=".urlencode(stripslashes($return_url)).";";

    $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url)).";";
    $querystring .= "notify_url=".urlencode($notify_url);

  

    // Append querystring with custom field

    //$querystring .= "&&&;&&;&&;&&;&&;&&;custom=".USERID;


    // Redirect to paypal IPN

    /*header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);

    exit();*/
    echo $querystring;

} else {

   // Response from PayPal

}

?>