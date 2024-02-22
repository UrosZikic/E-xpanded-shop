const search_engine = document.querySelector(".search_engine");
const suggest_container = document.querySelector(".suggest_container");
async function fetchProducts() {
  while (suggest_container.firstChild) {
    suggest_container.removeChild(suggest_container.firstChild);
  }
  try {
    await fetch("API.php")
      .then((response) => {
        if (!response.ok) {
          throw new Error("error 404");
        }
        return response.json();
      })
      .then((data) => {
        let none_found = 1;
        let count = 1;
        data.forEach((product) => {
          count++;
          if (
            product.name.includes(search_engine.value) &&
            search_engine.value != ""
          ) {
            let suggested_product = document.createElement("div");
            let suggested_link = document.createElement("a");
            suggested_link.href = "store_product.php?product_id=" + product.id;
            let product_img = document.createElement("img");
            product_img.src =
              "assets/images/products/" + product.image + ".webp";
            let product_name = document.createElement("p");
            product_name.textContent = product.name;
            let product_price = document.createElement("p");
            product_price.textContent = "$" + product.price;
            suggested_link.appendChild(product_img);
            suggested_link.appendChild(product_name);
            suggested_link.appendChild(product_price);
            suggested_product.appendChild(suggested_link);
            suggested_product.classList.add("suggested_product");
            suggested_product.classList.remove("s_p_none");
            if (suggest_container.children.length < 5)
              suggest_container.appendChild(suggested_product);
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
              suggested_product.classList.add("suggested_product");
              suggested_product.classList.add("s_p_none");
              suggested_product.appendChild(product_name);
              suggest_container.appendChild(suggested_product);
              none_found = 0;
            }
          }
        });
      })
      .catch((error) => {
        console.error("you have an error!", error);
      });
  } catch (error) {
    console.error("error", error);
  }
}
document.addEventListener("keyup", fetchProducts);
search_engine.onclick = () => fetchProducts();

body.onclick = (event) => {
  var clickedElement = event.target;
  if (!suggest_container.contains(clickedElement)) {
    while (suggest_container.firstChild) {
      suggest_container.removeChild(suggest_container.firstChild);
    }
  }
};

const search_btn = document.querySelector(".search_confirm");
search_btn.addEventListener("click", function () {
  window.location.href = "store.php?s_val=" + search_engine.value;
});
