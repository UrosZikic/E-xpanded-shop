<?php
include 'connection.php';
$upr_limit = isset($_GET['i']) ? $_GET['i'] : null;
$lwr_limit = isset($_GET['m']) ? $_GET['m'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : null;
$device = isset($_GET['device']) ? $_GET['device'] : null;
$price = isset($_GET['price']) ? $_GET['price'] : null;
$search_val = isset($_GET['s_val']) ? $_GET['s_val'] : null;


if ($category != null) {
  $category = explode(',', $category);
}
if ($device != null) {
  $device = explode(',', $device);
}
if ($price != null) {
  $price = explode(',', $price);
  if (count($price) === 1) {
    $placeholder_max = $price[0];
    $price[0] = 0;
    $price[1] = $placeholder_max;
  } else if ($price[0] > $price[1]) {
    $placeholder_max = $price[0];
    $price[0] = $price[1];
    $price[1] = $placeholder_max;
  }
}


function list_products($conn, $lwr_limit, $upr_limit, $category, $device, $price, $search_val)
{
  $queryProducts = "";
  if (!$search_val) {
    if ($category == null && $device == null && $price == null) {
      if ($lwr_limit) {
        $queryProducts = 'SELECT * FROM `products_regular` WHERE `id` >= ' . $lwr_limit . ' AND `id` <= ' . $upr_limit;
      } else {
        $queryProducts = 'SELECT * FROM `products_regular`';
      }

    } else {
      if ($device == null && $price == null && $category != null) {

        $categoryString = implode("','", $category);
        $categoryString2 = implode(", ", $category);

        if ($lwr_limit) {
          $queryProducts = "SELECT * FROM `products_regular` WHERE `category` IN ('$categoryString') OR `category` LIKE '%$categoryString2%' LIMIT $lwr_limit, 12";
        } else {
          $queryProducts = "SELECT * FROM `products_regular` WHERE TRIM(`category`) IN ('$categoryString') OR `category` LIKE '%$categoryString2%'";
        }
        // 
      } else if ($category == null && $price == null && $device != null) {
        $deviceString = implode("','", $device);
        $deviceString2 = implode(', ', $device);
        if ($lwr_limit) {
          $queryProducts = "SELECT * FROM `products_regular` WHERE `device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%' LIMIT $lwr_limit, 12";
        } else {
          $queryProducts = "SELECT * FROM `products_regular` WHERE `device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%'";
        }
        // 
      } else if ($category == null && $device == null && $price != null) {
        if ($lwr_limit) {
          $queryProducts = "SELECT * FROM `products_regular` WHERE `price` >= $price[0] && `price` <= $price[1] LIMIT $lwr_limit, 12";
        } else {
          $queryProducts = "SELECT * FROM `products_regular` WHERE `price` >= $price[0] && `price` <= $price[1]";
        }
        // 
      } else if ($category != null && $device != null && $price == null) {
        $categoryString = implode("','", $category);
        $categoryString2 = implode(", ", $category);
        $deviceString = implode("','", $device);
        $deviceString2 = implode(', ', $device);

        if ($lwr_limit) {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`category` IN ('$categoryString') OR `category` LIKE '%$categoryString2%') && (`device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%')  LIMIT $lwr_limit, 12";
        } else {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`category` IN ('$categoryString') OR `category` LIKE '%$categoryString2%') && (`device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%')";
        }
        // 
      } else if ($category == null && $device != null && $price != null) {
        $deviceString = implode("','", $device);
        $deviceString2 = implode(', ', $device);

        if ($lwr_limit) {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%') && `price` >= $price[0] && `price` <= $price[1] LIMIT $lwr_limit, 12";
        } else {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%') && `price` >= $price[0] && `price` <= $price[1]";
        }
      } else if ($category != null && $device == null && $price != null) {
        // 
        $categoryString = implode("','", $category);
        $categoryString2 = implode(", ", $category);

        if ($lwr_limit) {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`category` IN ('$categoryString') OR `category` LIKE '%$categoryString2%') && `price` >= $price[0] && `price` <= $price[1] LIMIT $lwr_limit, 12";
        } else {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`category` IN ('$categoryString') OR `category` LIKE '%$categoryString2%') && `price` >= $price[0] && `price` <= $price[1]";
        }
      }
      // 
      else {
        $categoryString = implode("','", $category);
        $categoryString2 = implode(", ", $category);
        $deviceString = implode("','", $device);
        $deviceString2 = implode(', ', $device);
        if ($lwr_limit) {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`category` IN ('$categoryString') OR `category` LIKE '%$categoryString2%') && (`device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%') && `price` >= $price[0] && `price` <= $price[1] LIMIT $lwr_limit, 12";
        } else {
          $queryProducts = "SELECT * FROM `products_regular` WHERE (`category` IN ('$categoryString') OR `category` LIKE '%$categoryString2%') && (`device` IN ('$deviceString') OR `device` LIKE '%$deviceString2%') && `price` >= $price[0] && `price` <= $price[1]";
        }
      }
    }
  } else {
    if ($lwr_limit) {
      $queryProducts = "SELECT * FROM `products_regular` WHERE `name` LIKE '%" . $search_val . "%'";
      $queryProducts .= "LIMIT $lwr_limit, 12";
    } else {
      $queryProducts = "SELECT * FROM `products_regular` WHERE `name` LIKE '%" . $search_val . "%'";
    }
  }
  $resultProducts = $conn->query($queryProducts);

  return $resultProducts;


}
$resultProducts = list_products($conn, $lwr_limit, $upr_limit, $category, $device, $price, $search_val);
display_products($resultProducts);


?>
<?php
function display_products($resultProducts)
{
  ?>
  <!-- <div class="products_container"> -->
  <div class="products" id="products">
    <?php
    $iterate = 0;
    if ($resultProducts->num_rows != 0) {
      $totalRows = $resultProducts->num_rows;

      while ($row = $resultProducts->fetch_assoc()) {
        if ($iterate < 12) {

          $iterate++;
          ?>
          <div class="product">
            <div class="product-image">

              <!-- <span style="font-weight: 300; color: green; border: 1px solid #1a1a1a; background-color: white; padding: 0.5rem">
                <?php
                // $is_in_stock = $row['quantity'] > 0 ? "in stock" : "out of stock";
                echo $row['category']
                  ?>
              </span> -->

              <ion-icon name="checkmark-outline" class="success-mark"></ion-icon>

              <a href="store_product.php?product_id=<?php echo $row['id'] ?>" aria-label="productpage link">
                <img src="<?php echo 'assets/images/products/' . $row['image'] . ".webp" ?>" alt="<?php echo $row['name'] ?>"
                  loading="lazy">
              </a>
            </div>
            <div class="product--inner-container">
              <div class="product-info">
                <p class="product_name disappear">
                  <?php
                  echo $row['name'];
                  ?>
                </p>
                <p>
                  <?php
                  if (str_contains($row['name'], '_z')) {
                    echo str_replace('_z', "'s", $row['name']);
                  } else {
                    echo $row['name'];
                  }
                  ?>
                </p>
                <p>
                  <?php echo $row['price'] . "$" ?>
                </p>
              </div>
              <button onclick="push_to_cart(<?php echo $row['id'] ?>, 1, true, 20, '<?php echo $row['name'] ?>', 'regular')"
                class="<?php echo $row['quantity'] > 0 ? "" : 'disabled' ?> add_to_cart_alt" aria-label="product_page_button">
                <ion-icon name="cart-outline"></ion-icon>
              </button>
            </div>
          </div>
          <?php
        }
      }
    }

    ?>
  </div>
  <?php
  if ($resultProducts->num_rows == 0) {
    ?>
    <div
      style="display:flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; max-width: 1000px; margin: 0 auto; grid-row: 1; grid-column: 1; padding: 5rem 0">
      <ion-icon name="skull-outline" style="color: white; font-size: 5rem"></ion-icon>
      <h1 style="color: white; font-size: 4rem; font-weight: 300">Dead End</h1>
      <a href="store.php"
        style="font-size: 3rem; color: #3bc9db !important; text-decoration: none; font-weight: 300 !important;">Go
        back
        to Store</a>
    </div>
    <?php
  }
  ?>
  <ul class="pagination">
    <?php
    if ($resultProducts->num_rows != 0) {
      // DAJE UKUPNI BROJ REZULTATA
      $set_total = isset($_GET['s']) ? $_GET['s'] : null;
      $total_products = isset($_GET['t']) ? $_GET['t'] : null;
      $search_val = isset($_GET['s_val']) ? $_GET['s_val'] : null;

      if ($set_total == null) {
        $totalRows = $resultProducts->num_rows;
      } else {
        $totalRows = $total_products;
      }
      $currentUrl = $_SERVER['REQUEST_URI'];
      // ISKORISTI TOTALNI BROJ REDOVA I TRENUTNI URL DA NAPRAVIS "MORE PRODUCTS" DUGME KOJE CE GENERISATI VISE PROIZVODA POVECAVANJEM LIMITA
      for ($i = 1; $i <= ceil(($totalRows - 1) / 12); $i++) {
        ?>
        <li>
          <a href="<?php
          if ($i == 1) {
            $start_row = 0;
            $end_row = 12;
            // $query = "SELECT * FROM your_table LIMIT $startRow, $numRowsToFetch";
            if (!$search_val) {
              if (!str_contains($currentUrl, "category") && !str_contains($currentUrl, "device") && !str_contains($currentUrl, "price")) {
                if (!str_contains($currentUrl, "?i")) {
                  echo $currentUrl . "?i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                } else {
                  $currentUrl = substr($currentUrl, 0, strpos($currentUrl, "?i"));
                  echo $currentUrl . "?i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                }
              } else {
                if (!str_contains($currentUrl, "&i")) {
                  echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                } else {
                  $currentUrl = substr($currentUrl, 0, strpos($currentUrl, "&i"));
                  echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                }
              }
            } else {
              if (!str_contains($currentUrl, "&i")) {
                echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
              } else {
                $currentUrl = substr($currentUrl, 0, strpos($currentUrl, "&i"));
                echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
              }
            }
          } else {
            $start_row = (12 * ($i - 1) + 1);
            $end_row = 12 * $i;
            if (!$search_val) {
              if (!str_contains($currentUrl, "category") && !str_contains($currentUrl, "device") && !str_contains($currentUrl, "price")) {
                if (!str_contains($currentUrl, "?i")) {
                  echo $currentUrl . "?i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                } else {
                  // echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row;
                  $currentUrl = substr($currentUrl, 0, strpos($currentUrl, "?i"));
                  echo $currentUrl . "?i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                }
              } else {
                if (!str_contains($currentUrl, "&i")) {
                  echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                } else {
                  $currentUrl = substr($currentUrl, 0, strpos($currentUrl, "&i"));
                  echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
                }
              }
            } else {
              if (!str_contains($currentUrl, "&i")) {
                echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
              } else {
                $currentUrl = substr($currentUrl, 0, strpos($currentUrl, "&i"));
                echo $currentUrl . "&i=" . $end_row . "&m=" . $start_row . "&s=" . 1 . "&t=" . $totalRows;
              }
            }
          }
          ?>">
            <?php echo $i ?>
          </a>
        </li>
        <?php
      }
    }
    ?>
  </ul>
  <!-- </div> -->
<?php }
; ?>