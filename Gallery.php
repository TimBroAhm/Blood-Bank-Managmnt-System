<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blood Bank Photo Gallery</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }

    #container {
      max-width: 1200px;
      margin: auto;
      padding: 40px 20px;
    }

    .gallery-header {
      text-align: center;
      font-size: 32px;
      margin-bottom: 30px;
      color: #147d98;
      font-weight: 600;
    }

    .slider-container {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .slider-track {
      display: flex;
      animation: scroll 40s linear infinite;
    }

    .slide {
      flex: 0 0 auto;
      width: 300px;
      margin-right: 10px;
      transition: transform 0.3s;
    }

    .slide img {
      width: 100%;
      height: 280px; /* Enhanced height */
      object-fit: cover;
      border-radius: 10px;
      display: block;
    }

    .slide:hover {
      transform: scale(1.05);
    }

    @keyframes scroll {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }

    @media (max-width: 768px) {
      .slide {
        width: 200px;
      }

      .slide img {
        height: 380px;
      }

      .gallery-header {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>

  <div id="container">
    <h2 class="gallery-header">Blood Bank Services Photo Gallery</h2>

    <div class="slider-container">
      <div class="slider-track" id="sliderTrack">
        <!-- Slides -->
		  <div class="slide"><img src="images/ahm.jpg" alt="Gallery 0" /></div>
        <div class="slide"><img src="images/b.jpeg" alt="Gallery 1" /></div>
        <div class="slide"><img src="images/blod.jpeg" alt="Gallery 2" /></div>
        <div class="slide"><img src="images/blood.jpeg" alt="Gallery 3" /></div>
        <div class="slide"><img src="images/baan.jpeg" alt="Gallery 4" /></div>
        <div class="slide"><img src="images/bann.jpeg" alt="Gallery 5" /></div>
        <div class="slide"><img src="images/bannn.jpeg" alt="Gallery 6" /></div>
        <div class="slide"><img src="images/ba.jpeg" alt="Gallery 7" /></div>
        <div class="slide"><img src="images/bannn.jpeg" alt="Gallery 8" /></div>

        <!-- Duplicated slides for seamless loop -->
        <div class="slide"><img src="images/b.jpeg" alt="Gallery 1" /></div>
        <div class="slide"><img src="images/blod.jpeg" alt="Gallery 2" /></div>
        <div class="slide"><img src="images/blood.jpeg" alt="Gallery 3" /></div>
        <div class="slide"><img src="images/baan.jpeg" alt="Gallery 4" /></div>
      </div>
    </div>
  </div>

</body>
</html>
