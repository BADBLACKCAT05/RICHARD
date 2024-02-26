@extends('layout')
@section('title', 'login')
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
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            margin-left: 250px; /* Adjust margin-left to move the container to the right */
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .rooms {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .room {
            flex-basis: calc(25% - 10px);
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .room.selected {
            background-color: #f0f0f0;
        }

        .room.booked {
            background-color: #ff6666;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"],
        button,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .confirmation,
        .error-message {
            display: none;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .confirmation {
            background-color: #4caf50;
            color: #fff;
        }

        .error-message {
            background-color: #ff6666;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Room Availability</h1>
        <div id="confirmation" class="confirmation"></div>
        <form id="bookingForm">
            <label for="category">Room Category:</label>
            <select id="category" name="category">
                <option value="Family">Family Room</option>
                <option value="Standard">Standard Room</option>
                <option value="Deluxe">Deluxe Room</option>
                <option value="Executive">Executive Room</option>
            </select>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <button type="submit">Check Availability</button>
            <div class="rooms" id="roomsContainer"></div>
        </form>
        <div id="errorMessage" class="error-message"></div>
    </div>

    <script>
        const bookingForm = document.getElementById('bookingForm');
        const confirmation = document.getElementById('confirmation');
        const errorMessage = document.getElementById('errorMessage');
        const roomsContainer = document.getElementById('roomsContainer');

        // Define booking data structure for each category of rooms
        const familyRooms = Array.from({ length: 10 }, () => []);
        const standardRooms = Array.from({ length: 10 }, () => []);
        const deluxeRooms = Array.from({ length: 10 }, () => []);
        const executiveRooms = Array.from({ length: 10 }, () => []);

        function isAvailable(roomArray, date) {
            for (let booking of roomArray) {
                const [bookingStart, bookingEnd] = booking;
                if (date >= bookingStart && date <= bookingEnd) {
                    return false; // Date is not available for booking
                }
            }
            return true; // Date is available for booking
        }

        bookingForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const category = document.getElementById('category').value;
            const date = new Date(document.getElementById('date').value);

            // Clear previous room listings
            roomsContainer.innerHTML = '';

            let roomArray;
            switch (category) {
                case 'Family':
                    roomArray = familyRooms;
                    break;
                case 'Standard':
                    roomArray = standardRooms;
                    break;
                case 'Deluxe':
                    roomArray = deluxeRooms;
                    break;
                case 'Executive':
                    roomArray = executiveRooms;
                    break;
                default:
                    break;
            }

            let availableRooms = 0;
            for (let i = 0; i < roomArray.length; i++) {
                const roomName = category.charAt(0).toUpperCase() + 'room' + (i + 1);
                const room = document.createElement('div');
                room.classList.add('room');
                room.textContent = roomName;
                if (isAvailable(roomArray[i], date)) {
                    room.classList.add('available');
                    room.addEventListener('click', () => {
                        confirmBooking(roomName, date);
                    });
                    availableRooms++;
                } else {
                    room.classList.add('booked');
                }
                roomsContainer.appendChild(room);
            }

            // Display overall message for available rooms
            confirmation.textContent = `${availableRooms} rooms available in the ${category} category on ${date.toDateString()}.`;
            confirmation.style.display = 'block';

            bookingForm.reset();
            errorMessage.style.display = 'none';
        });

        function confirmBooking(room, date) {
            confirmation.innerHTML = `Room ${room} is available on ${date.toDateString()}. Proceed to book.`;
            confirmation.style.display = 'block';
            setTimeout(() => {
                confirmation.style.display = 'none';
            }, 3000); // Hide confirmation after 3 seconds
        }
    </script>
</body>
</html>
