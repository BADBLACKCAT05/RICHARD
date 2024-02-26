
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
        display: flex;
        flex-direction: column;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .header {
        background-color: #008080;
        color: #ffffff;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
    }

    .navbar {
        display: flex;
        align-items: center;
    }

    .navbar a {
        color: #ffffff;
        text-decoration: none;
        margin: 0 15px;
        font-size: 16px;
    }

    .navbar .home-link {
        font-size: 24px;
        font-weight: bold;
    }

    .navbar .login-link {
        margin-right: 0%;
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
        z-index: 1001;
    }
    .content {
        margin-top: 120px; /* Adjust the value based on your header height */
        padding: 20px; /* Add padding as needed */
        text-align: center;
    }
    
</style>

    </style>
</head>
<body>

<div class="header">
    <div class="navbar">
        <b><a href="{{ route('newfront') }}">ANAA Hotel and Restaurant</a> </b>
        <a href="{{ route('rooms') }}">Rooms</a> 
        <a href="{{ route('about') }}">About</a>  
        <a href="{{ route('contact') }}">Contact</a>     
        <a href="{{ route('login') }}">Login</a>   

    </div>
</div>
<!-- Content goes here -->
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>