@extends('layout')
@section('title', 'bookings')
@section('content')
@include('include.nav2')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #booking-app {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: relative;
        }

        label { 
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"],
        select,
        button {
            margin-bottom: 10px;
            padding: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        h3 {
            margin-top: 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .back-button:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 10px;
            color: #ff0000;
        }
    </style>
</head>
<body>

<div id="booking-app">
    <div id="category-selection">
        <h3>STEP 1</h3>
        <label for="category">Choose a category:</label>
        <select id="category">
            <option value="standard">Standard</option>
            <option value="deluxe">Deluxe</option>
            <option value="suite">Suite</option>
            <option value="family">Family</option>
        </select>
        <button onclick="showDateInputs()">Next</button>
    </div>
    <div id="date-selection" style="display: none;">
        <h3>STEP 2</h3>
        <label for="start-date">Start Date:</label>
        <input type="date" id="start-date">
        <label for="end-date">End Date:</label>
        <input type="date" id="end-date">
        <button onclick="checkAvailability()">Check Availability</button>
    </div>
    <div id="room-selection" style="display: none;">
        <h3>STEP 3</h3>
        <h3>Available Rooms:</h3>
        <ul id="available-rooms"></ul>
        <p class="message" id="availability-message"></p>
        <label for="room">Select a room:</label>
        <select id="room"></select>
        <label for="email">Enter your email:</label>
        <input type="email" id="email">
        <label for="booking-action">Choose action:</label>
        <select id="booking-action">
            <option value="book">Book</option>
            <option value="reserve">Reserve</option>
        </select>
        <button onclick="showBookingDetails()">Next</button>
    </div>
    <div id="booking-details" style="display: none;">
        <h3>STEP 4</h3>
        <h3>Booking Details:</h3>
        <p>Category: <span id="booking-category"></span></p>
        <p>Room: <span id="booking-room"></span></p>
        <p>Start Date: <span id="booking-start-date"></span></p>
        <p>End Date: <span id="booking-end-date"></span></p>
        <p>Email: <span id="booking-email"></span></p>
        <p>Action: <span id="booking-action-display"></span></p>
        <p>Total Price (including 20% reservation fee): PHP <span id="booking-price"></span></p>
        <button onclick="confirmBooking()">Confirm</button>
    </div>
    <div id="booking-success" style="display: none;">
        <p>Booking successful!</p>
        <button onclick="bookAgain()">Book Again</button>
    </div>
</div>

<button class="back-button" onclick="goBack()" style="display:none;">Back to Previous Step</button>

<!-- Add a hidden input field for the user ID in your form -->
<input type="hidden" id="user-id" value="{{ auth()->id() }}">

<script>
const rooms = {
  standard: { names: ["Room 1", "Room 2", "Room 3", "Room 4", "Room 5", "Room 6", "Room 7", "Room 8", "Room 9", "Room 10"], price: 2000 },
  deluxe: { names: ["Room 11", "Room 12", "Room 13", "Room 14", "Room 15", "Room 16", "Room 17", "Room 18", "Room 19", "Room 20"], price: 5000 },
  suite: { names: ["Room 21", "Room 22", "Room 23", "Room 24", "Room 25", "Room 26", "Room 27", "Room 28", "Room 29", "Room 30"], price: 8000 },
  family: { names: ["Room 31", "Room 32", "Room 33", "Room 34", "Room 35", "Room 36", "Room 37", "Room 38", "Room 39", "Room 40"], price: 3000 }
};

let bookedRooms = []; // List to store booked rooms with start and end dates

document.addEventListener("DOMContentLoaded", function () {
    // Fetch booked room data from the server
    fetch('/bookings')
        .then(response => response.json())
        .then(data => {
            // Update the 'bookedRooms' array with the fetched data
            bookedRooms = data;

            // Additional initialization logic if needed
            // ...

            // Call a function to check room availability or perform other actions
            // ...

            // Example: Call your existing function to show date inputs
            showDateInputs();
        })
        .catch(error => {
            console.error('Error fetching booked rooms:', error);
        });
});

function goBack() {
    let currentStep = document.querySelector('[style="display: block;"]');
    switch (currentStep.id) {
        case "date-selection":
            document.getElementById('date-selection').style.display = 'none';
            document.getElementById('category-selection').style.display = 'block';
            break;
        case "room-selection":
            document.getElementById('room-selection').style.display = 'none';
            document.getElementById('date-selection').style.display = 'block';
            break;
        case "booking-details":
            document.getElementById('booking-details').style.display = 'none';
            document.getElementById('room-selection').style.display = 'block';
            break;
        case "booking-success":
            document.getElementById('booking-success').style.display = 'none';
            document.getElementById('booking-details').style.display = 'block';
            break;
        default:
            break;
    }
}

function showDateInputs() {
    document.getElementById('category-selection').style.display = 'none';
    document.getElementById('date-selection').style.display = 'block';
}

function isRoomBooked(room) {
    let startDate = document.getElementById('start-date').value;
    let endDate = document.getElementById('end-date').value;
    for (let booking of bookedRooms) {
        if (booking.room === room && !(new Date(startDate) >= new Date(booking.end_date) || new Date(endDate) <= new Date(booking.start_date))) {
            return true;
        }
    }
    return false;
}

function checkAvailability() {
    let category = document.getElementById('category').value;
    let availableRooms = rooms[category.toLowerCase()].names;
    let roomSelect = document.getElementById('room');
    roomSelect.innerHTML = '';
    availableRooms.forEach(room => {
        let option = document.createElement('option');
        option.value = room;
        option.textContent = room;
        if (isRoomBooked(room)) {
            option.style.color = 'red';
            option.disabled = true;
        }
        roomSelect.appendChild(option);
    });

    let startDate = document.getElementById('start-date').value;
    let endDate = document.getElementById('end-date').value;
    let availableRoomCount = availableRooms.filter(room => !isRoomBooked(room)).length;

    if (availableRoomCount > 0) {
        document.getElementById('availability-message').textContent = `${availableRoomCount} room(s) in the ${category} category available from ${startDate} to ${endDate}`;
    } else {
        document.getElementById('availability-message').textContent = `No rooms in the ${category} category available for the selected dates`;
    }

    document.getElementById('date-selection').style.display = 'none';
    document.getElementById('room-selection').style.display = 'block';
}

function showBookingDetails() {
    let category = document.getElementById('category').value;
    let room = document.getElementById('room').value;
    let startDate = document.getElementById('start-date').value;
    let endDate = document.getElementById('end-date').value;
    let email = document.getElementById('email').value;
    let action = document.getElementById('booking-action').value;

    if (category && room && startDate && endDate && email && action) {
        let pricePerNight = rooms[category.toLowerCase()].price;
        let numberOfDays = Math.ceil((new Date(endDate) - new Date(startDate)) / (1000 * 60 * 60 * 24));
        let totalPrice = pricePerNight * numberOfDays;
        let reservationFee = totalPrice * 0.2;
        let totalPriceIncludingFee = totalPrice + reservationFee;

        bookedRooms.push({ room: room, start_date: startDate, end_date: endDate }); // Add booked room with start and end dates

        document.getElementById('booking-category').textContent = category;
        document.getElementById('booking-room').textContent = room;
        document.getElementById('booking-start-date').textContent = startDate;
        document.getElementById('booking-end-date').textContent = endDate;
        document.getElementById('booking-email').textContent = email;
        document.getElementById('booking-action-display').textContent = action;
        document.getElementById('booking-price').textContent = totalPriceIncludingFee.toFixed(2);

        document.getElementById('room-selection').style.display = 'none';
        document.getElementById('booking-details').style.display = 'block';
    } else {
        alert('Please fill in all fields.');
    }
}

function confirmBooking() {
    let category = document.getElementById('category').value;
    let room = document.getElementById('room').value;
    let startDate = document.getElementById('start-date').value;
    let endDate = document.getElementById('end-date').value;
    let email = document.getElementById('email').value;
    let action = document.getElementById('booking-action').value;
    let totalPriceIncludingFee = document.getElementById('booking-price').textContent;

    // Retrieve the user ID from the hidden input field
    let userId = document.getElementById('user-id').value;

    if (category && room && startDate && endDate && email && action) {
        let data = {
            category: category,
            room: room,
            start_date: startDate,
            end_date: endDate,
            email: email,
            action: action,
            total_price: totalPriceIncludingFee,
            user_id: userId // Include the user ID in the data
        };

        // Assume the URL for the booking endpoint is '/bookings'
        fetch('/bookings', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message); // You can handle the response message here
            document.getElementById('booking-details').style.display = 'none';
            document.getElementById('booking-success').style.display = 'block';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    } else {
        alert('Please fill in all fields.');
    }
}

function bookAgain() {
    document.getElementById('booking-success').style.display = 'none';
    document.getElementById('category-selection').style.display = 'block';
}
</script>
</body>
</html>
