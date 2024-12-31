<?php
if (isset($_SESSION['id'])) {
  
  $user1 = $action->$function($_SESSION['id']);
  
  $name = $user1['username'];
  $email = $user1['email'];
} else {
$name = "";
$email = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>home | <?php echo APP_NAME; ?></title>
  <meta name="author" content="Velile Vamba">
  <meta content="" name="lorem100">
  <meta content="" name="keywords">

  <!-- Favicons -->
  

<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet"> -->

  <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
	<style type="text/css">
		.carousel-item {
		  height: 60vh;
		  min-height: 350px;
		  background: no-repeat center center scroll;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}

    .main {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.main .wrap {
  margin: 2rem;

  transform-style: preserve-3d;
  transform: perspective(100rem);

  cursor: pointer;
}

.main .container {
  --rX: 0;
  --rY: 0;
  --bX: 50%;
  --bY: 80%;

 
  border: 1px solid var(--background-color);
  border-radius: 1.6rem;
  padding: 4rem;

  display: flex;
  align-items: flex-end;

  position: relative;
  transform: rotateX(calc(var(--rX) * 1deg)) rotateY(calc(var(--rY) * 1deg));

  background: linear-gradient(hsla(0, 0%, 100%, .1), hsla(32, 57, 84));
  background-position: var(--bX) var(--bY);
  background-size: 40rem auto;
  box-shadow: 0 0 3rem .5rem hsla(0, 0%, 0%);

  transition: transform .6s 1s;
}

.main .container::before,
.main .container::after {
  content: "";

  width: 2rem;
  height: 2rem;
  border: 1px solid #fff;

  position: absolute;
  z-index: 2;

  opacity: .6;
  transition: .3s;
}

.main .container::before {
  top: 2rem;
  right: 2rem;

  border-bottom-width: 0;
  border-left-width: 0;
}

.main .container::after {
  bottom: 2rem;
  left: 2rem;

  border-top-width: 0;
  border-right-width: 0;
}

.main .container--active {
  transition: none;
}

.main .container--2 {
  filter: hue-rotate(80deg) saturate(140%);
}

.main .container--3 {
  filter: hue-rotate(160deg) saturate(140%);
}

.main .container p {
  color: hsla(0, 0%, 100%, .6);
  font-size: 0.8rem;
  text-align: left;
}

.main .wrap:hover .container::before,
.main .wrap:hover .container::after {
  width: calc(100% - 4rem);
  height: calc(100% - 4rem);
}

.main .abs-site-link {
  position: fixed;
  bottom: 20px;
  left: 20px;
  color: hsla(0, 0%, 0%);
  font-size: 1.6rem;
} 

/*****************************************/
.solutions {
  /* The image used */
  background-image: url(assets/img/slider-2.jpg);

  /* Set a specific height */
  min-height: 500px;

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.solutions .wrapper{
  width: 100%;
  max-width: 100%;
  margin: auto;
}

.solutions h1{
  color: #fff;
  font-weight: normal;
  text-align: center;
  font-size: 48px;
}

.solutions .panels{
  list-style-type: none;
  padding: 0;
}

.solutions .panels li{

  margin: 0;
  display: block;
  box-sizing: border-box;
  float: left;
}

.solutions .panels li div{
  padding: 10% 0;
  text-align: center;
  color: #fff;
  font-size: 11px;
  letter-spacing: 2px;
  cursor: pointer;
  height: 50vh;
}

/*// ANIMATION STYLES //*/

.solutions .panels div.back {
  transform: rotateY(90deg);
}

.solutions .panels div.front {
  position: absolute;
}

.solutions .panels li:hover div.front {
  animation: twirl 0.2s ease-in forwards;
}
.solutions .panels li:hover div.back {
  animation: twirl 0.2s 0.2s ease-out forwards reverse;
}

@keyframes twirl {
  0%{ transform: rotateY(0deg)}
  100% {transform: rotateY(90deg)}
}

.why-us {
  /* The image used */
  background-image: url(assets/img/slider-2.jpg);

  /* Set a specific height */
  min-height: 350px;

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

	</style>
</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        
        <!-- <h1 class="text-light"><a href="index.html"><span>Our-Compnay Associate</span></a></h1> -->
        <a href="/"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Our Work</a></li>
          <li><a href="#faq">Case Studies</a></li>
          <li><a href="#team">Solutions</a></li>
		      <li><a href="#contact">Contact Us</a></li>
          <?php
          if (! isset($_SESSION['id'])) {
          ?>
            <li><a href="login">Login</a></li>
          <?php
          } else { ?>
          <li><a href="dashboard">dashboard</a></li>
          <li><a href="logout">Logout</a></li>
          <?php }?>
        </ul>
            
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section >
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url(assets/img/footer-bg.png)">
          <div class="carousel-caption">
            <h2 class="display-4">Our-Compnay</h2>
            <p class="lead">Delivering relevant, agile yet simple technological solutions for financial services providers</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url(assets/img/slider-2.jpg)">
          <div class="carousel-caption ">
            <h2 class="display-4">Our-Compnay</h2>
            <p class="lead">Delivering relevant technologies for our times</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url(assets/img/covid.jpg)">
          <div class="carousel-caption covid-block">
            <h2 class="display-4">We are in this together.</h2>
            <p class="lead" style="background: rgba(0, 0, 0, 0.7); border-radius: 3px;">Our Organisation is committed on taking recommendations from the health authorities,
               WHO (World Health Organisation) and our local authority. Our company is committed to follow
              the guidelines which includes, refraining from non-essential travelling, self-isolation upon return
              from any affected areas, social distancing, wearing of musk’s and use of hand sanitizer.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
  </section><!-- #hero -->
  

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/Fapas.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1">
            <h3>What we do</h3>
            <p class="">
              Specialist in financial services software solutions to help financial services providers unlock
business growth and digital transformation through innovation and technology.
            </p>
            <p>
              Our-Compnay focuses on delivering relevant, agile yet simple technological solutions
for financial services providers in the emerging markets. Our solutions give a better user
interface to wealth managers, fund managers, insurance brokers /companies and other financial
services providers with minimum costs.
            </p>
            <p>
              As a simple rule, we do not aim to be the most dominant software provider in our space, but we
aim to be the best in the niche that we serve.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Our Work</h2>
          <p>Our-Compnay focuses on bringing cloud-based solutions to financial services
providers. Our aim is not only to drastically reduce service managers time, effort, and cost but to
offer Our-Compnay Associates’ experience ensuring the speedy and successful implementation of
cloud-based systems.</p>
        </div>

        
          
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section class="call-to-action">
      <div class="container">
        
        <div class="text-center">
          
        <div class="section-title">
          <h2 style="color: #fff;">Our approach</h2>
        </div>

          <p>Our company approach focuses on bringing a better user interface for our client’s business to
meet the emerging business environments. We achieve this through our Three Phase Process</p>

<div class="container-fluid">
  <div class="col-md-12">
      <div class="row main">
          <div class="wrap wrap--3 col-md-3">
            <h6 style="color: #fff; text-align: right;">01. System Alignment Phase </h6>
              <div class="container container--3 ">
                  <p>Serves to determine the scope, resourcing, and timeframes for a Project Implementation
                    Phase</p>
              </div>
            </div>
          
            <div class="wrap wrap--3  col-md-3">
              <h6 style="color: #fff; text-align: right;">02.   Implementation Phase</h6>
              <div class="container container--3 ">
		<p>Delivering the tasks necessary to allow the FA portfolio administration systems to run live.
These tasks will be mutually agreed and detailed in the System Alignment Phase</p>
              </div>
            </div>
          
            <div class="wrap wrap--3 col-md-3">
              <h6 style="color: #fff; text-align: right;">03. Monthly Ongoing Phase</h6>
              <div class="container container--3 ">
                <p>
                  Includes time to be used for on–going development as well as pure support and
            maintenance.</p>
            
              </div>
            </div>
          
      </div>
  </div>
</div>
        </div>
      </div>
    </section><!-- End Call To Action Section -->

    

    <!-- ======= Frequently Asked Questions Section ======= -->

    <section id="faq" class="solutions">
      <div class="wrapper">
        <h1>Case Studies</h1>
        <ul class="panels">
          <div class="row">
          <li class="col-md-4">
            <div class="front" style="background: #203954">
              <h6>Problem</h6>
              <p>
                An investment manager inherited an asset management business from a leading Pan-African
bank with a view of modernizing the operation and scaling. Our-Compnay was approached to offer
a cloud-based administration system which allowed clients, administrators and portfolio
managers to have a full view of their portfolio from a portal.
              </p>
            </div>
            <div class="back" style="background: #020a20">
              <h6>Solution</h6>
            <p>
              Capitalizing on many years of experience in the financial services sector, Our-Compnay
Associates offered an innovative end-to-end Investment Solution that utilized cloud-based
technology to provide a functionally rich and versatile platform that supports the Front, Middle
and Back Office requirements. That is, from trade execution, transaction processing, portfolio
management reporting, compliance, and performance measurement. In 2020, the business has
scaled considerably with minimal disruptions to operations. More so, they avoided downtime
when lockdowns were implemented in 2020 since administrators could work from anywhere.
            </p>
            </div>
          </li>
          <li class="col-md-4">
            <div class="front" style="background: #203954">
              <h6>Problem</h6>
              <p>
                After succeeding in servicing its institutional client base, a business wanted to extend the
current service to high-net-worth individuals. Our-Compnay was approached because the provider
needed a technology partner to help them deliver a dynamic solution to meet the continuously
evolving needs of their new market.
              </p>
            </div>
            <div class="back" style="background: #020a20">
              <h6>Solution</h6>
              <p>
                Our-Compnay designed a system that allowed the Relationship managers to focus on their clients
rather than the administration processes. The solution allowed the manager to have a 360° view
for clients’ and funds’ investments monitoring. Clients have 24/7 access to their portfolio
investments through integrated web modules.
              </p>
            </div>
          </li>
          <li  class="col-md-4">
            <div class="front" style="background: #203954">
              <h6>Problem</h6>
              <p>
                An insurance company which offers regional funeral cover approached our company.
Our-Compnay was approached to offer a cloud-based system which is easily accessible to clients
when they want to pay premiums, seek insurance advice, and claim benefits. The accessibility
was supposed to stretch across all communication platforms. Operationally, the system the
provider also wanted a system that captured information from via a cloud-based portal whilst it
allows it to gain customer insights through data analysis.
              </p>
            </div>
            <div class="back" style="background: #020a20">
            <h6>Solution</h6>
              <p>Our-Compnay actuarial analysts initially interpreted client’s business and through our innovative
                associates, we came up with a cloud-based system easily accessible to insurance company
                users. We offered a partnership with the insurance company through providing a dynamic
                technological solution. Our solution included good user interface for both the administrators and
                the company’s clients. This came without compromising the useful data tools that will help the
                insurer.</p>
          </div>
          </li>
         
        </div>
        
         
        </ul>
      </div>
    </section>
<!-- End Frequently Asked Questions Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" style="text-align: center;">
      <div class="section-title">
        <h2>Technology and Security</h2>
      </div>

        <p>Our-Compnay uses cloud based Microservices. Hosted on-premises or cloud scalable solution.
          Driving highest business value through latest best in class technologies pinned by simplified
          user-friendly approach adhering to Industry standards.</p>
          <p>The client can be rest assured that the data is safe and secure in a state-of-the-art Data Centre
            and compliant with relevant legislation.</p>
        <div class="col-md-8 offset-md-2">
          <img src="assets/img/quarkus_logo_vertical_rgb_1280px_default.png" class="rounded" width="100"  height="100" alt="...">
          <img src="/assets/img/java-logo-1.png" class="rounded " width="100"  height="100" alt="...">
          <img src="assets/img/1561951216183.png" class="rounded " width="100"  height="100" alt="...">
          <img src="assets/img/thumbnail-139148.png" class="rounded " width="100"  height="100" alt="...">
        </div>
       
      </div>
    </section><!-- End Our Team Section -->

    <section id="" class="why-us" style="color: #fff;">
      <div class="container" style="text-align: center;">
        <div class="section-title">
          <h2 style=" color: #fff;">Why Us</h2>
        </div>
          <p>Our-Compnay commenced business in 2016 after three years of designing and working
  on a solution for its first client in South Africa. Our-Compnay is made up of
  professionals with a good blend of financial and software expertise. Founders have a combined
  experience of 28 years providing solutions to the financial services sector in Africa.</p>
  <div class="text-center"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Click here to request for Demo</button></div>
 
  <div class="collapse" id="collapseExample">
    <div class="col-lg-5 col-md-12">
      <form action="forms/contact.php" method="post" role="form" class="php-email-form">
        <div class="form-group">
          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please tell us why you need a demo" placeholder="Message"></textarea>
          <div class="validate"></div>
        </div>
        <div class="text-center"><button class="btn btn-info" type="submit">Send Request</button></div>
      </form>
    </div>
  </div>
      </div>
    </section>

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="contact-about">
              <h3>Our-Compnay</h3>
              <p>Delivering relevant technologies for our times</p>
              <div class="social-links">
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info">
              <div>
                <i class="icofont-google-map"></i>
                <p><?php echo ADDRESS; ?></p>
              </div>

              <div>
                <i class="icofont-envelope"></i>
                <p><?php echo $_ENV['EMAIL']; ?></p>
              </div>


            </div>
          </div>

          <div class="col-lg-5 col-md-12">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $name; ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email ?>" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->
   
    <!-- ======= Map Section ======= -->
    <section class="map">
        <iframe src="https://maps.google.com/maps?q=Government%20Ave,%20Pretoria,%200002&t=&z=13&ie=UTF8&iwloc=&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>	
    </section><!-- End Map Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
          <?php echo DEV; ?>
	      <br>
        2023&copy; - <?php echo date('Y'); ?>&copy; Copyright <strong><span><?php echo APP_NAME; ?></span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End #footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script> 
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
