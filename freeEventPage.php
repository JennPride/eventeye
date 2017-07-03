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
    <title>Free Event Page</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href="css/general.css" rel="stylesheet">
	
	 <!-- Owl-Carousel -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="css/magnific-popup.css">
      </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
<a href="index.php">
<button type="button" class="btn btn-primary" id="back-button">
  <i class="fa fa-arrow-left" aria-hidden="true"></i> Return to this Week's Events
</button>
</a>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h2>Event Submission Form</h2>
        <p class="lead">Market your for-profit events through Event Eye!</p>
          <p><div class="description-small">Does your organization have a free event coming up that you’re looking to advertise? Submit your not-for-profit event to Event Eye and let us help you spread the word to the University of Maryland community. Our interactive map will make your event easy to locate and read details about, all at no cost to you. Submissions can be sent to eventeyeapp@gmail.com for review before being posted on our site. Please include the date, time, and location of your event in addition to an event description and link if applicable. If your event is being sponsored by another organization, please include that information as well.</div> </p>
        </div>

<form class="form-horizontal" id="eventForm" role="form" method="POST" data-toggle="validator" action="success.php">
    <div class="form-group">
        <label class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="fName" id="fName" placeholder="John" required>
        </div>
    </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lName" placeholder="Doe" onblur="testFunction()" value="" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="contactEmail" placeholder="example@domain.com" value="" onblur="testFunction()" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Event Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="eventName" placeholder="Best Event Ever" value="" onblur="testFunction()" required>
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Event Location</label>
        <div class="col-sm-10">
            <select name="location" id="location" onblur="testFunction()" required>
                <option value="McKeldin Mall"> McKeldin Mall </option>
                <option value="McKeldin Library"> McKeldin Library</option>
                <option value="Adele H. Stamp Student Union"> Adele H. Stamp Student Union </option>
                <option value="The Clarice Smith Performing Arts Center"> The Clarice Smith Performing Arts Center </option>
                <option value="Art-Sociology Building"> Art-Sociology Building </option>
                <option value="Hornbake Library"> Hornbake Library </option>
                <option value="Eppley Recreation Center"> Eppley Recreation Center </option>
                <option value="Lefrak Hall"> Lefrak Hall </option>
                <option value="Cole Students Activities Building"> Cole Students Activities Building </option>
                <option value="Reckord Armory"> Reckord Armory </option>
                <option value="Memorial Chapel"> Memorial Chapel </option>
                <option value="Skinner Building"> Skinner Building </option>
                <option value="Tawes Hall"> Tawes Hall </option>
                <option value="Xfinity Center"> Xfinity Center </option>
                <option value="Mathematics Building"> Mathematics Building </option>
                <option value="Shoemaker Hall"> Shoemaker Hall </option>
                <option value="Jeong H. Kim Engineering Building"> Jeong H. Kim Engineering Building </option>
                <option value="South Campus Commons 1"> South Campus Commons 1  </option>
                <option value="Cole Students Activities Building - Outside"> Cole Students Activities Building - Outside </option>
                <option value="St. Mary's Hall"> St. Mary's Hall </option>
                <option value="Glen L. Martin Hall"> Glen L. Martin Hall </option>
                <option value="Capital One Field at Maryland Stadium"> Capital One Field at Maryland Stadium </option>
                <option value="The Tennis Center at College Park">The Tennis Center at College Park </option>
                <option value="Field Hockey & Lacrosse Complex"> Field Hockey &amp; Lacrosse Complex </option>
                <option value="Maryland Softball Stadium"> Maryland Softball Stadium </option>
                <option value="John S. Toll Physics Building"> John S. Toll Physics Building </option>
                <option value="Computer and Space Sciences Building"> Computer and Space Sciences Building </option>
                <option value="other"> Other</option>
            </select>
        </div>
        </br>
        </br>
            <label class="col-sm-2 control-label">If you chose other, please specify: </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="otherLocation" placeholder="" onblur="testFunction()" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Room - if applicable</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="room" placeholder="Grand Ballroom" onblur="testFunction()" value="">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Event Category</label>
        <div class="col-sm-10">
        <select name="eventCategory" id="eventCategory" onblur="testFunction()" required>
                <option value="Music">Music</option>
                <option value="Career">Career</option>
                <option value="Performance">Performance</option>
                <option value="Athletic">Athletic</option>
                <option value="Food">Food</option>
                <option value="Service">Service</option>
                <option value="Recreation">Recreation</option>
                <option value="Education">Education</option>
            </select>
        </div>
    </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" >Event Cost</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="eventCost" placeholder="$5 for Students, $10 for Visitors" value="" onblur="testFunction()" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Event Date</label>
        <div class="col-sm-10">
           <select name="month" id="month" onblur="testFunction()" required >
                <option value="01"> January </option>
                <option value="02"> February </option>
                <option value="03"> March </option>
                <option value="04"> April </option>
                <option value="05"> May </option>
                <option value="06"> June </option>
                <option value="07"> July </option>
                <option value="08"> August </option>
                <option value="09"> September </option>
                <option value="10"> October </option>
                <option value="11"> November </option>
                <option value="12"> December </option>
            </select>
            <label>  </label>
            <select name="day" id="day" onblur="testFunction()" required>
                <option value="01"> 1st </option>
                <option value="02"> 2nd </option>
                <option value="03"> 3rd </option>
                <option value="04"> 4th </option>
                <option value="05"> 5th </option>
                <option value="06"> 6th </option>
                <option value="07"> 7th </option>
                <option value="08"> 8th </option>
                <option value="09"> 9th </option>
                <option value="10"> 10th </option>
                <option value="11"> 11th </option>
                <option value="12"> 12th </option>
                <option value="13"> 13th </option>
                <option value="14"> 14th </option>
                <option value="15"> 15th </option>
                <option value="16"> 16th </option>
                <option value="17"> 17th </option>
                <option value="18"> 18th </option>
                <option value="19"> 19th </option>
                <option value="20"> 20th </option>
                <option value="21"> 21st </option>
                <option value="22"> 22nd </option>
                <option value="23"> 23rd </option>
                <option value="24"> 24th </option>
                <option value="25"> 25th </option>
                <option value="26"> 26th </option>
                <option value="27"> 27th </option>
                <option value="28"> 28th </option>
                <option value="29"> 29th </option>
                <option value="30"> 30th </option>
                <option value="31"> 31st </option>
            </select>
            <select name="year" id="year" onblur="testFunction()" required>
                <option value="2016"> 2016 </option>
                <option value="2017"> 2017 </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Event Start Time</label>
        <div class="col-sm-10">
            <select name="hour" id="start-hour" onblur="testFunction()" required>
                <option value="01"> 1 </option>
                <option value="02"> 2 </option>
                <option value="03"> 3 </option>
                <option value="04"> 4 </option>
                <option value="05"> 5 </option>
                <option value="06"> 6 </option>
                <option value="07"> 7 </option>
                <option value="08"> 8 </option>
                <option value="09"> 9 </option>
                <option value="10"> 10 </option>
                <option value="11"> 11 </option>
                <option value="12"> 12 </option>
            </select>
            <label> : </label>
            <select name="minute" id="start-minute" onblur="testFunction()" required>
                <option value="00"> 00 </option>
                <option value="05"> 05 </option>
                <option value="10"> 10 </option>
                <option value="15"> 15 </option>
                <option value="20"> 20 </option>
                <option value="25"> 25 </option>
                <option value="30"> 30 </option>
                <option value="35"> 35 </option>
                <option value="40"> 40 </option>
                <option value="45"> 45 </option>
                <option value="50"> 50 </option>
                <option value="55"> 55 </option>
            </select>
            <select name="start-period" id="start-period" onblur="testFunction()" required>
                <option value="AM"> AM </option>
                <option value="PM"> PM </option>
            </select>
        </div>
    </div>
    <div class="form-group">
               <label class="col-sm-2 control-label">Event End Time</label>
        <div class="col-sm-10">
            <select name="hour" id="end-hour" onblur="testFunction()" required >
                <option value="01"> 1 </option>
                <option value="02"> 2 </option>
                <option value="03"> 3 </option>
                <option value="04"> 4 </option>
                <option value="05"> 5 </option>
                <option value="06"> 6 </option>
                <option value="07"> 7 </option>
                <option value="08"> 8 </option>
                <option value="09"> 9 </option>
                <option value="10"> 10 </option>
                <option value="11"> 11 </option>
                <option value="12"> 12 </option>
            </select>
            <label> : </label>
            <select name="minute" id="end-minute" onblur="testFunction()" required>
                <option value="00"> 00 </option>
                <option value="05"> 05 </option>
                <option value="10"> 10 </option>
                <option value="15"> 15 </option>
                <option value="20"> 20 </option>
                <option value="25"> 25 </option>
                <option value="30"> 30 </option>
                <option value="35"> 35 </option>
                <option value="40"> 40 </option>
                <option value="45"> 45 </option>
                <option value="50"> 50 </option>
                <option value="55"> 55 </option>
            </select>
            <select name="minute" id="end-period" onblur="testFunction()" required>
                <option value="AM"> AM </option>
                <option value="PM"> PM </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Event Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="eventDescription" placeholder="About your event, what do you want everyone to know?" value="" onblur="testFunction()" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Event Sponsor</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sponsor" placeholder="Club Name, Company Name, etc." value="" onblur="testFunction()">
        </div>
            </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Event Link</label>
        <div class="col-sm-10">
            <input type="url" class="form-control" id="eventLink" placeholder="www.yourevent.com" value="" onblur="testFunction()">
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Terms Agreement</label>
        <div class="col-sm-10">
           <p> <input type="checkbox" id="terms" required> By checking this box, I confirm that the event I am currently submitting through this form is a non-profit event, defined as the following: an event in which 0% of the revenue will be kept by my organization or an affiliate of my organization. If I submit this event and it is not labeled as a non-profit event by Event Eye and the previous terms, I understand my event will be removed and future submissions may be voided.</p> </br>
        </br>
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Validation</label>
        <div class="col-sm-10">
        <div class="g-recaptcha" data-sitekey="6LdC1R0TAAAAAFhGpQSzjLHh9qlnycs6_8LRfyyJ"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary" onclick="submitToDatabase()">
        </div>
    </div>
</form>



      <!-- Example row of columns -->

      <!-- Site footer -->
      <footer class="footer">
      </footer>

    </div> <!-- /container -->
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script>   
        function submitToDatabase() {
            if (document.getElementById("terms").checked == true) {
           
            var firstName = document.getElementById('fName').value;
            var lastName = document.getElementById('lName').value;
            var email = document.getElementById('contactEmail').value;
            var eventName = document.getElementById('eventName').value;
            var location = document.getElementById("location").options[document.getElementById("location").selectedIndex ].text;
            var oLocation = document.getElementById('otherLocation').value;
           
            if (location == "Other") {
                location = oLocation;
            }  
                
            var room = document.getElementById('room').value;
            var category = document.getElementById("eventCategory").options[document.getElementById("eventCategory").selectedIndex ].text;
            var cost = document.getElementById('eventCost').value;
            var eventMonth = document.getElementById("month").options[document.getElementById("month").selectedIndex ].value;
            var eventDay = document.getElementById("day").options[document.getElementById("day").selectedIndex ].value;
            var eventYear = document.getElementById("year").options[document.getElementById("year").selectedIndex ].value;
            var sMinute = document.getElementById("start-minute").options[document.getElementById("start-minute").selectedIndex ].value;
            var eMinute = document.getElementById("end-minute").options[document.getElementById("end-minute").selectedIndex ].value;
            
            var startHour;
            var sHour;
            var endHour;
            var eHour;
            
            if ((document.getElementById("start-period").selectedIndex == 1) && (document.getElementById("start-hour").selectedIndex != 11)){
                 startHour = document.getElementById("start-hour").selectedIndex + 13;
                sHour = startHour.toString();
                 
            } else {
                startHour = document.getElementById("start-hour").selectedIndex + 1;
                sHour = document.getElementById("start-hour").options[document.getElementById("start-hour").selectedIndex ].value;
            }
            
            
            if ((document.getElementById("end-period").selectedIndex == 1) && (document.getElementById("end-hour").selectedIndex != 11)){
                 endHour = document.getElementById("end-hour").selectedIndex + 13;
                eHour = endHour.toString();
            } else {
                endHour = document.getElementById("end-hour").selectedIndex + 1;
                eHour = document.getElementById("end-hour").options[document.getElementById("end-hour").selectedIndex ].value;
            }
            
            var eventDate = eventYear.concat("-".concat(eventMonth.concat("-").concat(eventDay)));
            var sTime = sHour.concat(":".concat(sMinute.concat(":00")));
            var eTime = eHour.concat(":".concat(eMinute.concat(":00")));
            var description = document.getElementById("eventDescription").value;
            var sponsor = document.getElementById("sponsor").value;
            var eventUrl = document.getElementById("eventLink").value;
            var price = "$".concat((endHour - startHour) * 3);
        
            if ((firstName != null) && (firstName != "") && (lastName != null) && (lastName != "") && (email != null) && (email != "") && (cost != null) && (cost != "") && (eventName != null) && (eventName != "") && (description != null) && (description != "")) {
             
            $.ajax({
            type: 'POST',
            url: 'eventSubmit.php',
            data: {firstName: firstName, lastName: lastName, email: email, eventName: eventName, location:location, category:category, cost:cost, room:room, eventUrl: eventUrl, sponsor:sponsor, sTime:sTime, eTime:eTime, eventDate:eventDate, description:description, recaptcha:grecaptcha.getResponse()},
            success: function() {
            },
            error: function() {
            }
            }); 
            }
        } else {
            alert("Please accept the terms agreement.");
        }
            return false;
    }
    
        
    </script> 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js">
      
    </script>
    
    <!-- validating form info -->
    <script>
        
        
        
        

    </script>
    <!-- Submitting to MySQL database !-->
    <script>
    
    </script>
  </body>
</html>