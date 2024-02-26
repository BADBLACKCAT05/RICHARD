@extends('layout')
@section('title', 'contact')
@section('content')
@include('include.nav')
<style>
            .contacts {
            position: relative;
            padding: 20px 20px 20px; /* Adjusted padding to make space for the fixed navbar */
            padding-top: 120px; 
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
    </style>
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