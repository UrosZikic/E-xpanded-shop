<?php
// session_start();
// $_SESSION['title'] = "Product page";
// session_destroy();
$title = "Product page";
include "head.php";
include "navbar.php";
include 'connection.php';


$productId = $_GET['product_id'];

$queryProducts = 'SELECT * FROM `products_regular` WHERE `id`=' . $productId;
$resultProducts = $conn->query($queryProducts);
?>
<main class="product-container" id="product-container">
  <div class="product_success_overlay product_success_overlay_none">
    <div class="product_success product_success_initial">
      <p>Product added to cart successfully</p>
      <div>
        <button class="proceed_to_cart">Proceed to cart</button>
        <button class="keep_shopping">Keep shopping</button>
      </div>
    </div>
  </div>
  <?php
  if ($resultProducts->num_rows != 0) {
    while ($row = $resultProducts->fetch_assoc()) {
      // setcookie("productQuantity", $row['quantity'], time() + 3600, "/");
      ?>
      <div class="single-product-left">
        <img src="<?php echo "assets/images/products/" . $row['image'] . '.webp' ?>" alt="<?php echo $row['name'] ?>" />
        <strong>
          <?php echo $row['description'] ?>
        </strong>
      </div>
      <div class="single-product-right">
        <h1 class="product_name disappear">
          <?php echo $row['name'] ?>
        </h1>
        <h1 class="product_name disappear">
          <?php echo $row['name'] ?>
        </h1>
        <h1>
          <?php
          if (str_contains($row['name'], '_z')) {
            echo str_replace('_z', "'s", $row['name']);
          } else {
            echo $row['name'];
          }
          ?>
        </h1>
        <div class="product-right-layout">
          <div class="product-right-layout-one">
            <p>
              <?php echo "$" . $row['price'] ?>
            </p>
            <div>
              <p>Quantity</p>

              <div class="qnt-adjuster">
                <button class="qnt-decrement">-</button>

                <p class="qnt-display">
                  <?php echo $row['quantity'] ? 1 : 0 ?>
                </p>
                <button class="qnt-increment">+</button>

              </div>
            </div>
          </div>
          <!-- x -->
          <div class="product-right-layout-two">
            <div>

              <div class="radio-container">
                <input type="radio" name="purchase-type" id="one-time-purchase">
                <label for="one-time-purchase">One time purchase</label>
              </div>
            </div>
            <!-- y -->
            <div>
              <div class="radio-container">
                <input type="radio" name="purchase-type" id="subscribe">
                <label for="subscribe">Subscribe and receive a new delivery every week</label>
              </div>
              <p class="subscribe-label">Subscribe now and get the 10% of discount on every recurring order. The discount
                will be applied at
                checkout.</p>
            </div>

            <button class="add_to_cart"
              onclick="push_to_cart(<?php echo $row['id'] ?>, false, false, <?php echo $row['quantity'] ?>, '<?php echo $row['name'] ?>')"
              <?php echo $row['quantity'] == 0 ? "disabled" : ""; ?>
              style="<?php echo $row['quantity'] == 0 ? "background-color: gray" : ""; ?>">Add to
              cart</button>

          </div>

        </div>
        <div class="product-information">
          <p><strong>Gameplay:</strong> Immersive mechanics, diverse challenges, and endless entertainment for players.</p>
          <p><strong>Graphics:</strong> Stunning visuals with lifelike detail, enhancing immersion and visual delight.</p>
          <p><strong>Replay Value:</strong> Dynamic content ensures hours of enjoyment, with captivating storylines. </p>
        </div>
      </div>
      <?php
    }
  }

  ?>
</main>


<?php
include "footer.php";
include "foot.php";
?>