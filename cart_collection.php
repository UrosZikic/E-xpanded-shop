<?php
if (isset($_COOKIE['js_var_value'])) {
  $cart_collection = $_COOKIE['js_var_value'];
  // Remove unwanted characters

  echo $cart_collection;
  $cart_collection = explode(',', $cart_collection);


  $cart_product_name = [];
  $cart_product_quantity = [];


  for ($i = 0; $i < count($cart_collection); $i++) {
    if ($i % 2 == 0) {
      array_push(
        $cart_product_name,
        $cart_collection[$i]
      );
    } else {
      array_push($cart_product_quantity, $cart_collection[$i]);
    }
  }
  ;



  $placeholders = implode(', ', array_fill(0, count($cart_product_name), ' ?'));
  $orderByClause = 'FIELD(`name`, ' .
    implode(', ', array_map(function ($item) {
      return "'" . $item . "'";
    }, $cart_product_name)) . ' )';
  //specials 
  $queryProducts = "SELECT * FROM `products` WHERE `name` IN ($placeholders) ORDER BY $orderByClause";
  $stmt = $conn->
    prepare($queryProducts);
  $stmt->bind_param(str_repeat('s', count($cart_product_name)), ...$cart_product_name);
  $stmt->execute();
  $result = $stmt->get_result();
}

