@extends('layout')
@section('title', 'about')
@section('content')
@include('include.nav')
<style>
.about {
    background-color: #ffffff; /* White background color for the about section */
    padding: 40px 20px; /* Adjusted padding for better spacing */
    padding-top: 80px; 
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
</style>
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