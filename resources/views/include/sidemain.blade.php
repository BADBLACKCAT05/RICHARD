@extends('layout')
@section('title', 'b2')
@section('content')
@include('include.nav2')

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
        margin-left: 250px;
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
        pointer-events: none;
    }

    .room.available {
        background-color: #7fff7f;
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
    .error-message,
    .thank-you-message {
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

    .thank-you-message {
        background-color: #4caf50;
        color: #fff;
        text-align: center;
        margin-top: 20px;
    }
</style>

<div class="container">
    <h1>Room Booking </h1>
    <div id="confirmation" class="confirmation"></div>
    <form id="bookingForm">
        <label for="category">Room Category:</label>
        <select id="category" name="category">
            <option value="Family">Family Room</option>
            <option value="Standard">Standard Room</option>
            <option value="Deluxe">Deluxe Room</option>
            <option value="Executive">Executive Room</option>
        </select>
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" required>
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" required>
        <button type="submit">Check Availability</button>
    </form>
    <div class="rooms" id="roomsContainer"></div>
    <form id="bookingDetailsForm" style="display: none;">
        <h2>Booking Details</h2>
        <div id="roomInfo"></div>
        <label for="bookingName">Name:</label>
        <input type="text" id="bookingName" name="bookingName" required>
        <label for="bookingEmail">Email:</label>
        <input type="email" id="bookingEmail" name="bookingEmail" required>
        <button id="confirmBookingBtn" type="button">Confirm Booking</button>
    </form>
    <div id="errorMessage" class="error-message"></div>
    <button id="bookAgainButton" style="display: none;">Book Again</button>
    <div id="thankYouMessage" style="display: none;">
        <h2>Thank you for booking at Anaa Hotel!</h2>
        <p>Your booking has been confirmed. We look forward to welcoming you.</p>
    </div>
</div>

<script>
    const bookingForm = document.getElementById('bookingForm');
    const confirmation = document.getElementById('confirmation');
    const errorMessage = document.getElementById('errorMessage');
    const roomsContainer = document.getElementById('roomsContainer');
    const bookingDetailsForm = document.getElementById('bookingDetailsForm');
    const bookAgainButton = document.getElementById('bookAgainButton');
    const roomInfo = document.getElementById('roomInfo');
    const thankYouMessage = document.getElementById('thankYouMessage');
    let confirmBookingBtnHandler = null;

    const familyRooms = Array.from({ length: 10 }, () => []);
    const standardRooms = Array.from({ length: 10 }, () => []);
    const deluxeRooms = Array.from({ length: 10 }, () => []);
    const executiveRooms = Array.from({ length: 10 }, () => []);

    const roomPrices = {
        Family: 3000,
        Standard: 2000,
        Deluxe: 5000,
        Executive: 8000
    };

    function isAvailable(roomArray, startDate, endDate) {
        for (let booking of roomArray) {
            const [bookingStart, bookingEnd] = booking;
            if (
                (startDate >= bookingStart && startDate <= bookingEnd) ||
                (endDate >= bookingStart && endDate <= bookingEnd) ||
                (startDate <= bookingStart && endDate >= bookingEnd)
            ) {
                return false;
            }
        }
        return true;
    }

    function calculateTotalPrice(category, startDate, endDate) {
        const pricePerDay = roomPrices[category];
        const numDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
        const totalPrice = pricePerDay * numDays;
        const reservationFee = totalPrice * 0.2;
        const totalPriceWithFee = totalPrice + reservationFee;
        return 'Total Price: PHP ' + new Intl.NumberFormat().format(totalPriceWithFee) + ' (includes 20% reservation fee)';
    }

    bookingForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const category = document.getElementById('category').value;
        const startDate = new Date(document.getElementById('startDate').value);
        const endDate = new Date(document.getElementById('endDate').value);

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
            if (isAvailable(roomArray[i], startDate, endDate)) {
                room.classList.add('available');
                room.addEventListener('click', () => {
                    displayBookingInfo(roomName, startDate, endDate);
                });
                availableRooms++;
            } else {
                room.classList.add('booked');
            }
            roomsContainer.appendChild(room);
        }

        confirmation.textContent = `${availableRooms} rooms available in the ${category} category from ${startDate.toDateString()} to ${endDate.toDateString()}.`;
        confirmation.style.display = 'block';

        bookingForm.reset();
        errorMessage.style.display = 'none';
    });

    function displayBookingInfo(room, startDate, endDate) {
        bookingDetailsForm.style.display = 'block';
        roomInfo.innerHTML = `Room: ${room}<br>Booking Dates: ${startDate.toDateString()} to ${endDate.toDateString()}<br>${calculateTotalPrice(document.getElementById('category').value, startDate, endDate)}`;

        const confirmBookingBtn = document.getElementById('confirmBookingBtn');

        if (confirmBookingBtnHandler) {
            confirmBookingBtn.removeEventListener('click', confirmBookingBtnHandler);
        }

        confirmBookingBtnHandler = function() {
            confirmBooking(room, startDate, endDate);
        };

        confirmBookingBtn.addEventListener('click', confirmBookingBtnHandler);
    }

    function confirmBooking(room, startDate, endDate) {
        const bookingName = document.getElementById('bookingName').value;
        const bookingEmail = document.getElementById('bookingEmail').value;

        const confirmed = confirm("Are you sure you want to confirm the booking?");

        if (confirmed) {
            alert(`Booking confirmed for ${room} from ${startDate.toDateString()} to ${endDate.toDateString()} by ${bookingName} (${bookingEmail}).`);

            const category = document.getElementById('category').value;
            switch (category) {
                case 'Family':
                    for (let date = new Date(startDate); date <= endDate; date.setDate(date.getDate() + 1)) {
                        familyRooms[parseInt(room.charAt(room.length - 1)) - 1].push([new Date(date), new Date(date)]);
                    }
                    break;
                case 'Standard':
                    for (let date = new Date(startDate); date <= endDate; date.setDate(date.getDate() + 1)) {
                        standardRooms[parseInt(room.charAt(room.length - 1)) - 1].push([new Date(date), new Date(date)]);
                    }
                    break;
                case 'Deluxe':
                    for (let date = new Date(startDate); date <= endDate; date.setDate(date.getDate() + 1)) {
                        deluxeRooms[parseInt(room.charAt(room.length - 1)) - 1].push([new Date(date), new Date(date)]);
                    }
                    break;
                case 'Executive':
                    for (let date = new Date(startDate); date <= endDate; date.setDate(date.getDate() + 1)) {
                        executiveRooms[parseInt(room.charAt(room.length - 1)) - 1].push([new Date(date), new Date(date)]);
                    }
                    break;
                default:
                    break;
            }

            bookingDetailsForm.reset();
            bookingDetailsForm.style.display = 'none';
            bookAgainButton.style.display = 'block';
            thankYouMessage.style.display = 'block';

            const formData = new FormData();
            formData.append('room', room);
            formData.append('startDate', startDate.toISOString());
            formData.append('endDate', endDate.toISOString());
            formData.append('name', bookingName);
            formData.append('email', bookingEmail);

            // Dynamically retrieve CSRF token from meta tag
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            formData.append('_token', csrfToken);

            fetch('/bookings', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => console.log(data))
                .catch(error => console.error('There was a problem with the fetch operation:', error));
        } else {
            return;
        }
    }

    bookAgainButton.addEventListener('click', function() {
        roomsContainer.innerHTML = '';
        confirmation.textContent = '';
        roomInfo.textContent = '';
        bookingDetailsForm.style.display = 'none';
        bookAgainButton.style.display = 'none';
        thankYouMessage.style.display = 'none';
    });
</script>
