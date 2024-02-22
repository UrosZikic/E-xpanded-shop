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
      <img src="assets/images/bg-image.png" alt="scented candles" class="head_image">

    </div>

    <h2 class="product-heading">
      Products
    </h2>
    <p class="product-paragraph">
      Indulge yourself or treat your beloved ones to the exquisite experience of Candleleaf. </p>

    <?php
    if (isset($_GET['success_msg'])) {
      echo "<div class='success_msg'><p>Thank you for your purchase!</p></div>";
    }
    ?>

    <?php
    include "products.php";
    include "description.php";

    ?>

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