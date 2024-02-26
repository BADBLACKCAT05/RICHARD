@extends('layout')
@section('title', 'frontpage')
@section('content')
@include('include.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Website</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Light gray background color */
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Box shadow for the body */
        }

        .header {
            background-color: #008080; /* Teal color for the header */
            color: #ffffff; /* White text color for better contrast */
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); /* Box shadow for the header */
            position: fixed; /* Fixed position to keep the navbar at the top */
            width: 100%; /* Take up the full width */
            z-index: 1000; /* Higher z-index to make sure it's above other content */
        }

        .navbar {
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px; /* Default font size for the navbar items */
        }

        .navbar .home-link {
            font-size: 24px; /* Larger font size for the Home link */
            font-weight: bold; /* Make the Home link bold */
        }

        .content {
            position: relative;
            padding: 20px 20px 20px; /* Adjusted padding to make space for the fixed navbar */
            text-align: center;
        }

        .about {
            position: relative;
            padding: 20px 20px 20px; /* Adjusted padding to make space for the fixed navbar */
            text-align: center;
            border-bottom: 1px solid #008080; /* Add a bottom border to each section */
         padding-bottom: 20px; /* Add padding to create space between the content and the border */

        }

        .content img {
            max-width: 100%; /* Make the image responsive */
            height: auto; /* Maintain the image's aspect ratio */
            position: relative; /* Relative positioning for absolute positioning inside */
            border-bottom: 1px solid #008080; /* Add a bottom border to each section */
padding-bottom: 20px; /* Add padding to create space between the content and the border */

        }

        .about-us-button {
            background-color: #008080;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 18px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px; /* Adjusted margin for spacing */
        }
        ////////////////////////////////////////////about eme///////////
        .about {
    background-color: #ffffff; /* White background color for the about section */
    padding: 40px 20px; /* Adjusted padding for better spacing */
    text-align: center;
    margin-top: 20px; /* Adjusted margin for spacing */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for the about section */
}

.about h2 {
    color: #008080; /* Teal color for the heading */
}

.about p {
    color: #333; /* Dark gray color for the text */
    line-height: 1.6;
}

.about strong {
    color: #008080; /* Teal color for strong text */
}

.about-us-button {
    background-color: #008080;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 18px;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px; /* Adjusted margin for spacing */
}
.login {
            position: relative;
            padding: 20px 20px 20px; /* Adjusted padding to make space for the fixed navbar */
            text-align: center;
            border-bottom: 1px solid #008080; /* Add a bottom border to each section */
         padding-bottom: 20px; /* Add padding to create space between the content and the border */

        }
        .rooms {
            position: relative;
            padding: 20px 20px 20px; /* Adjusted padding to make space for the fixed navbar */
            text-align: center;
            border-bottom: 1px solid #008080; /* Add a bottom border to each section */
         padding-bottom: 200px; /* Add padding to create space between the content and the border */

        }
        .contacts {
            position: relative;
            padding: 20px 20px 20px; /* Adjusted padding to make space for the fixed navbar */
            text-align: center;
            border-bottom: 1px solid #008080; /* Add a bottom border to each section */
         padding-bottom: 200px; /* Add padding to create space between the content and the border */

        }
        .contact-info h2 {
    color: #008080; 
}
        .contact-info {
    display: flex;
    justify-content: space-between;
}

.contact-info > div {
    width: 48%; /* Adjust the width as needed */
}
.time-info {
    width: 100%; /* Make the time-info div full width */
}

/////////////////////////////////registration///////////
{
    font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login {
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center vertically */
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #008080;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .nav-link {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #008080;
    color: #ffffff;
    padding: 15px 30px;
    font-size: 24px;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 1001; /* Ensure it's above the image */
}
footer {
    background-color: #008080;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}
  </style>
</head>
<body>
<body>
    <a class="nav-link" href="{{route('registration')}}">BOOK NOW!</a>
    <img src="{{URL('image/front.png')}}" alt="">
   
    <div id="about" class="about">  
        <section>
            <h1>ABOUT US</h1>
            <section>
        <h2>MISSION</h2>
        <p>mission is to provide an unparalleled hospitality experience that exceeds the expectations
             of our guests. We are dedicated to delivering exceptional services, comfortable accommodations, and delightful culinary offerings. Our commitment to excellence is driven by a passion for creating memorable moments and ensuring the utmost satisfaction of every visitor.".</p>


        <h2>VISION</h2>
        <p>"Our vision at ANNAA is to be recognized as the premier
             destination for hospitality and dining. We aspire to create an atmosphere of warmth, sophistication, and genuine care. Through continuous innovation, personalized service, and a focus on quality, we aim to become the preferred choice for travelers seeking comfort, luxury, and delectable culinary experiences. Our vision extends beyond being a place to stay and dine; we strive to be a cherished memory in the hearts of our guests."</p>

        <h2>Meet the Team</h2>
        <p><strong>Adrian Makilan</strong> - NA</p>
        <p><strong>Mary Jane Bando</strong> - NA</p>
        <p><strong>Mark steven silva</strong> - IM</p>
        <p><strong>MAri </strong> - IM</p>
        <p><strong>Ysalina Richard</strong> - IS</p>
        </section>
    </div>
    <div id="contacts" class="contacts">  
    <section>
    <h1>CONTACTS AND LOCATION</h1>
        <div class="contact-info">
            <div>
                <h2>COME VISIT US</h2>
                <p>38 RIVERDALE FORESTHILL STA.MONICA</p>
                <p>NOVAICHES QUEZON CITY</p>
            </div>
            <div>
                <h2>TALK TO US</h2>
                <p>INSTAGRAM:@ANNAINSTAGRAM<br></br>
                   FACEBOOK:@ANNAFACEBOOK<br></br>
                   TWITTER:@ANNATWITTER</p>
            </div>
            <div>
            <div class="time-info">
        <h2>TIME</h2>
        <p>MON - FRI: 8AM - 8PM <br>
           SATURDAY: 9AM - 7PM <br>
           SUNDAY: 9AM - 8PM</p>
    </div>
        </div>
    </section>
</div>
 <div>
 <footer>
        <div class="container">
            <p>&copy; 2024 ANAA hotel and restaurant. All rights reserved.</p>
        </div>
    </footer>
 </div>
    <script>
    function scrollToSection(sectionId) {
        const targetSection = document.getElementById(sectionId);

        if (targetSection) {
            const headerHeight = document.querySelector('.header').offsetHeight;
            const targetPosition = targetSection.offsetTop - headerHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    }

    function scrollToContent() {
        scrollToSection('content');
    }

    function scrollToAbout() {
        scrollToSection('about');
    }

    function scrollToContacts() {
        scrollToSection('contacts');
    }

    function scrollToRooms() {
        scrollToSection('rooms');
    }
</script>



</body>
</html>
@endsection