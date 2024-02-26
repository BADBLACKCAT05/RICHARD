
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navigation Bar</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #333;
    padding-top: 60px; /* Adjust based on your design */
}

.sidenav a {
    padding: 10px 15px;
    text-decoration: none;
    font-size: 18px;
    color: #fff;
    display: block;
}

.sidenav a:hover {
    background-color: #555;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 16px;}
}

        </style>
</head>
<body>
    <div class="sidenav">
        <a href="#">Acount</a>
        <a href="{{ route('b2') }}">Booking</a>   
        <a href="{{ route('bookings') }}">Room Availability</a>   
        <a href="{{ route('history') }}">Transaction</a>  
        <a href="{{ route('logout') }}">Logout</a>   

</a>
    </div>
    
</body>
</html>

