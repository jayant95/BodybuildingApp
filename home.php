<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
?>

<div class="page-background">
<div class="container-login background-image overlay">
  <div class="wrap-login homepage">
  <div class="logo-header">
      <img class="site-logo main" src="img/site-logo-alt-chalk.png">
    </div>
    <div class="welcome-header">
      <h1>Welcome to Deltoyd</h1>
      <h2>Bodybuilding goals made simple</h2>
      <h3>Create your ideal proportions. Keep track of your progress. Achieve your physique.</h3>
    </div>
  </div>
  <div class="welcome-link-section">
    <a href="#site-features">
      <img src="img/arrow-down.png">
  </a>
  </div>
</div>
  <div class="content-wrapper">
    <div class="main-features" id="site-features">
      <div class="features-header">
        <h2>Features</h2>
        <p>Choose any of these features below to create your ideal physique</p>
    </div>
      <div class="first-row-features">
        <div class="site-feature">
          <a href="pin-height.php">
            <div class="feature-info-img by-height">
              <img src="img/tapeMeasure.png">
            </div>
            <div class="feature-info home">
              <h2>Height</h2>
              <p>Not many people are 6'5", but Lou Ferrigno was. Find out if you have same proportions as Lou and other bodybuilders.</p>
            </div>
          </a>
        </div>
        <div class="site-feature">
          <a href="pin-muscle.php">
            <div class="feature-info-img pin-muscle">
              <img src="img/musclePin.png">
            </div>
            <div class="feature-info home">
              <h2>Pin Muscle Group</h2>
              <p>Feel like your chest is big enough? Pin it and see how your other muscle groups can catch up!</p>
            </div>
          </a>
        </div>
      </div>

      <div class="second-row-features">
      <div class="site-feature">
          <a href="muscle-converter.php">
            <div class="feature-info-img muscle-to-muscle">
              <img src="img/muscleCalc.png">
            </div>
            <div class="feature-info home">
              <h2>Muscle to Muscle</h2>
              <p>Ever wondered how big your arms should be compared to your chest? Wonder no more!</p>
            </div>
          </a>
        </div>
        <div class="site-feature">
          <a href="custom.php">
            <div class="feature-info-img custom-feature">
              <img src="img/customIcon.png">
            </div>
            <div class="feature-info home">
              <h2>Custom</h2>
              <p>You're a dreamer and a pioneer. You follow your own path.</p>
            </div>
          </a>
        </div>
        <div class="site-feature">
          <a href="golden-ratio.php">
            <div class="feature-info-img golden-ratio">
              <img src="img/goldenRatioIcon.png">
            </div>
            <div class="feature-info home">
              <h2>Golden Ratio</h2>
              <p>Do you have the golden ratio physique? Come and find out</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div> 
</div> 


<?php require("includes/footer.php"); ?>
