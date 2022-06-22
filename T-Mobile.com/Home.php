<!DOCTYPE html>
<?php include_once("connectSQL.php")?>
<html lang="en">
<head>
<title>TRANG CHỦ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}
body {
  margin: 0;
}
/*css cho cột và hàng cho sản phẩm*/
.column {
  float: left;
  width: 20%;
  padding: 10px;
  transition: padding 0.3s;
}
.column:hover {
  padding: 4px;
  transition: padding 0.3s;
  box-shadow:0px 0px 20px -12px gray;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* css cho sản phẩm(product)*/
.product_company{height:46px}
.product_company h3{float:left;}
.product_company a{float:right}
.product_img{height:auto}
.product_img img{width:100%;height:auto;text-align: center;}
.product_inf{height:150px}
.product_inf .product_name{height:30%;font-style: monospace;font-size:17px;overflow: hidden;color:black}
.product_inf .product_price{height:25%;font-style: monospace;color:red}
.product_inf .product_review{height:45%;color:black}
.b{border: 1px solid blue}
.g{border: 1px solid green}
.r{border: 1px solid red}
.y{border: 1px solid yellow}
.star_evaluate{width:20px}

.bar_img_rotated{width:32.75%;margin:3px;background:white;border-radius:10px;padding:10px}
.img_rotated {display: none;width: 100%}

.mySlides_self {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slide-container{width:1200px;margin:auto;border:1px solid gray;padding-bottom:1px;border-radius:0px 0px 3px 3px;background}
.slideshow-container {
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: gray;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot_self {
  cursor: pointer;
  width: 100%;
  height:5px;
  margin:1px 2px;
  display: inline-block;
    text-overflow: ellipsis;
    background:#bbb;
    transition: background-color 1s ease;
}

.active, .dot:hover {
  background-color:black;
}

/* Fading animation */
.fade_self {
  -webkit-animation-name: fade_self;
  -webkit-animation-duration: 1.5s;
  animation-name: fade_self;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade_self {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade_self {
  from {opacity: .4} 
  to {opacity: 1}
}

/*thực hiện responsive khi sang thiết bị*/
@media screen and (max-width:600px) {
  .column {
    width: 50%;
  }
  .column:hover {
  width: 50%;
}
.slide-container{width:100%;padding:0;border-radius:0}
.bar_img_rotated{width:48%}
}
</style>
</head>
<body>
<?php include_once('header.php') ?>
<div class="slide-container">
<div class="slideshow-container">

<div class="mySlides_self fade_self">
  <a href="#"><img src="https://cdn.tgdd.vn/2021/10/banner/800-200-800x200-144.png" style="width:100%"></a>
</div>

<div class="mySlides_self fade_self">
<a href="#"><img src="https://cdn.tgdd.vn/2021/10/banner/renno6-seri-800-200-800x200.png" style="width:100%"></a>
</div>

<div class="mySlides_self fade_self">
<a href="#"><img src="https://cdn.tgdd.vn/2021/10/banner/A52s-800-200-800x200-4.png" style="width:100%"></a>
</div>

<div class="mySlides_self fade_self">
<a href="#"><img src="https://cdn.tgdd.vn/2021/10/banner/800-200-800x200-129.png" style="width:100%"></a>
</div>

<div class="mySlides_self fade_self">
<a href="#"><img src="https://cdn.tgdd.vn/2021/10/banner/707591B5-3FA2-4C3B-B451-9B52A4E4A2B5-800x200.png" style="width:100%"></a>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>

<div style="text-align:center;display:flex">
  <span class="dot_self" onclick="currentSlide(1)"></span> 
  <span class="dot_self" onclick="currentSlide(2)"></span> 
  <span class="dot_self" onclick="currentSlide(3)"></span>
  <span class="dot_self" onclick="currentSlide(4)"></span> 
  <span class="dot_self" onclick="currentSlide(5)"></span> 
</div>
</div>
<script>
var slideIndex = 0;
atuoshowSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides_self");
  var dots = document.getElementsByClassName("dot_self");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
function atuoshowSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides_self");
  var dots = document.getElementsByClassName("dot_self");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(atuoshowSlides, 7000); // Change image every 2 seconds
}
</script>

<div class="container" style="margin-top:30px">
<div style="border-radius:5px;background-color:#e6e6e6;padding:10px">
<div class="product_company"><h3>THÁNG NÀY CÓ GÌ!!</h3></div>
<div class="row" style="margin:0">
<div class="bar_img_rotated" onmousemove="show_rotated(event,'1')">
<img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-1.jpg" style="display:block" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-2.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-3.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-4.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-5.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-6.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-7.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-8.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-9.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-10.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-11.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-12.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-13.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-14.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-15.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-16.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-17.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-18.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-19.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-20.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-21.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-22.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-23.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-24.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-25.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-26.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-27.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-28.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-29.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-30.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-31.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-32.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-33.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-34.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-35.jpg" class="img_rotated rotated_1">
  <img src="https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org-36.jpg" class="img_rotated rotated_1">
<h5>iPhone 12 Pro Max 128GB</h5>
<span style="color:red">32.490.000đ</span>
</div>
<div class="bar_img_rotated" onmousemove="show_rotated(event,'2')">
<img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-1.jpg" style="display:block" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-2.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-3.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-4.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-5.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-6.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-7.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-8.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-9.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-10.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-11.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-12.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-13.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-14.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-15.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-16.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-17.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-18.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-19.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-20.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-21.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-22.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-23.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-24.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-25.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-26.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-27.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-28.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-29.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-30.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-31.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-32.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-33.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-34.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-35.jpg" class="img_rotated rotated_2">
  <img src="https://cdn.tgdd.vn/Products/Images/42/248284/Image360/samsung-galaxy-z-fold-3-360-org-36.jpg" class="img_rotated rotated_2">
  <h5>Samsung Galaxy Z Fold3 5G 256GB</h5>
<span style="color:red">41.990.000đ</span>
  </div>
  <div class="bar_img_rotated" onmousemove="show_rotated(event,'3')">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-1.jpg" style="display:block" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-2.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-3.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-4.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-5.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-6.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-7.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-8.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-9.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-10.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-11.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-12.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-13.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-14.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-15.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-16.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-17.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-18.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-19.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-20.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-21.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-22.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-23.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-24.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-25.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-26.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-27.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-28.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-29.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-30.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-31.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-32.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-33.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-34.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-35.jpg" class="img_rotated rotated_3">
  <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Image360/oppo-reno5-org-36.jpg" class="img_rotated rotated_3">
  <h5>OPPO Reno5</h5>
<span style="color:red">8.190.000đ</span>
    </div>
  </div>
</div>
<script>
var rotatedIndex = [0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
var coordinates = 0;

function show_rotated(e,f){
  var x = e.clientX;
  if(x%1==0){
    var i;
  var rotateds = document.getElementsByClassName("rotated_"+f+"");
  for (i = 0; i < rotateds.length; i++) {
    rotateds[i].style.display = "none";  
  }
  if(x > coordinates){
  rotatedIndex[f]++;
  if (rotatedIndex[f] > rotateds.length) {rotatedIndex[f] = 1}    
  rotateds[rotatedIndex[f]-1].style.display = "block";  
  }else{
    rotatedIndex[f]--;
  if (rotatedIndex[f] == 0) {rotatedIndex[f] = rotateds.length}   
  rotateds[rotatedIndex[f]-1].style.display = "block";  
  }
  coordinates=x;
}
  }
</script>

<hr>  
<div class="product_company"><h3>Điện thoại</h3><a href="muc_luc.php?hang=ALL&page=0">Xem tất cả</a></div>
<div class="row">
<?php
$query_1=mysqli_query($conn,"SELECT * from phone ORDER by id DESC");
$i_1=1;
while($i_1<=5 && $row = mysqli_fetch_array($query_1)){
$img_main=mysqli_query($conn,"SELECT * FROM `img_phone` WHERE `id_phone`='".$row['id_phone']."'");
    ?>
<div class="column">
  <a style="text-decoration: none;" href="chi_tiet_san_pham.php?hang=<?php echo $row['hang']?>&ten=<?php echo $row['ten']?>">
<div class="product_img">
  <img class="" src="<?php echo $row['img_chinh'] ?>">
</div>
<div class="product_inf">
<div class="product_name"><?php echo $row['ten']?></div>
<div class="product_price"><span><?php echo number_format($row['gia'], 0, ',', '.')?>đ</span></div>
<div class="product_review">
  <span style="font-size:12px">giảm 22.300.000.000đ, mới, hết hàng, gần hết hàng</span><br>
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
</div>
</div>
</a> 
</div>
<?php
$i_1++;
}
?>
</div>

<hr>
  <div class="product_company"><h3>Samsung</h3><a href="muc_luc.php?hang=Samsung&page=0">Xem tất cả</a></div>
<div class="row">
<?php
$query_1=mysqli_query($conn,"SELECT * from phone WHERE `hang`='Samsung' ORDER by id DESC");
$i_1=1;
while($i_1<=5 && $row = mysqli_fetch_array($query_1)){
$img_main=mysqli_query($conn,"SELECT * FROM `img_phone` WHERE `id_phone`='".$row['id_phone']."'");
    ?>
<div class="column">
  <a style="text-decoration: none;" href="chi_tiet_san_pham.php?hang=<?php echo $row['hang']?>&ten=<?php echo $row['ten']?>">
<div class="product_img">
  <img class="" src="<?php echo $row['img_chinh'] ?>">
</div>
<div class="product_inf">
<div class="product_name"><?php echo $row['ten']?></div>
<div class="product_price"><span><?php echo number_format($row['gia'], 0, ',', '.')?>đ</span></div>
<div class="product_review">
  <span style="font-size:12px">giảm 22.300.000.000đ, mới, hết hàng, gần hết hàng</span><br>
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
</div>
</div>
</a> 
</div>
<?php
$i_1++;
}
?>
</div>

<hr>

<div class="product_company"><h3>iPhone</h3><a href="muc_luc.php?hang=iPhone&page=0">Xem tất cả</a></div>
<div class="row">
<?php
$query_1=mysqli_query($conn,"SELECT * from phone WHERE `hang`='iPhone' ORDER by id DESC");
$i_1=1;
while($i_1<=5 && $row = mysqli_fetch_array($query_1)){
    ?>
<div class="column">
  <a style="text-decoration: none;" href="chi_tiet_san_pham.php?hang=<?php echo $row['hang']?>&ten=<?php echo $row['ten']?>">
<div class="product_img">
  <img class="" src="<?php echo $row['img_chinh'] ?>">
</div>
<div class="product_inf">
<div class="product_name"><?php echo $row['ten']?></div>
<div class="product_price"><span><?php echo number_format($row['gia'], 0, ',', '.')?>đ</span></div>
<div class="product_review">
  <span style="font-size:12px">giảm 22.300.000.000đ, mới, hết hàng, gần hết hàng</span><br>
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
</div>
</div>
</a> 
</div>
<?php
$i_1++;
}
?>
</div>

<hr>

<div class="product_company"><h3>OPPO</h3><a href="muc_luc.php?hang=OPPO&page=0">Xem tất cả</a></div>
<div class="row">
<?php
$query_1=mysqli_query($conn,"SELECT * from phone WHERE `hang`='OPPO' ORDER by id DESC");
$i_1=1;
while($i_1<=5 && $row = mysqli_fetch_array($query_1)){
$img_main=mysqli_query($conn,"SELECT * FROM `img_phone` WHERE `id_phone`='".$row['id_phone']."'");
    ?>
<div class="column">
  <a style="text-decoration: none;" href="chi_tiet_san_pham.php?hang=<?php echo $row['hang']?>&ten=<?php echo $row['ten']?>">
<div class="product_img">
  <img class="" src="<?php echo $row['img_chinh'] ?>">
</div>
<div class="product_inf">
<div class="product_name"><?php echo $row['ten']?></div>
<div class="product_price"><span><?php echo number_format($row['gia'], 0, ',', '.')?>đ</span></div>
<div class="product_review">
  <span style="font-size:12px">giảm 22.300.000.000đ, mới, hết hàng, gần hết hàng</span><br>
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
</div>
</div>
</a> 
</div>
<?php
$i_1++;
}
?>
</div>
<hr>
</div>
<?php include_once("footer.html") ?>
</body>
</html>
