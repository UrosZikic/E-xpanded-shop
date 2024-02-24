<?php
session_start();
$title = "Home page";
session_destroy();
include "head.php";
include "navbar.php";

?>
<main>

  <div>
    <div class="header_component">
      <a href="#featured" class="slide-down" aria-label="slide_to_products">
        <ion-icon name="caret-down-circle"></ion-icon>
      </a>
      <img src="assets/images/bg-image.webp" alt="scented candles" class="head_image">

    </div>
    <?php
    include "special.php";

    ?>
    <div class="product_section" id="featured">
      <h2 class="product-heading">
        Featured & Recommended
      </h2>


      <?php
      if (isset($_GET['success_msg'])) {
        echo "<div class='success_msg'><p>Thank you for your purchase!</p></div>";
      }
      ?>

      <?php
      include "products.php";
      include "upcoming.php";

      ?>
    </div>
</main>
<?php
include "footer.php";
?>
<script>
  const urlParams = new URLSearchParams(window.location.search);

  // Get the value of 'other_arg' parameter
  const reset_cart_now = urlParams.get('reset_cart');

  // Check if the parameter exists before using it
  if (reset_cart_now !== null) {
    (function reset_cookies() {
      document.cookie = "js_var_value = " + [];
    })();
  }


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="assets/scripts/carousel.js"></script>
<?php
include "foot.php";
?>