const search_engine = document.querySelector(".search_engine");
const suggest_container = document.querySelector(".suggest_container");
let name_handle;

function fetchProducts() {
  while (suggest_container.firstChild) {
    suggest_container.removeChild(suggest_container.firstChild);
  }

  fetch("API.php")
    .then(function (response) {
      if (!response.ok) {
        throw new Error("error 404");
      }
      return response.json();
    })
    .then(function (data) {
      let none_found = 1;
      let count = 1;
      data.forEach(function (product) {
        count++;
        if (search_engine.value.includes("'s")) {
          name_handle = search_engine.value.replace("'s", "_z");
        } else if (search_engine.value.includes("'")) {
          name_handle = search_engine.value.replace("'", "_");
        } else {
          name_handle = search_engine.value;
        }
        if (
          product.name.toLowerCase().includes(name_handle.toLowerCase()) &&
          name_handle != ""
        ) {
          let suggested_product = document.createElement("div");
          let suggested_link = document.createElement("a");
          suggested_link.href = "store_product.php?product_id=" + product.id;
          let product_img = document.createElement("img");
          product_img.src = "assets/images/products/" + product.image + ".webp";
          let product_name = document.createElement("p");
          product_name.textContent = product.name.replace("_z", "'s");
          let product_price = document.createElement("p");
          product_price.textContent = "$" + product.price;
          suggested_link.appendChild(product_img);
          suggested_link.appendChild(product_name);
          suggested_link.appendChild(product_price);
          suggested_product.appendChild(suggested_link);
          suggested_product.classList.add("suggested_product");
          suggested_product.classList.remove("s_p_none");
          if (
            suggest_container.children.length < 5 &&
            // checks if the container has a child of this specific data-name
            !suggest_container.querySelector(
              `[data-product-name="${product.name}"]`
            )
          ) {
            suggest_container.appendChild(suggested_product);
            // assigns the data-name and prevents a generation of a duplicate
            suggested_product.setAttribute("data-product-name", product.name);
          }
        } else {
          if (
            none_found &&
            search_engine.value != "" &&
            count == data.length &&
            !suggest_container.firstChild
          ) {
            let suggested_product = document.createElement("div");
            let product_name = document.createElement("p");
            product_name.textContent = "No results found :/";
            product_name.classList.add("pr_name");

            suggested_product.classList.add("suggested_product");
            suggested_product.classList.add("s_p_none");
            suggested_product.appendChild(product_name);
            suggest_container.appendChild(suggested_product);
            none_found = 0;
          }
        }
      });
    })
    .catch(function (error) {
      console.error("you have an error!", error);
    });
}

document.addEventListener("keyup", fetchProducts);
search_engine.onclick = () => fetchProducts();

document.body.onclick = (event) => {
  var clickedElement = event.target;
  if (!suggest_container.contains(clickedElement)) {
    while (suggest_container.firstChild) {
      suggest_container.removeChild(suggest_container.firstChild);
    }
  }
};

const search_btn = document.querySelector(".search_confirm");
search_btn.addEventListener("click", function () {
  if (
    name_handle.trim().toLowerCase() != "" &&
    (!document.querySelector(".pr_name") ||
      document.querySelector(".pr_name").innerHTML != "No results found :/")
  ) {
    window.location.href = "store.php?s_val=" + name_handle;
  } else {
    search_engine.value = "";
  }
});

document.addEventListener("keyup", function (e) {
  e.preventDefault();
  if (
    e.key === "Enter" &&
    name_handle.trim().toLowerCase() != "" &&
    (!document.querySelector(".pr_name") ||
      document.querySelector(".pr_name").innerHTML != "No results found :/")
  ) {
    if (name_handle.includes("'s")) {
      name_handle = search_engine.value.replace("'s", "_z");
    } else if (name_handle.includes("'")) {
      name_handle = search_engine.value.replace("'", "_");
    }
    window.location.href = "store.php?s_val=" + name_handle;
  }
});
