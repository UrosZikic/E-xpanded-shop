<div class="nav-filler">
  <nav class="navbar_component">

    <a class="navbar-brand" href="index.php">
      <img src="assets/images/logo.png" alt="website logo">
    </a>

    <div class="search_container">
      <input type="text" class="search_engine" />
      <div class="inner_search_container">
        <div class="cat_hover">
          <ul class="cat_placeholder">
            <li>Categories</li>
          </ul>
          <ul class="cat_container">
            <li class="cat_link"><a href="store.php?category=action">Action</a></li>
            <li class="cat_link"><a href="store.php?category=RPG">RPG</a></li>
            <li class="cat_link"><a href="store.php?category=adventure">Adventure</a></li>
            <li class="cat_link"><a href="store.php?category=sport">Sport</a></li>
            <li class="cat_link"><a href="store.php?category=horror">Horror</a></li>
          </ul>
        </div>
        <button class="search_confirm">
          <ion-icon name="search-sharp"></ion-icon>
        </button>
      </div>
      <div class="suggest_container"></div>
    </div>

    <div class="contact_cart_container">
      <!-- contact -->
      <button class="contact-button" onclick="open_modal_form()">
        <ion-icon name="mail-unread"></ion-icon>
      </button>
      <!-- cart -->
      <a href="cart.php" aria-label="cart" name="cart" class="cart_nav_container">
        <div class="cart-amount"></div>
        <ion-icon name="cart-outline"></ion-icon>
      </a>
    </div>

    <ul class="navigation_links">
      <!-- <li><a href=""></a></li> -->
      <li><a href="store.php">Store</a></li>
      <li><a href="store.php">About</a></li>
      <li><a href="store.php">Showcase</a></li>
      <li><a href="store.php">Contact</a></li>
    </ul>


  </nav>
</div>
<?php
include "contact.php";
?>