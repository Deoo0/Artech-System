function notif(data) {
  var notification = document.getElementById("notification");
  var formdata = new FormData();
  formdata.append("notif", data);
  fetch("javascript/ajax/notification.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((showdata) => {
      notification.innerHTML = showdata;
    });
}
function table(data) {
  var notif = document.getElementById("notification");
  var formdata = new FormData();

  formdata.append("order", data);
  fetch("javascript/ajax/orderTable.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((data) => {
      notif.innerHTML = data;
    });
}
function prompt(data) {
  var popup = document.getElementById("pop-up");
  var notif = document.getElementById("notification");
  var formdata = new FormData();

  formdata.append("prompt", data);
  fetch("javascript/ajax/prompt.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((data) => {
      notif.innerHTML = "";
      popup.innerHTML = data;
    });
}

function closeNotif() {
  var notification = document.getElementById("notification");
  notification.innerHTML = "";
}

function login() {
  var popup = document.getElementById("pop-up");
  fetch("javascript/ajax/login.php")
    .then((response) => response.text())
    .then((data) => {
      popup.innerHTML = data;
    });
  return false;
}

function closeLogin() {
  var popup = document.getElementById("pop-up");
  popup.innerHTML = "";
}

function loginBtn() {
  var loginbutton = document.getElementById("loginbutton");
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  var formdata = new FormData();
  formdata.append("lbtn", loginbutton.value);
  formdata.append("usn", username.value);
  formdata.append("pw", password.value);

  if (username.value == "") {
    notif("username empty field");
  } else {
    if (password.value == "") {
      notif("password empty field");
    } else {
      fetch("javascript/ajax/config.php", {
        method: "POST",
        body: formdata,
      })
        .then((response) => response.text())
        .then((data) => {
          if (data == "1") {
            window.location.href = "?";
          } else {
            notif(data);
          }
        });
    }
  }
  return false;
}

function addUser() {
  var popup = document.getElementById("pop-up");
  fetch("manage_user.php")
    .then((response) => response.text())
    .then((data) => {
      popup.innerHTML = data;
    });
  return false;
}

function submitUserBtn() {
  var addbtn = document.getElementById("adduserbutton");
  var name = document.getElementById("name");
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  var formdata = new FormData();
  formdata.append("abtn", addbtn.value);
  formdata.append("name", name.value);
  formdata.append("usn", username.value);
  formdata.append("pw", password.value);

  if (username.value == "" || password.value == "" || name.value == "") {
    notif("Field Empty");
  } else {
    fetch("javascript/ajax/config.php", {
      method: "POST",
      body: formdata,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data.trim() === "User Successfully Added") {
          prompt(data);
        } else {
          prompt(data);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        prompt("An error occurred.");
      });
  }
  return false;
}

function updateUser(id) {
  var upbutton = document.getElementById("updatebutton");
  var name = document.getElementById("name" + id);
  var username = document.getElementById("usn" + id);
  var password = document.getElementById("pass" + id);

  var formdata = new FormData();
  formdata.append("userID", id);
  formdata.append("name", name.value);
  formdata.append("usn", username.value);
  formdata.append("pass", password.value);
  formdata.append("upuserBtn", upbutton.value);

  fetch("javascript/ajax/config.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((data) => {
      prompt(data);
    })
    .catch((error) => {
      console.error("Error fetching order details:", error);
      notif("An error occurred while fetching order details.");
    });
}

function deleteUser(userId) {
  var confirmDelete = confirm("Are sure you want to delete this user?");

  if (confirmDelete) {
    var formdata = new FormData();
    formdata.append("deleteBtn", userId);

    fetch("javascript/ajax/config.php", {
      method: "POST",
      body: formdata,
    })
      .then((response) => response.text())
      .then((data) => {
        prompt(data);
      })
      .catch((error) => {
        console.error("Error", error);
        notif("An error has occured while deleteing user");
      });
  }
}
function updatePriceUser(userId) {
  var formdata = new FormData();
  formdata.append("updateBtn", userId);

  fetch("javascript/ajax/config.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((data) => {
      prompt(data);
    })
    .catch((error) => {
      console.error("Error", error);
      notif("An error has occured while deleteing user");
    });
}

function deleteProduct(id) {
  var confirmDelete = confirm("Are you sure you want to delete this product?");

  if (confirmDelete) {
    var formdata = new FormData();
    formdata.append("deleteProd", id);

    fetch("javascript/ajax/config.php", {
      method: "POST",
      body: formdata,
    })
      .then((response) => response.text())
      .then((data) => {
        prompt(data);
      })
      .catch((error) => {
        console.error("Error", error);
        notif("An error has occured");
      });
  }
}

function addProduct() {
  var pop = document.getElementById("pop-up");
  fetch("manage_product.php")
    .then((response) => response.text())
    .then((data) => {
      pop.innerHTML = data;
    });
  return false;
}

function submitProdBtn() {
  var addProd = document.getElementById("addProductbutton");
  var prodName = document.getElementById("productName");
  var prodPrice = document.getElementById("productPrice");

  var formdata = new FormData();
  formdata.append("addprod", addProd.value);
  formdata.append("prodName", prodName.value);
  formdata.append("prodPrice", prodPrice.value);

  if (prodName.value == "" || prodPrice.value == "") {
    notif("Field Empty");
  } else {
    if (!Number.isInteger(Number(prodPrice.value))) {
      notif("Product price must be an integer");
      return false;
    }
    fetch("javascript/ajax/config.php", {
      method: "POST",
      body: formdata,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data.trim() == "Product Successfully Added") {
          prompt(data);
        } else {
          prompt(data);
        }
      });
  }
  return false;
}

function addOrder() {
  var pop = document.getElementById("pop-up");
  fetch("manage_order.php")
    .then((response) => response.text())
    .then((data) => {
      pop.innerHTML = data;
    });
  return false;
}

function calculateCost() {
  var pop = document.getElementById("pop-up");
  fetch("cost_calculator.php")
    .then((response) => response.text())
    .then((data) => {
      pop.innerHTML = data;
    });
  return false;
}

let selectedPrice = 0; // Label: added for product price calculation

function updatePrice() {
  const productSelect = document.getElementById("product-select"); // Label: unchanged
  selectedPrice =
    parseFloat(
      productSelect.options[productSelect.selectedIndex].getAttribute(
        "data-price"
      )
    ) || 0; // Label: unchanged
  calculateTotal(); // Label: unchanged
}

function calculateTotal() {
  const quantity = parseInt(document.getElementById("quantity").value) || 0; // Label: unchanged
  const totalCost = selectedPrice * quantity; // Label: unchanged
  document.getElementById("total-cost").value = totalCost.toFixed(2); // Label: unchanged
}

function showOrder(productId) {
  var orderDetailsDiv = document.getElementById("notification");

  var formdata = new FormData();
  formdata.append("productId", productId);

  fetch("show_order.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((data) => {
      table(data); // Display fetched order details
    })
    .catch((error) => {
      console.error("Error fetching order details:", error);
      notif("An error occurred while fetching order details.");
    });

  return false;
}

function submitOrder() {
  // Get form data
  var product = document.getElementById("product-select");
  var clientName = document.getElementById("clientName");
  var clientContact = document.getElementById("clientContact");
  var quantity = document.getElementById("quantity");
  var totalCost = document.getElementById("total-cost");
  var deadline = document.getElementById("deadLine");
  var addorder = document.getElementById("addOrder");
  var status = document.getElementById("status-select").value;

  // Check the form values in the console for debugging
  console.log(
    product.value,
    clientName.value,
    clientContact.value,
    quantity.value,
    totalCost.value,
    deadline.value,
    addorder.value
  );

  var formdata = new FormData();
  formdata.append("product", product.value);
  formdata.append("name", clientName.value);
  formdata.append("contact", clientContact.value);
  formdata.append("quantity", quantity.value);
  formdata.append("cost", totalCost.value);
  formdata.append("deadline", deadline.value);
  formdata.append("addOrder", addorder.value);
  formdata.append("status", status);

  // Validate form fields before submission
  if (
    product.value === "" ||
    clientName.value === "" ||
    clientContact.value === "" ||
    quantity.value === "" ||
    totalCost.value === "" ||
    deadline.value === "" ||
    status === ""
  ) {
    notif("Field Empty");
    return false;
  } else {
    // Send data via Fetch API
    fetch("javascript/ajax/config.php", {
      method: "POST",
      body: formdata,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data.trim() == "Order Successfully Added") {
          prompt(data);
        } else {
          prompt("ERROR");
        }
      })
      .catch((error) => {
        console.error("Error fetching order details:", error);
        notif("An error occurred while fetching order details.");
      });
  }
  return false; // Prevent the default form submission
}

function deleteOrder(orderId) {
  var confirmMsg = confirm("Are you sure you want to delete this order?");

  if (confirmMsg) {
    var formdata = new FormData();
    formdata.append("deleteOrder", orderId);

    console.log(formdata);
    console.log("Sending to:", "javascript/ajax/config.php");
    fetch("javascript/ajax/config.php", {
      method: "POST",
      body: formdata,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data.trim() == "Successfully Deleted Order") {
          prompt(data);
        } else {
          propmt("Error: " + data);
        }
      })
      .catch((error) => {
        console.error("Error", error);
        alert("An error has occurred catch");
        window.location.href = "?";
      });
  }
  return false;
}

function upProduct(id) {
  var upBtn = document.getElementById("btn-update");
  var product = document.getElementById("prodname" + id);
  var price = document.getElementById("prodprice" + id);
  var status = document.getElementById("status" + id);

  var formdata = new FormData();
  formdata.append("upBtn", upBtn.value);
  formdata.append("productid", id);
  formdata.append("upname", product.value);
  formdata.append("upprice", price.value);
  formdata.append("upstatus", status.value);

  fetch("javascript/ajax/config.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((data) => {
      if (data.trim() == "Product Updated") {
        prompt(data);
      } else {
        alert(data);
      }
    })
    .catch((error) => alert("error" + error.message()));
  return false;
}
function closePrompt() {
  setTimeout(function () {
    window.location.reload();
  });
}

function upOrder(id) {
  var upBtn = document.getElementById("updateorder");
  var orderdate = document.getElementById("orderdate" + id);
  var ordername = document.getElementById("ordername" + id);
  var quantity = document.getElementById("quantity" + id);
  var totalprice = document.getElementById("price" + id);
  var deadline = document.getElementById("deadline" + id);
  var clientinfo = document.getElementById("orderinfo" + id);
  var status = document.getElementById("stat" + id);

  var formdata = new FormData();
  formdata.append("uporderBtn", upBtn.value);
  formdata.append("date", orderdate.value);
  formdata.append("name", ordername.value);
  formdata.append("quantity", quantity.value);
  formdata.append("price", totalprice.value);
  formdata.append("deadline", deadline.value);
  formdata.append("clientinfo", clientinfo.value);
  formdata.append("status", status.value);
  formdata.append("id", id);

  console.log("Sending data to config");
  console.log(ordername, orderdate, quantity, totalprice, deadline);
  fetch("javascript/ajax/config.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.text())
    .then((data) => {
      if (data.trim() == "Order Details Updated") {
        prompt(data);
      } else {
        prompt("ERROR");
        showOrder(id);
      }
    })
    .catch((error) => alert("error" + error.message()));
  return false;
}
