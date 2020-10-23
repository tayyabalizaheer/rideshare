<?php
header("Content-Type:text/css");
$color = "#f0f"; // Change your Color Here

function checkhexcolor($color)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color OR !checkhexcolor($color)) {
    $color = "#336699";
}

?>


@import url('https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i');

/*-----------------------------------------------------------------

Project             : Velra - Travel Transport Business Template.
Version             : 1.0
Author              : Thesoftking
Front-end developer : Mamunur Rashid
-------------------------------------------------------------------*/

/*------------------------------------------------------------------

[Table of contents]

1. Common Css Start
2. Site Preloader
3. main menu css start
4 banner css start
5 Header Search Area Css start
6 Whay Choose Us
7 Popular Tours Start
8 popular Destinations Start
9 Our Offers Area Start
10 Select Offers Area Start
11 Top  travelling Area Start
12 popular Torisum Countries Area start
13 Latest News Area Start
14 footer part css
15 INDEX 2 CSS START
-nav part star
-choose-us area start
-Control Travel Area Start
-our services area start
-Special Service Area css Start
-traveling Offer area Start
-Pro Services area Start
-clint review area start
-Gallery Area Start
16 Click BottomToTop



-------------------------------------------------------------------*/

/* ====================================
Common Css Start
======================================= */
html,
body {
width: 100%;
height: auto;
margin: 0;
padding: 0;
overflow-x: hidden;
position: relative
}

body {
font-family: 'Poppins', sans-serif;
font-weight: 400;
color: #242424;
}

ul {
list-style: none;
margin: 0;
padding: 0
}

a,
a:visited,
a:focus,
a:active,
a:hover {
text-decoration: none;
outline: none;
}

a,
button {
-webkit-transition: 0.3s;
transition: 0.3s
}

a {
color: #2c3e50;
}

h1,
h2,
h3,
h4,
h5,
h6 {
color: #242424;
margin-bottom: 0px;
}

h2 {
font-size: 36px;
font-weight: 600;
}

h3 {
font-size: 24px;
font-weight: 600;
}

h4 {
font-size: 18px;
font-weight: 600;
}

h5 {
font-size: 15px;
font-weight: 600;
}

p {
font-size: 15px;
line-height: 24px;
font-weight: 400;
margin-bottom: 0px;
}

a {
font-size: 15px;
font-weight: 600;
margin-bottom: 0px;
}

.error{color: rgba(255,50,36,0.8)}

.padding-left-0 {
padding-left: 0; }

.padding-right-0 {
padding-left: 0; }

.padding-top-10 {
padding-top: 10px; }

.padding-top-20 {
padding-top: 20px; }

.padding-top-30 {
padding-top: 30px; }

.padding-top-40 {
padding-top: 40px; }

.padding-top-50 {
padding-top: 50px; }

.padding-top-60 {
padding-top: 60px; }

.padding-top-70 {
padding-top: 70px; }

.padding-top-80 {
padding-top: 80px; }

.padding-top-90 {
padding-top: 90px; }

.padding-top-100 {
padding-top: 100px; }

.margin-top-10 {
margin-top: 10px; }

.margin-top-20 {
margin-top: 20px; }

.margin-top-30 {
margin-top: 30px; }

.margin-top-40 {
margin-top: 40px; }

.margin-top-50 {
margin-top: 50px; }

.margin-top-60 {
margin-top: 60px; }

.margin-top-70 {
margin-top: 70px; }

.margin-top-80 {
margin-top: 80px; }

.margin-top-90 {
margin-top: 90px; }

.margin-top-100 {
margin-top: 100px; }

.margin-bottom-0 {
margin-bottom: 0px !important; }

.margin-bottom-5 {
margin-bottom: 5px; }

.margin-bottom-10 {
margin-bottom: 10px; }


.margin-bottom-15 {
margin-bottom: 15px; }

.margin-bottom-20 {
margin-bottom: 20px; }

.margin-bottom-30 {
margin-bottom: 30px; }

.margin-bottom-40 {
margin-bottom: 40px; }

.margin-bottom-50 {
margin-bottom: 50px; }

.margin-bottom-60 {
margin-bottom: 60px; }

.margin-bottom-70 {
margin-bottom: 70px; }

.margin-bottom-80 {
margin-bottom: 80px; }

.margin-bottom-90 {
margin-bottom: 90px; }

.margin-top-100 {
margin-bottom: 100px; }

.margin-top-120 {
margin-top: 120px; }

.padding-left-0 {
padding-left: 0px !important; }



.mamunur_rashid_t_mt_30 {
margin-top: 30px;
}

.form-control:focus {
color: #495057;
background-color: #fff;
border-color: #80bdff83;
outline: 0;
box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0);
}

.custom-select:focus {
border-color: #80bdff57;
outline: 0;
box-shadow: 0 0 0 0.2rem rgba(128, 189, 255, 0);
}

.section-heading::before {
position: absolute;
content: " ";
width: 80px;
height: 5px;
top: 69px;
left: 50%;
transform: translateX(-50%);
background: <?php echo $color ?>;
border-radius: 30px;
}


.navbar-brand img{
max-width: 220px;
max-height: 40px;
}
.f-logo img{
max-height: 65px;
}

/* ====================================
Common Css End
======================================= */
/*=====================================
Site Preloader
=======================================*/
.site-preloader {
background-color: <?php echo $color ?>;
height: 100%;
left: 0;
position: fixed;
top: 0;
width: 100%;
z-index: 9999999;
}

.site-preloader .spinner {
width: 60px;
height: 60px;
margin: 21% auto;
background-color: #fff;
border-radius: 100%;
-webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
animation: sk-scaleout 1.0s infinite ease-in-out;
}

@-webkit-keyframes sk-scaleout {
0% {
-webkit-transform: scale(0)
}

100% {
-webkit-transform: scale(1.0);
opacity: 0;
}
}

@keyframes sk-scaleout {
0% {
-webkit-transform: scale(0);
transform: scale(0);
}

100% {
-webkit-transform: scale(1.0);
transform: scale(1.0);
opacity: 0;
}
}

/* =============================================
main menu css start
================================================ */
#main-menu nav {
background: rgba(0, 0, 0, 0.5);
}

#main-menu nav.navbar-fixed {
position: fixed;
top: 0px;
left: 0px;
background: #242424;
z-index: 1000;
-webkit-box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.30);
-moz-box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.30);
-ms-box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.30);
-o-box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.30);
box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.30);
}

#main-menu nav.navbar-fixed ul li a {
line-height: 35px;
}

#main-menu .navbar {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 50px;
z-index: 999;
padding: 0 !important;
}

#main-menu .nav-link {
line-height: 50px;
color: #fff;
font-size: 15px;
font-weight: 400;
text-transform: capitalize;
letter-spacing: .5px;
padding: 12px 12px !important;
transition: all linear .3s;
position: relative;
}

#main-menu .navbar-nav li a:hover {
color: <?php echo $color ?>;
background: none;
}
.chat-bubble--left{
	background: <?php echo $color ?>!important;
}
#main-menu .navbar-toggler-icon {
background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(255, 255, 255)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

#main-menu .navbar-toggler {
padding: 10px 15px 10px 0;
}

#main-menu .navbar-toggler:not(:disabled):not(.disabled) {
outline: 0;
}


.mamunur_rashid_top_book_btn {
color: #fff;
background: <?php echo $color ?>;
border: 2px solid <?php echo $color ?>;
padding: 10px 20px;
border-radius: .25rem;
margin-left: 50px;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

.mamunur_rashid_top_book_btn:hover {
color: #fff;
background: transparent;
border: 2px solid <?php echo $color ?>;
}

#main-menu nav .navbar-nav .nav-item .nav-link.active::before {
position: absolute;
content: " ";
width: 0;
height: 0;
border-left: 12px solid transparent;
border-right: 12px solid transparent;
border-bottom: 12px solid <?php echo $color ?>;
z-index: 1;
left: 50%;
bottom: 0%;
transform: translateX(-50%);
}

/* ===== menu css end ===== */
/* =======================================
banner css start
======================================= */
#banner {
height: 100vh;
position: relative;
background: url(../../images/logo/breadcrumb.jpg) no-repeat center;
background-size: cover;
background-attachment: fixed;
}

.overly {
position: absolute;
height: 100%;
width: 100%;
left: 0;
top: 0;
background: rgba(0, 0, 0, 0.7);
}

#banner .banner_slider {
height: 100vh;
width: 100%;
position: relative;
}

#banner .banner_slider .banner_info {
position: absolute;
content: '';
top: 50%;
left: 50%;
color: #fff;
text-align: center;
transform: translate(-50%, -50%);
width: 100%;
margin-top: -38px;
}

#banner .banner_info h4 {
font-size: 40px;
font-weight: 600;
font-style: italic;
color: #ffffff;
}

#banner .banner_info h2 {
padding-bottom: 5px;
font-size: 70px;
font-weight: 600;
font-style: italic;
color: <?php echo $color ?>;
margin-bottom: 0px;
}

#banner .banner_info p {
font-size: 18px;
}

/* ==============================
Header Search Area Css start
====================================*/
#banner .h-seaerch-area {
position: absolute;
bottom: 0px;
width: 100%;
text-align: center;
}

.index-1 #banner .h-seaerch-area .nav-tabs {
text-align: center;
display: inline-block;
border-radius: .25rem .25rem 0 0;
}

.index-1 #banner .h-seaerch-area .nav-tabs .nav-item.nav-link {
text-align: center;
display: inline-block;
font-size: 18px;
font-weight: 400;
}

.index-1 #banner .h-seaerch-area .tab-content {
box-shadow: -1px 3px 23px #00000021;
}

.index-1 #banner .h-seaerch-area .normal {
padding: 30px 35px;
border-radius: .25rem .25rem;
background: #fff;
}

.index-1 #banner .h-seaerch-area .advance-c {
padding: 30px 35px;
border-radius: .25rem .25rem;
background: #fff;
}



.index-1 .h-seaerch-area .normal-t{
background-color: <?php echo $color ?>;
color: #fff;
}


.index-1 .h-seaerch-area nav-link.normal-t.active.show{
background-color: #fff;
color: #242424!important;
}





.index-1 #banner .h-seaerch-area .nav-tabs {
border-bottom: 0px solid #dee2e6;
}

.index-1 .nav-tabs .nav-link.active {
background-color: rgb(255, 255, 255);
color: #242424;
}

.index-1 .nav-tabs .nav-link:hover {
background-color: rgb(255, 255, 255);
color: #242424;
}


.index-1 .nav-tabs .nav-link {
color: #fff;
background:<?php echo $color ?>;
}

.index-1 .h-serch {
cursor: pointer;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}
.index-1 .h-serch:hover{
background: <?php echo $color ?>;
border-color: <?php echo $color ?>;
color: #fff;
}
/* =========== Whay Choose Us css Start ============  */
#choose-us {
padding: 92px 0px 97px;
}

#choose-us .section-heading {
margin-bottom: 54px;
position: relative;
}

#choose-us .section-paragraph {
margin-bottom: 15px;
}

#choose-us h4 {
font-weight: 600;
margin-bottom: 10px;
}

#choose-us .c-box {
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#choose-us .c-box i {
margin-top: 30px;
margin-bottom: 12px;
border: 1px dotted #565656;
width: 60px;
height: 60px;
line-height: 60px;
text-align: center;
font-size: 30px;
border-radius: 50%;
color: <?php echo $color ?>;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#choose-us .c-box:hover i {
background: <?php echo $color ?>;
color: #fff;
border-color: <?php echo $color ?>;
}

/* ========================================
Popular Tours Start
=========================================*/
#popular_turs {
padding: 92px 0px 100px;
background: url(../../images/logo/tour_bg.jpg) no-repeat center;
background-size: cover;
background-attachment: fixed;
position: relative;
}

#popular_turs > .overly {
background: rgba(0, 0, 0, .7);
}

#popular_turs .section-heading {
margin-bottom: 54px;
position: relative;
color: #fff;
}

#popular_turs .section-paragraph {
margin-bottom: 45px;
color: #fff;
}

#popular_turs .c-box {
background: #fff;
border-radius: .25rem;
}

#popular_turs .c-box:focus {
outline: 0px;
}

#popular_turs .b-c li {
display: inline-block;
}

#popular_turs .b-c .span {
padding: 0px 10px;
display: inline-block;
}

#popular_turs .b-c {
color: #878787;
padding-top: 7px;
}

#popular_turs .c-box article {
padding: 23px 20px 26px;
}

#popular_turs .c-box article .footer {
margin-top: 12px;
}

#popular_turs .c-box article .footer a {
border: 1px solid <?php echo $color ?>;
padding: 10px 25px;
border-radius: .25rem;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#popular_turs .c-box article .footer a:hover {
background: <?php echo $color ?>;
border-color: <?php echo $color ?>;
color: #fff;
}

#popular_turs .c-box article .footer span {
font-size: 24px;
font-weight: 400;
color: <?php echo $color ?>;
}

#popular_turs .c-box article p {
margin: 7px 0px 5px;
}

#popular_turs .slick-prev {
left: -90px;
}

#popular_turs .slick-next {
right: -90px;
}

.slick-initialized .slick-slide:focus {
outline: 0px;
}

/* ==================================
popular Destinations Start
===================================== */
#popular_destinations {
padding: 92px 0px 100px;
}

#popular_destinations .section-heading {
margin-bottom: 54px;
position: relative;
}

#popular_destinations .section-paragraph {
margin-bottom: 45px;
}

#popular_destinations .c-box {
position: relative;
}

#popular_destinations .c-box article {
position: absolute;
bottom: 0px;
color: #fff;
width: 100%;
background: rgba(0, 0, 0, 0.8);
padding: 40px 20px 40px;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#popular_destinations .c-box span {
font-size: 18px;
margin-bottom: 5px;
}

#popular_destinations .c-box p {
color: <?php echo $color ?>;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#popular_destinations .c-box .v-a {
position: absolute;
bottom: -100px;
color: #fff;
font-weight: 400;
font-size: 15px;
left: 20px;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#popular_destinations .c-box:hover article {
background: #356bd8e8;
}

#popular_destinations .c-box:hover article .v-a {
bottom: 12px;
}

#popular_destinations .c-box:hover article p {
color: #fff;
}

/* ===============================
Our Offers Area Start
================================= */
#offers {
background: url(../img/offer/bg.jpg) no-repeat center;
background-size: cover;
padding: 92px 0px 100px;
position: relative;
}

.overly-2 {
position: absolute;
height: 100%;
width: 100%;
left: 0;
top: 0;
background: #001e72c7;
}

#offers h2,
#offers p,
#offers a {
color: #fff;
}
#offers h2{
margin-bottom: 10px;
}
#offers a {
font-size: 18px;
font-weight: 400;
background: <?php echo $color ?>;
padding: 12px 40px;
border-radius: .25rem;
display: inline-block;
margin-top: 25px;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#offers a i {
color: #fff;
opacity: 0;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#offers a:hover i {
opacity: 1;
padding-left: 10px;
}

/* =====================================
Select Offers Area Start
======================================== */
#select_offer {
padding: 92px 0px 89px;
}

#select_offer .section-heading {
margin-bottom: 54px;
position: relative;
}

#select_offer .section-paragraph {
margin-bottom: 45px;
}

#select_offer .c-box p {
font-size: 18px;
}

#select_offer .c-box i {
font-size: 30px;
border: 1px dotted <?php echo $color ?>;
height: 70px;
width: 70px;
line-height: 70px;
text-align: center;
border-radius: 50%;
margin-bottom: 10px;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#select_offer .c-box span {
font-size: 24px;
font-weight: 600;
}

#select_offer .c-box:hover i {
background: <?php echo $color ?>;
color: #fff;
}

/* =====================================
Top  travelling Area Start
======================================== */
#top_travell {
padding: 93px 0px 100px;
background: url(../img/popular-turs/top-p-bg.png) no-repeat center;
background-size: cover;
background-attachment: fixed;
position: relative;
}

#top_travell .section-heading {
margin-bottom: 54px;
position: relative;
color: #fff;
}

#top_travell .section-paragraph {
margin-bottom: 45px;
color: #fff;
}

#top_travell .c-box {
background: #fff;
border-radius: .25rem;
text-align: center;
}

#top_travell .c-box:focus {
outline: 0px;
}

#top_travell .c-box article {
padding: 0px 20px 31px;
}

#top_travell .c-box .img {
width: 100%;
height: 225px;
display: inline-block !important;
text-align: center;
position: relative;
}

#top_travell .c-box .img img {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

#top_travell .c-box article h4 {
font-size: 24px;
}
#top_travell .c-box article p{
margin: 10px 0px;
}
#top_travell .slick-prev {
left: -90px;
}

#top_travell .slick-next {
right: -90px;
}

.slick-initialized .slick-slide:focus {
outline: 0px;
}

/* =====================================
popular Torisum Countries Area start
======================================== */
#popular_tur {
padding: 92px 0px 100px;
}

#popular_tur .section-heading {
margin-bottom: 54px;
position: relative;
}

#popular_tur .section-paragraph {
margin-bottom: 45px;
}

#popular_tur .c-box {
border-radius: .25rem;
text-align: center;
}

#popular_tur .p-t-c-m .media {
box-shadow: 0px 0px 25px #33333330;
padding: 15px;
}

#popular_tur .p-t-c-m .media h5 {
margin-bottom: 10px;
}

#popular_tur .p-t-c-m .media a {
color: <?php echo $color ?>;
font-weight: 400;
margin-top: 10px;
display: inline-block;
}

#popular_tur .newsletter .n-box {
background: url(../img/torisumCountries/neweslatter.png) no-repeat center;
background-size: cover;
padding: 55px 20px 56px;
position: relative;
}

#popular_tur .newsletter .n-box article {
position: inherit;
z-index: 9;
}

.newsletter .n-box h4,
.newsletter .n-box h3,
.newsletter .n-box p {
color: #fff;
}

.newsletter .n-box .mamunur_rashid_form {
width: 100%;
border: 1px solid #2c3e50;
padding: 15px 15px;
background: none;
border-radius: .25rem;
margin-top: 15px;
color: #f2f2f2;
}

.newsletter .n-box .mamunur_rashid_form:focus {
outline: 0px;
}

.newsletter .n-box .mamunur_rashid_form.mr-btn {
font-weight: 600;
background: <?php echo $color ?>;
border-color: <?php echo $color ?>;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

.newsletter .n-box .mamunur_rashid_form.mr-btn:hover {
background: #001e72;
border-color: #001e72;
}

/* ==========================================
Latest News Area Start
============================================= */
#latest_news {
padding: 92px 0px 100px;
background: #f4f4f4;
}

#latest_news .section-heading {
margin-bottom: 54px;
position: relative;
}

#latest_news .section-paragraph {
margin-bottom: 45px;
}

#latest_news .c-box {
background: #fff;
border-radius: .25rem;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#latest_news .c-box:hover {
box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.219);
}

#latest_news .c-box:focus {
outline: 0px;
}

#latest_news .b-c li {
display: inline-block;
}

#latest_news .b-c .span {
padding: 0px 10px;
display: inline-block;
}

#latest_news .b-c {
color: #878787;
margin-top: 8px;
}

#latest_news .c-box article {
padding: 23px 20px 26px;
}

#latest_news .c-box article .footer {
margin-top: 12px;
}

#latest_news .c-box a h4 {
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#latest_news .c-box a:hover h4 {
color: <?php echo $color ?>;
}

#latest_news .c-box article p {
margin: 7px 0px 5px;
}

/* =====================
footer part css
==================== */
.theme-footer-one .top-footer {
background: #0c0d0f;
padding: 95px 0 87px 0;
}

.theme-footer-one a:hover {
color: #ffc412;
}

.d-flex {
display: -webkit-box !important;
display: -ms-flexbox !important;
display: flex !important
}

.theme-footer-one .top-footer .title {
font-size: 20px;
text-transform: uppercase;
margin-bottom: 30px;
color: #fff;
}

.theme-footer-one .top-footer .about-widget p {
font-size: 15px;
line-height: 25px;
color: #fff;
}

.theme-footer-one .top-footer .about-widget .queries i {
font-size: 20px;
vertical-align: middle;
margin-right: 10px;
color: #fff;
}

.theme-footer-one .top-footer .about-widget .queries {
margin-top: 25px;
font-size: 15px;
}
.theme-footer-one .top-footer .about-widget .queries ul li{
line-height: 30px;
}
.theme-footer-one .top-footer .about-widget .queries a {
font-size: 15px;
text-decoration: none;
color: #fff;
font-weight: 400;
}

.theme-footer-one .top-footer .footer-recent-post li {
padding: 6px 0 20px 0;
margin-bottom: 14px;
border-bottom: 1px solid #838383;
}

.theme-footer-one .top-footer .footer-recent-post li img {
width: 60px;
height: 60px;
border-radius: 50%;
}

.theme-footer-one .top-footer .footer-recent-post li .post {
width: calc(100% - 70px);
padding-left: 10px;
}

.theme-footer-one .top-footer .footer-recent-post li .post a {
font-size: 15px;
line-height: 24px;
margin-top: -5px;
text-decoration: none;
color: #fff;
font-weight: 400;
}

.theme-footer-one .top-footer .footer-recent-post li .post .date {
font-size: 15px;
margin-top: 5px;
font-weight: 400;
color: <?php echo $color ?>;
}

.theme-footer-one .top-footer .footer-recent-post li .post .date i {
margin-right: 5px;
font-size: 14px;
}

.theme-footer-one .top-footer .footer-recent-post li:last-child {
border: none;
margin: 0;
padding-bottom: 0;
}

.theme-footer-one .top-footer .footer-list ul li {
line-height: 32px;
padding-left: 20px;
position: relative;
}

.theme-footer-one .top-footer .footer-list ul li::before {
content: '\f10c';
font-family: 'FontAwesome';
font-size: 10px;
position: absolute;
top: 0;
left: 0;
color: #fff;
}

#contact a:hover {
color: <?php echo $color ?>;
}

#contact i {
color: <?php echo $color ?>;
}

.theme-footer-one .top-footer .footer-list ul li a {
font-size: 15px;
text-decoration: none;
color: #fff;
font-weight: 400;
}

.theme-footer-one .top-footer .footer-recent-post li .post a:hover {
color: #f4f4f4 !important;
}

.theme-footer-one .bottom-footer ul {
/*text-align: right;*/
}

.theme-footer-one .bottom-footer ul li {
display: inline-block;
line-height: 25px;
}

.theme-footer-one .bottom-footer ul li a {
font-size: 17px;
margin-left: 35px;
text-decoration: none;
}

.social-link {
margin-top: 30px;
}

.social-link a i {
text-align: center;
font-size: 15px;
color: #b3b3b3 !important;
margin: 0px 5px;
-webkit-transition: all 0.3s ease-in-out 0s;
-moz-transition: all 0.3s ease-in-out 0s;
-o-transition: all 0.3s ease-in-out 0s;
-ms-transition: all 0.3s ease-in-out 0s;
transition: all 0.3s ease-in-out 0s;
}

.social-link a i:hover {
color: <?php echo $color ?> !important;
}

.social-link span {
color: #b3b3b3;
}

.f-logo {
margin-bottom: 30px;
}

.bottom-footer {
background: #0c0d0f;
padding-top: 40px;
padding-bottom: 20px;
}

.bottom-footer p {
color: #fff;
margin-bottom: 20px;
}
.footer-soical i {
color: #fff !important;
}

.footer-newsletter .item {
padding: 5px;
}

.footer-newsletter .item img {
width: 100%;
}

/* =========================================
******   INDEX 2 CSS START ******
=========================================== */

/* nav part start */
.index-2 .h-top-part {
background: #3569d7;
}

.index-2 .mr-book-btn-2 {
margin: 15px 0px;
}

.index-2 #main-menu .navbar {
top: 72px;
}

.index-2 #main-menu nav {
background: rgb(255, 255, 255);
}

.index-2 #main-menu .navbar-nav li a {
color: #242424;
}
.index-2 #main-menu .navbar-nav li a:hover {
color: <?php echo $color ?>;
}

.index-2 .mr-book-btn-2 {
background: #fff;
color: #3569d7;
}

.index-2 #main-menu .navbar.navbar-fixed {
top: 0px;
background: #242424;
}
.index-2 #main-menu .navbar.navbar-fixed ul li a{
color: #fff;
}
/* banner area start */
.index-2 #banner {
height: 1040px;
position: relative;
background: url(../img/banner/banner-2.jpg) no-repeat center;
background-size: cover;
background-attachment: fixed;
}

.index-2 #banner .banner_slider {
position: relative;
}

.index-2 #banner .banner_slider .banner_info2 {
position: absolute;
top: 270px;
left: 0%;
color: #fff;
width: 100%;
z-index: 99;
}

.index-2 #banner .banner_slider .banner_info2 article {
position: inherit;
z-index: 33;
}

.index-2 #banner .banner_slider .banner_info2 h2 {
color: #fff;
font-size: 70px;
}

.index-2 #banner .banner_slider .banner_info2 h4 {
font-size: 36px;
color: <?php echo $color ?>;
font-style: italic;
}

.index-2 #banner .a-links {
margin-top: 22px;
}

.index-2 #banner .a-links .mamun_btn_link {
background: <?php echo $color ?>;
padding: 15px 30px;
display: inline-block;
border-radius: .25rem;
margin-right: 7px;
color: #fff;
border: 1px solid <?php echo $color ?>;
}

.index-2 #banner .a-links .mamun_btn_link.m-btn-l-2 {
background: none;
border-color: #fff;
}

.index-2 #banner .a-links .mamun_btn_link:hover {
background: none;
border-color: #fff;
}

.index-2 #banner .a-links .mamun_btn_link.m-btn-l-2:hover {
background: <?php echo $color ?>;
border-color: <?php echo $color ?>;
}

/* choose-us area start */
.index-2 #choose-us {
position: relative;
}

.index-2 #index-2-serch-top {
position: absolute;
top: -313px;
width: 100%;
z-index: 9;
;
}

.index-2 .i-s-t-nav {
background: rgba(53, 106, 216, 0.9);
}

.index-2 .i-s-t-content {
background: rgba(37, 75, 156, 0.9);
}

.index-2 .nav-tabs {
border-bottom: 0px solid #dee2e6;
text-align: center;
display: block;
}

.index-2 .nav-tabs .nav-link,
.index-2 .nav-tabs .nav-link:focus,
.index-2 .nav-tabs .nav-link:hover {
border-color: none;
color: #fff;
font-size: 18px;
font-weight: 400;
}

.index-2 .nav-tabs .nav-link {
border: 0px solid transparent;
padding: 11px;
display: inline-block;
}

.index-2 .nav-tabs .nav-item.show .nav-link,
.index-2 .nav-tabs .nav-link.active {
color: #fff;
background: rgba(37, 75, 156);
border-color: #264c9d;
border-radius: 0px;
}

.index-2 .h-seaerch-area label {
font-size: 18px;
color: #fff;
}

.index-2 .h-seaerch-area .tab-content {
padding-top: 44px;
}

.index-2 .h-seaerch-area .tab-content .form-control {
background: none;
color: #fff;
font-size: 12px;
padding: 9px 10px 9px;
}

.index-2 .h-seaerch-area .tab-content .form-control::placeholder {
color: #fff;
}

.index-2 .index-2-serch-top-btn {
text-align: center;
}

.index-2 .index-2-serch-top-btn button {
background: #242424;
display: inline-block;
color: #fff;
padding: 15px 15px;
border: 0px;
border-radius: .25rem;
margin: 33px 0px 48px;
font-size: 15px;
-webkit-transition: all 0.3s ease-in-out 0s;
-moz-transition: all 0.3s ease-in-out 0s;
-o-transition: all 0.3s ease-in-out 0s;
-ms-transition: all 0.3s ease-in-out 0s;
transition: all 0.3s ease-in-out 0s;
}
.index-2 .index-2-serch-top-btn button:hover{
background: #3569d7;
}
.index-2 .index-2-serch-top-btn button i {
margin-right: 7px;
}

/* Control Travel Area Start */
#control-tur {
background: #3569d7;
padding: 94px 0px 94px;
position: relative;
}

#control-tur::after {
content: " ";
position: absolute;
height: 100%;
width: 50%;
background: url(../img/other/control-tur.jpg) no-repeat center;
background-size: cover;
top: 0;
left: 0;
}

#control-tur .video-icon i {
position: absolute;
top: 50%;
left: 50%;
color: #fff;
font-size: 40px;
z-index: 9;
transform: translate(-50%, -50%);
}

#control-tur h2,
#control-tur h3,
#control-tur h4,
#control-tur p,
#control-tur a {
color: #fff;
}

#control-tur h2 {
margin-bottom: 34px;
}

#control-tur a {
margin-top: 14px;
display: inline-block;
}

.ct-b-r {
border-right: 1px solid #fff;
}

/* our services area start */
#ourServices {
padding: 92px 0px 100px;
}

#ourServices .section-heading {
margin-bottom: 54px;
position: relative;
}

#ourServices .section-paragraph {
margin-bottom: 45px;
}

#ourServices .media i {
font-size: 25px;
width: 70px;
height: 70px;
border: 1px dotted <?php echo $color ?>;
border-radius: 50%;
text-align: center;
line-height: 70px;
-webkit-transition: all 0.3s ease-in-out 0s;
-moz-transition: all 0.3s ease-in-out 0s;
-o-transition: all 0.3s ease-in-out 0s;
-ms-transition: all 0.3s ease-in-out 0s;
transition: all 0.3s ease-in-out 0s;
}

#ourServices .media {
box-shadow: 0px 0px 23px rgba(0, 0, 0, 0.1);
padding: 30px 15px;
}

#ourServices .media a h3 {
-webkit-transition: all 0.3s ease-in-out 0s;
-moz-transition: all 0.3s ease-in-out 0s;
-o-transition: all 0.3s ease-in-out 0s;
-ms-transition: all 0.3s ease-in-out 0s;
transition: all 0.3s ease-in-out 0s;
}

#ourServices .media:hover a h3,
#ourServices .media:hover i {
color: <?php echo $color ?>;
}

/* Special Service Area css Start */
#SpeacialServices {
padding: 95px 0px 100px;
background: <?php echo $color ?>;
}

#SpeacialServices .section-heading {
margin-bottom: 54px;
position: relative;
color: #fff;
}

#SpeacialServices .section-paragraph {
margin-bottom: 45px;
color: #fff;
}

#SpeacialServices .section-heading::before {
background: #fff;
}

.m-card-img {
position: relative;
}

.m-card-body {
position: absolute;
top: 0;
left: 0;
padding: 15px;
background: rgba(53, 106, 216, 0.8);
width: 100%;
height: 100%;
opacity: 0;
}

#SpeacialServices .mamun-card h4,
#SpeacialServices .mamun-card p,
#SpeacialServices .mamun-card a {
color: #fff;
}
#SpeacialServices .mamun-card h4{
margin-bottom: 10px;
}

#SpeacialServices .mamun-card a {
margin-top: 10px;
display: inline-block;
}

.m-card-footer {
background: #1248b9;
color: #fff;
padding: 15px;
border-radius: 0 0 .25rem .25rem;
}

#SpeacialServices .mamun-card .m-card-body {
-webkit-transition: all 0.3s ease-in-out 0s;
-moz-transition: all 0.3s ease-in-out 0s;
-o-transition: all 0.3s ease-in-out 0s;
-ms-transition: all 0.3s ease-in-out 0s;
transition: all 0.3s ease-in-out 0s;
}

#SpeacialServices .mamun-card:hover .m-card-body {
opacity: 1;
}

/* traveling Offer area Start */
#traveling_offers {
padding: 92px 0px 100px;
position: relative;
}

#traveling_offers .section-heading {
margin-bottom: 54px;
position: relative;
padding: 0px 15px;
}

#traveling_offers .section-paragraph {
margin-bottom: 31px;
padding: 0px 15px;
}

#traveling_offers .section-heading::before {
left: 55px;
}

#traveling_offers .c-box p {
font-size: 18px;
}

#traveling_offers .c-box i {
font-size: 30px;
border: 1px dotted <?php echo $color ?>;
height: 70px;
width: 70px;
line-height: 70px;
text-align: center;
border-radius: 50%;
margin-bottom: 10px;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#traveling_offers .c-box span {
font-size: 24px;
font-weight: 600;
}

#traveling_offers .c-box:hover i {
background: <?php echo $color ?>;
color: #fff;
}

#traveling_offers .c-box-4,
#traveling_offers .c-box-5,
#traveling_offers .c-box-6 {
margin-top: 30px;
}

#traveling_offers .rq-bg h2 {
color: #fff;
}


#traveling_offers .rq-bg p {
position: inherit;
color: #fff;
z-index: 99;
}

.rq-bg::before {
content: " ";
position: absolute;
width: 100%;
height: 136%;
left: 0;
background: #183650;
top: -92px;
z-index: -9999;
}
#traveling_offers .rq-bg .i-box{
margin-top: 15px;
padding-bottom: 0px;
margin-bottom: 0px;
}
#traveling_offers .rq-bg .i-box input,
#traveling_offers .rq-bg .i-box select,
#traveling_offers .rq-bg .i-box textarea
{
width: 100%;
padding: 15px 20px;
color: #242424;
}
#traveling_offers .rq-bg .i-box .form-control::placeholder{
color: #242424;
}
#traveling_offers .rq-bg .i-box textarea{
resize: none;
height: 130px;
border: 0px;
margin-bottom: -5px;
}
#traveling_offers .rq-bg .mamunur_rashid_submit_btn_rfq{
width: 100%;
background: #3569d7;
border: 0px;
color: #fff;
padding: 15px 0px;
margin-top: 5px;
}
/* Pro Services area Start */
#pro_service {
background: url(../img/other/pro-service-bg.jpg) no-repeat center;
padding: 94px 0px 100px;
}
#pro_service .h2{
font-size: 30px;
}
#pro_service h2{
font-size: 33px;
margin: 7px 0px 12px;
}
#pro_service a{
background: #3569d7;
border: 2px solid #3569d7;
color: #fff;
padding: 12px 20px;
display: inline-block;
border-radius: .25rem;
margin-top: 25px;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}
#pro_service a:hover{
background: none;
color: #3569d7;
border: 2px solid #3569d7;
}

/* clint review area start */

#review {
padding: 94px 0px 100px;
}

#review .section-heading {
margin-bottom: 54px;
position: relative;

}

#review .section-paragraph {
margin-bottom: 45px;
}

#review .r-card i{
font-size: 20px;
width: 60px;
height: 60px;
border: 1px dotted <?php echo $color ?>;
border-radius: 50%;
text-align: center;
line-height: 60px;
color: <?php echo $color ?>;
}
#review .r-card .p-18{
font-size: 18px;
margin: 20px 0px 20px;
}
#review .r-card {
box-shadow: 0px 0px 23px rgba(0, 0, 0, 0.1);
padding: 40px 30px;
}

/* Gallery Area Start */

#glallery .item{
padding: 0px;
position: relative;
}
#glallery .item::before{
content: " ";
position: absolute;
width: 100%;
height: 100%;
top: 0;
left: 0;
background: rgba(1, 65, 245, 0.5);
opacity: 0;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}
#glallery .item:hover::before{
opacity: 1;
}
#glallery .item img {

width: 100%;

}
#glallery .item img {
width: 100%;
}



/*============================================
Faq Section
============================================*/
#faq{
padding: 100px 0px 80px;
}
#faq .newsletter .n-box {
background: url(../img/torisumCountries/neweslatter.png) no-repeat center;
background-size: cover;
padding: 48px 20px;
position: relative;
}
.overly {
position: absolute;
height: 100%;
width: 100%;
left: 0;
top: 0;
background: rgba(0, 0, 0, 0.7);
}
#faq .newsletter .n-box article {
position: inherit;
z-index: 9;
}

#faq .newsletter .n-box h4,
#faq .newsletter .n-box h3,
#faq .newsletter .n-box p {
color: #fff;
}

#faq .newsletter .n-box .mamunur_rashid_form {
width: 100%;
border: 1px solid #2c3e50;
padding: 15px 15px;
background: none;
border-radius: .25rem;
margin-top: 15px;
color: #f2f2f2;
}

#faq .newsletter .n-box .mamunur_rashid_form:focus {
outline: 0px;
}

#faq .newsletter .n-box .mamunur_rashid_form.mr-btn {
font-weight: 600;
background: <?php echo $color ?>;
border-color: <?php echo $color ?>;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

#faq .newsletter .n-box .mamunur_rashid_form.mr-btn:hover {
background: #001e72;
border-color: #001e72;
}

#faq .card {
margin-bottom: 20px;
background: transparent;
color: white;
}

#faq .card-header {
border: none;
color: #fff;
cursor: pointer;
padding: 0;
-webkit-transition: all .3s ease-in-out;
-moz-transition: all .3s ease-in-out;
-o-transition: all .3s ease-in-out;
transition: all .3s ease-in-out;
}


#faq .card-body {
background: #f9f9f9;
border: none;
color: #242424;
font-size: 15px;
}

#faq .btn-link {
background: #f9f9f9;
width: 100%;
text-align: left;
font-size: 18px;
color: #242424;
border-radius: 0px;
padding-left: 15px;
padding-right: 15px;
padding-bottom: 10px;
padding-top: 10px;
font-weight: 600;
-webkit-transition: all .3s ease-in-out;
-moz-transition: all .3s ease-in-out;
-o-transition: all .3s ease-in-out;
transition: all .3s ease-in-out;
}
#faq .btn-link:hover{
text-decoration: none;
}


#faq .btn-link i {
margin-right: 8px;
transform: rotate(-90deg);
-webkit-transition: all .3s ease-in-out;
-moz-transition: all .3s ease-in-out;
-o-transition: all .3s ease-in-out;
transition: all .3s ease-in-out;
}

#faq .btn-link[aria-expanded=true] i {
transform: rotate(0deg);
}

#faq-section.section_padding_100 {
padding-top: 90px;
padding-bottom: 80px;
}
#faq-section .section-heading {
margin-bottom: 77px;
}
#faq .card-header {
background: #f9f9f9;
}
.btn-link.focus, .btn-link:focus {
text-decoration: none;
}
#faq  .card {
border: 0px solid rgba(0,0,0,.125);
}
#faq  .accordion2_area {
margin-top: 35px;
}

#faq  .accordion1_area h3{
margin-bottom: 20px;
}
#faq  .accordion2_area h3{
margin-bottom: 20px;
}


/*==================================================
Click BottomToTop
====================================================*/
.totop {
position: fixed;
bottom: 30px;
right: 30px;
z-index: 9999;
}

.totop>a {
background-color: <?php echo $color ?>;
color: #fff;
display: block;
font-size: 16px;
padding: 12px 16px 10px;
border-radius: 50%;
box-shadow: 0 0px 25px #0006;
}

.totop>a:hover {
background-color: #0039ac;
}


/*========================
Bc Breadcrumb
=========================*/
.bc #breadcrumb{

/*assets/images/logo/breadcrumb.jpg*/
position: relative;
background: url(../../images/logo/breadcrumb.jpg) no-repeat center;
background-size: cover;
background-attachment: fixed;
/*padding: 220px 0px 149px;*/
padding: 120px 0px 80px;
}
.overly {
background: rgba(0, 0, 0, 0.85);
}
.bc #breadcrumb h2,
.bc #breadcrumb a,
.bc #breadcrumb span{
color: #fff;
}
.bc #breadcrumb h2{
margin-bottom: 20px;
}
.bc #breadcrumb a{
font-size: 18px;
font-weight: 400;
}
.bc #breadcrumb .active{
color: #1248b9;
}
.bc #breadcrumb span {
display: inline-block;
padding: 0px 5px;
}

/*====================
Contact CSS
===================*/
#map {
width: 100%;
height: 550px;
}

#contact-main .form-control::placeholder {
color: #363636!important;
}

#contact-main .form-control:focus {
border-color: #333!important;
box-shadow: 0 0 0 .0rem rgba(0,123,255,.0)!important;
}



#contact-main .contact-address p {
color: #242424;
font-size: 16px;
font-weight: 400;
margin-bottom: 18px;
}

#contact-main .contact-address{
background: #fff;
padding: 30px 15px 23px;
}
#contact-main .contact-address h4{
font-size: 24px;
font-weight: 600;
color: #242424;
margin-bottom: 10px;
}
#contact-main .contact-form{
margin-bottom: 100px;
}
#contact-main .contact-form h4{
font-size: 24px;
font-weight: 600;
color: #333;
margin-bottom: 10px;
}
#contact-main .contact-form input{
margin-top: 10px;
}
#contact-main .contact-form textarea{
margin-top: 10px;
}
#contact-main .contact-form p{
color: #555;
margin-bottom: 15px;
}
#contact-main .contact-form .form-control{
line-height: 40px;
padding: 30px 15px;
}

#contact-main .contact-address .con-num  i {
color: <?php echo $color ?>;
font-size: 20px;
width: 35px;
height: 35px;
line-height: 35px;
text-align: center;
border: 1px solid <?php echo $color ?>;
margin-right: 10px;
border-radius: 3px;
-webkit-transition: all linear .3s;
-moz-transition: all linear .3s;
-ms-transition: all linear .3s;
-o-transition: all linear .3s;
transition: all linear .3s;
}




#contact-main .contact-address .f-social-links {
margin-top: 18px;
}

#contact-main .contact-address a .fa{
font-size: 16px;
width: 40px;
color: #fff;
height: 40px;
text-align: center;
line-height: 40px;
border-radius: 50%;
margin-right: 5px;
}

#contact-main .contact-address a .fa {
color: #fff;
background: #333740;
}
#contact-main .contact-address a .tw {
color: #fff;
background: #009eee;
}
#contact-main .contact-address a .goo {
color: #fff;
background: #e64d3f;
}
#contact-main .contact-address a .in {
color: #fff;
background: #0075b2;
}
#contact-main .contact-address a .ins {
color: #fff;
background: #c80f4b;
}



#contact-main .con-num a {
margin-bottom: 10px;
color: #242424;
}



.btn-contact {
margin-top: 15px;
background: none;
border: 2px solid #001e72;
color: #001e72;
font-size: 16px;
border-radius: 3px;
padding: 12px 30px;
display: inline-block;
-webkit-transition: all linear .3s;
-moz-transition: all linear .3s;
-ms-transition: all linear .3s;
transition: all linear .3s;
}

.btn-contact:hover {
border-color: #001e72;
background: #001e72;
color: #fff;
}
.green{color: green}
.red{color: red}

#c-form{ width: 100%;}
.c-form{ width: 100%;}
.blog-box{
background: #fff;
}

/* 404 css */
#forzerofour {
padding: 100px 0px 100px;
}
#forzerofour h2{
font-size: 100px;
font-weight: 700;
}
#forzerofour h3{
font-weight: 600;
font-size: 40px;
}
#forzerofour p{
margin: 42px 0px 26px;
}

#contact-main {
position: relative;
padding-top: 100px;
}

#contact-main .contact-address{
position: absolute;
top: 30px;
right: 50px;
z-index: 99;
display: inline-block;
}
#contact-main .contact-address .media{
margin-bottom: 30px;
border-bottom: 1px solid #ddd;
padding-bottom: 18px;
}
#contact-main .contact-address .media.mlc{
border-bottom: 0px solid #ddd;
}
.contact-form-area{
padding-top: 50px;
}
.contact-form-area-padding{
background: url(../../images/logo/contactForm.jpg) no-repeat;
background-position: 140px -0px;
}


/*========================
Bc Breadcrumb
=========================*/


.bc #breadcrumb{
position: relative;
background: url(../../images/logo/breadcrumb.jpg) no-repeat center;
background-size: cover;
background-attachment: fixed;
padding: 220px 0px 149px;
}


.breadcrumbinfo form {
padding: 15px;
background: #fff;
border-radius: .25rem
}
.breadcrumbinfo form button{
border: 2px solid <?php echo $color ?>;
color: <?php echo $color ?>;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}
.breadcrumbinfo form button:hover{
border: 2px solid <?php echo $color ?>;
color: #fff;
background: <?php echo $color ?>;
}#ticket-booking{
padding: 100px 0px 82px;
}
#ticket-booking .t-box-1 img{
width: 14px
}
#ticket-booking .t-box-1 h5{
margin-bottom: 8px;
}
#ticket-booking .t-box-1 .bg-text{
background: <?php echo $color ?>;
font-size: 12px;
color: #fff;
padding:3px 5px;
line-height: normal;
border-radius: 3px;

}
#ticket-booking .p-img p{
display: inline-block;
margin-left: 5px;
}
.table td, .table th {
vertical-align: inherit;
}
.l-box a{
background: <?php echo $color ?>;
font-size: 15px;
color: #fff;
padding:5px 10px;
border-radius: 3px;
display: inline-block;
}
#breadcrumb .b-title{
font-size: 36px;
font-weight: 400;
color: #fff;
margin-bottom: 30px;
display: inline-block;
}
.overly {
background: rgba(0, 0, 0, 0.85);
}
.bc #breadcrumb h2,
.bc #breadcrumb a,
.bc #breadcrumb span{
color: #fff;
}
.bc #breadcrumb h2{
margin-bottom: 20px;
}
.bc #breadcrumb a{
font-size: 18px;
font-weight: 400;
}
.bc #breadcrumb .active{
color: #1248b9;
}
.bc #breadcrumb span {
display: inline-block;
padding: 0px 5px;
}



/*  bhoechie tab */
div.bhoechie-tab-container{
z-index: 10;
background-color: #ffffff;
/*padding: 0 !important;*/
border-radius: 4px;
-moz-border-radius: 4px;
margin-top: 20px;
-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
box-shadow: 0 6px 12px rgba(0,0,0,.175);
-moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
background-clip: padding-box;
opacity: 0.97;
filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
padding-right: 0;
padding-left: 0;
padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
border-top-right-radius: 0;
-moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
border-bottom-right-radius: 0;
-moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
background-color: #5A55A3;
background-image: #5A55A3;
color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
content: '';
position: absolute;
left: 100%;
top: 50%;
margin-top: -13px;
border-left: 0;
border-bottom: 13px solid transparent;
border-top: 13px solid transparent;
border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
background-color: #ffffff;
/* border: 1px solid #eeeeee; */
padding-left: 20px;
padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
display: none;
}

#aboutus{
padding: 100px 0px 100px;
}
#aboutus h3{
margin-bottom: 15px;
}
.about-btn{
display: inline-block;
background: <?php echo $color ?>;
color: #fff;
padding: 12px 25px;
border: 2px solid <?php echo $color ?>;
border-radius: .25rem;
margin-top: 25px;
}
.about-btn:hover{
color: <?php echo $color ?>;
background: none;
border-color: <?php echo $color ?>;
-webkit-transition: all .3s;
-moz-transition: all .3s;
-ms-transition: all .3s;
-o-transition: all .3s;
transition: all .3s;
}

