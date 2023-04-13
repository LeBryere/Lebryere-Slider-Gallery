<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
	<title>Lebryere Slider Gallery</title>
	<meta property="og:title" content="Lebryere Slider Gallery"/>
	<meta property="og:url" content="https://lebryere.com"/>
	<meta property="og:site_name" content="Lebryere Slider Gallery"/>
	<meta property="og:type" content="article"/>	
	<meta property="og:description" content="Gallerey, Slider, responzive, responzive Gallerey, responzive Slider"/>
	<meta name="description" content="Gallerey, Slider, responzive, responzive Gallerey, responzive Slider"/>
	<meta name="keywords" content="Gallerey, Slider, responzive, responzive Gallerey, responzive Slider"/>
	<meta property="og:image" content="https://lebryere.com/img/open_graph.jpg"/>	
	<meta name="author" content="LeBryere">
	
	<link rel="shortcut icon" type="image/ico" href="favicon.png"/>
	<link rel="icon" href="favicon.png"/>

	<link rel="stylesheet" href="assets/css/preload.css">
	<link rel="stylesheet" href="assets/css/style.min_gall.css">
	<link rel="stylesheet" href="assets/css/style-gall.css">
	<link rel="stylesheet" href="assets/css/lightgallery.css">
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>

<!-- Preload loading  -->
<div class="preloader-svg">
	<svg id="loaderSvg" class="loader__svg" xmlns="http://www.w3.org/2000/svg" height="300" viewBox="0 0 1024 300">
		<div id="loader"></div>
	</svg>
</div>

<section>
	<div class="row gallery-single" data-thumb="true">
		<div class="container-fluid clearfix">
			<?php			
				// The getAlt function returns the name of the image file without the '.jpg' extension.
				function getAlt($src) {
					$filename = basename($src, ".png");
					return $filename;
				}				           
				// With the glob function, it searches for all '.jpg' files in the 'images' directory.
				$images = glob("./assets/images/*.png");
				// Selecting a random file
				shuffle($images);
				// A foreach loop iterates through all images and creates the corresponding HTML elements for them.
				foreach ($images as $image) {
					echo 
					'<a href="'.$image.'" class="gallery-item bag">
						<img data-lazy src="'.$image.'" alt="Benitobag '.getAlt($image).' Women`s bag">
					</a>';
				}
				echo '</div>';
			?>																					
		</div>
	</div>

</section>

<script>
// Set the image index to 0
var index = 0;
// Get all image paths
var images = document.querySelectorAll(".gallery-item img");
// Set the image interval to 5 seconds
var interval = 4000;
// Variable to store the interval ID
var intervalID;
// Function to switch the images
function switchImage() {
    // Increment the index
    index++;
    // If its the last image, start over
    if (index >= images.length) {
        index = 0;
    }
    // Set the transform of all the image elements with the "gallery-item" class
    var imageElements = document.querySelectorAll(".gallery-item img");
    for (var i = 0; i < imageElements.length; i++) {
        imageElements[i].style.transition = "transform 1.5s ease-in-out";
		  if (window.innerWidth <= 767) {
            imageElements[i].style.transform = "translateX(calc(-50vw + .5rem))";
        }else if (window.innerWidth >= 768 && window.innerWidth <= 1024) {
            imageElements[i].style.transform = "translateX(calc(-33.3vw + .5rem))";
        } else {
            imageElements[i].style.transform = "translateX(calc(-25vw + .5rem)";
        }
    }
    // Reset the transformations after .5s
    setTimeout(function() {
        for (var i = 0; i < imageElements.length; i++) {
            imageElements[i].style.transition = "none";
            imageElements[i].style.transform = "translateX(0)";
        }
        // Move the first image to the end of the list
        var firstImage = document.querySelector(".gallery-item:first-of-type");
        var lastImage = document.querySelector(".gallery-item:last-of-type");
        lastImage.after(firstImage);
    }, 1500);
    // Wait for the interval before switching to the next image
    intervalID = setTimeout(switchImage, interval);
}
// Start switching the images
intervalID = setTimeout(switchImage, interval);

// Add mouseover and mouseout event listeners to the image elements
for (var i = 0; i < images.length; i++) {
    images[i].addEventListener("mouseover", function() {
        clearTimeout(intervalID);
    });
    images[i].addEventListener("mouseout", function() {
        intervalID = setTimeout(switchImage, interval);
    });
}
</script>

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/foxlazy.min.js"></script>
	<script src="assets/js/jquery.fitvids.min.js"></script>
	<script src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="assets/js/lightgallery.min.js"></script>
	<script src="assets/js/thumbnails-popup.min.js"></script>
	<script src="assets/js/scrollMonitor.min.js"></script>
	<script src="assets/js/equalHeightsPlugin.min.js"></script>
	<script src="assets/js/modernizr-2.6.2.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/slider-transition.min.js"></script>
	<script src="assets/js/script.js"></script>

</body>
</html>