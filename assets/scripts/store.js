const categories = document.querySelectorAll(".category");
const devices = document.querySelectorAll(".device");
const prices = document.querySelectorAll(".price");

if (document.querySelector(".pagination").children.length === 1) {
  while (document.querySelector(".pagination").firstChild) {
    document
      .querySelector(".pagination")
      .removeChild(document.querySelector(".pagination").firstChild);
  }
}

function build_a_link() {
  let arr_cat = [];
  let arr_dev = [];
  let arr_price = [];

  categories.forEach((cat) => {
    if (cat.checked == true) {
      arr_cat.push(cat.name);
    }
  });

  let base_url;

  if (arr_cat.length > 0) {
    base_url = "store.php?category=";
    for (let i = 0; i < arr_cat.length; i++) {
      base_url += `${arr_cat[i]}`;
      if (i + 1 !== arr_cat.length) {
        base_url += ",";
      }
    }
  }
  console.log(base_url);

  devices.forEach((dev) => {
    if (dev.checked == true) {
      arr_dev.push(dev.name);
    }
  });
  console.log(base_url);

  if (arr_dev.length > 0) {
    if (arr_cat.length > 0) {
      base_url += "&";
    } else {
      base_url = "store.php?";
    }
    for (let i = 0; i < arr_dev.length; i++) {
      if (i == 0) {
        base_url += "device=" + arr_dev[0];
      } else {
        base_url += `${arr_dev[i]}`;
      }
      if (i + 1 < arr_dev.length) {
        base_url += ",";
      }
    }
  }
  console.log(base_url);

  prices.forEach((price) => {
    if (price) {
      if (!price.value == "") arr_price.push(price.value);
    }
  });
  console.log(arr_price[0] !== "", arr_price[1]);
  if (arr_price[0] !== undefined && arr_price[1] !== undefined) {
    if (arr_cat.length >= 1 || arr_dev.length >= 1) {
      base_url += "&price=";
    } else {
      base_url = "store.php?price=";
    }
    for (let i = 0; i < arr_price.length; i++) {
      if (i == 0) {
        base_url += arr_price[0];
      } else {
        base_url += `${arr_price[i]}`;
      }
      if (i + 1 < arr_price.length) {
        base_url += ",";
      }
    }
  }
  console.log(base_url);

  if (
    arr_cat.length < 1 &&
    arr_dev.length < 1 &&
    arr_price[0] === undefined &&
    arr_price[1] === undefined
  ) {
    base_url = "store.php";
  } else {
    // base_url += "&i=12&m=1";
  }
  console.log(base_url);
  return (window.location.href = base_url);
}
document.addEventListener("click", function (event) {
  if (
    !document.querySelector(".expand").contains(event.target) &&
    !document.querySelector("#store_main .form").contains(event.target)
  ) {
    document
      .querySelector("#store_main .form")
      .classList.remove("expand_filter");
    expanded = false;
  }
});
