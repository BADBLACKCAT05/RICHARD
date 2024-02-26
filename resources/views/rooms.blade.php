@extends('layout')
@section('title', 'rooms')
@section('content')
@include('include.nav')
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photo Gallery</title>
  <style>
 body {
    margin-top: 100px;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
        display: flex;
        flex-direction: column;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
     .gallery-container {
        margin-top: 100px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center; /* Center the content horizontally */
    }

    .gallery {
      width: 45%; /* Adjust width to make two columns */
      border: 2px solid #333; /* Add border style */
      margin: 10px;
    }

    .gallery-images {
      display: flex;
      flex-wrap: wrap;
    }

    .gallery-image {
      width: 100px; /* Adjust image width as needed */
      height: auto;
      margin: 5px;
    }

    .gallery-description {
      padding: 10px;
    }
    .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 50%; /* Center horizontally */
  top: 60%; /* Center vertically */
  transform: translate(-50%, -50%); /* Center the modal */
  width: 70%; /* Adjust width */
  height: 70%; /* Adjust height */
  background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
  overflow: auto;
}


.modal-content {
  margin: auto; /* Center horizontally */
  display: block;
  max-width: 80%;
  max-height: 80%;
  position: absolute; /* Position absolutely within the modal */
  top: 50%; /* Center vertically */
  left: 50%; /* Center horizontally */
  transform: translate(-50%, -50%); /* Center the content */
}



    .close {
      color: #fff;
      font-size: 40px;
      position: absolute;
      top: 10px;
      right: 25px;
      cursor: pointer;
    }


    .nav-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: transparent;
      border: none;
      color: white;
      font-size: 24px;
      cursor: pointer;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }
 .gallery-description {
      padding: 10px;
      background-color: #008080; /* Background color for the description */
    }

    .gallery-description h1 {
      color: #ffffff; /* Text color for h1 */
    }

    .gallery-description h2 {
      color: #ffffff; /* Text color for h2 */
    }


  </style>
</head>
<body>
  <div class="gallery-container">
    <div class="gallery">
      <div class="gallery-images">
        <img src="1.jpg" alt="Image 1" class="gallery-image">
        <img src="2.jpg" alt="Image 2" class="gallery-image" style="display: none;">
        <img src="3.jpg" alt="Image 3" class="gallery-image" style="display: none;">
        <!-- Add more images as needed -->
      </div>
      <div class="gallery-description">
        <h1>Family Room</h1>
        <p><h2>Description:</h2>
          Bring the whole crew and make memories in our family rooms! Spacious and vibrant, these rooms are perfect for families or groups looking for a comfortable stay with all the essential amenities.</p>
        <br></br>
        <h2>Features & Amenities:</h2>
        <ul>
          <li>King-sized bed for parents and twin beds for the kids</li>
          <li>Fun flat-screen TV with children's channels</li>
          <li>Mini-fridge for snacks and drinks</li>
          <li>Free Wi-Fi to keep everyone connected</li>
          <li>Connecting rooms available for larger families</li>
          <br></br>
        </ul>  
      </div>
    </div>
    
    <div class="gallery">
      <div class="gallery-images">
        <img src="1.jpg" alt="Image 1" class="gallery-image">
        <img src="2.jpg" alt="Image 2" class="gallery-image" style="display: none;">
        <img src="3.jpg" alt="Image 3" class="gallery-image" style="display: none;">
        <!-- Add more images as needed -->
      </div>
      <div class="gallery-description">
        <h1>Standard Room</h1>
        <p><h2>Description:</h2>
          Enjoy a comfortable stay in our standard rooms! Perfect for individuals or couples, these rooms offer all the essential amenities for a relaxing experience.</p>
        <br></br>
        <h2>Features & Amenities:</h2>
        <ul>
          <li>Queen-sized bed</li>
          <li>Flat-screen TV with various channels</li>
          <li>Complimentary coffee and tea</li>
          <li>Work desk and chair</li>
          <li>En-suite bathroom with shower</li>
		<br></br>
        </ul>  
      </div>
    </div>
    
    <div class="gallery">
      <div class="gallery-images">
        <img src="1.jpg" alt="Image 1" class="gallery-image">
        <img src="2.jpg" alt="Image 2" class="gallery-image" style="display: none;">
        <img src="3.jpg" alt="Image 3" class="gallery-image" style="display: none;">
        <!-- Add more images as needed -->
      </div>
      <div class="gallery-description">
        <h1>Deluxe Room</h1>
        <p><h2>Description:</h2>
          Experience luxury in our deluxe rooms! These spacious and elegantly designed rooms offer a premium stay with top-notch amenities and personalized services.</p>
        <br></br>
        <h2>Features & Amenities:</h2>
        <ul>
          <li>King-sized bed with premium bedding</li>
          <li>Separate living area with sofa and coffee table</li>
          <li>Private balcony with panoramic views</li>
          <li>Luxurious bathroom with bathtub and shower</li>
          <li>24-hour room service</li>
          <li>Access to exclusive lounge and facilities</li>
           <br></br>
        </ul>  
      </div>
    </div>
    
    <div class="gallery">
      <div class="gallery-images">
        <img src="1.jpg" alt="Image 1" class="gallery-image">
        <img src="2.jpg" alt="Image 2" class="gallery-image" style="display: none;">
        <img src="3.jpg" alt="Image 3" class="gallery-image" style="display: none;">
        <!-- Add more images as needed -->
      </div>
      <div class="gallery-description">
        <h1>Executive Room</h1>
        <p><h2>Description:</h2>
          Indulge in the ultimate comfort and luxury with our executive rooms! These sophisticated and spacious rooms offer a serene retreat with exclusive amenities and personalized services.</p>
        <br></br>
        <h2>Features & Amenities:</h2>
        <ul>
          <li>King-sized bed with plush bedding</li>
          <li>Private study or work area</li>
          <li>State-of-the-art entertainment system</li>
          <li>Complimentary access to fitness center and spa</li>
          <li>Personalized concierge service</li>
          <li>Complimentary breakfast and evening cocktails</li>
          <br></br>
        </ul>  
      </div>
    </div>
    
    <div id="modal1" class="modal">
      <button class="nav-button prev" onclick="prevImage(1)">&#10094;</button>
      <span class="close" onclick="hideModal(1)">&times;</span>
      <button class="nav-button next" onclick="nextImage(1)">&#10095;</button>
      <img src="" id="modal-image1" class="modal-content">
    </div>
  </div>

  <script>
    const galleryImages1 = document.querySelectorAll('.gallery:nth-child(-n+4) .gallery-image');
    const modal1 = document.getElementById('modal1');
    const modalImage1 = document.getElementById('modal-image1');

    let currentImageIndex1 = 0;

    galleryImages1.forEach((image, index) => {
      image.addEventListener('click', () => {
        showModal(index, 1);
      });
    });

    function showModal(index, modalNumber) {
      const modal = modalNumber === 1 ? modal1 : modal2;
      const modalImage = modalNumber === 1 ? modalImage1 : modalImage2;
      const galleryImages = modalNumber === 1 ? galleryImages1 : galleryImages2;
      modal.style.display = 'block';
      modalImage.src = galleryImages[index].src;
      currentImageIndex1 = index;
      document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
    }

    function hideModal(modalNumber) {
      const modal = modalNumber === 1 ? modal1 : modal2;
      modal.style.display = 'none';
      document.body.style.overflow = ''; // Allow scrolling again when modal is closed
    }

    function nextImage(modalNumber) {
      const galleryImages = modalNumber === 1 ? galleryImages1 : galleryImages2;
      let currentImageIndex = modalNumber === 1 ? currentImageIndex1 : currentImageIndex2;
      currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
      showModal(currentImageIndex, modalNumber);
    }

    function prevImage(modalNumber) {
      const galleryImages = modalNumber === 1 ? galleryImages1 : galleryImages2;
      let currentImageIndex = modalNumber === 1 ? currentImageIndex1 : currentImageIndex2;
      currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
      showModal(currentImageIndex, modalNumber);
    }
  </script>
</body>
</html>
