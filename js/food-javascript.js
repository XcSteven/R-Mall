let carts = document.querySelectorAll('.add-cart');

let products = [
  {
    name: 'Cherry',
    tag: 'cherry',
    price: 20,
    quantity: 0
  },
  {
    name: 'Sweet Potato',
    tag: 'sweetpotato',
    price: 1.5,
    quantity: 0
  }
];

for (let i=0; i < carts.length; i++) {
  carts[i].addEventListener('click', () => {
    cartNumbers(products[i]);
  })
};

function onLoadCartNumbers() {
  let productsNumbers = localStorage.getItem('cartNumbers');

  if (productsNumbers) {
    document.querySelector('.cart span').textContent = productsNumbers;
  }
};

function cartNumbers() {
  let productsNumbers = localStorage.getItem('cartNumbers');

  productsNumbers = parseInt(productsNumbers);

  if ( productsNumbers ) {
    localStorage.setItem('cartNumbers', productsNumbers + 1);
    document.querySelector('.cart span').textContent = productsNumbers + 1;
  } else {
    localStorage.setItem('cartNumbers', 1);
    document.querySelector('.cart span').textContent = 1;
  }

  localStorage.setItem('cartNumbers', 1);

  setItems(products)
};

function setItems(product) {
  let cartItems = localStorage.getItem('productsQuantity');

  cartItems = JSON.parse(cartItems);

  if (cartItems != null) {
    cartItems[product.name].quantity += 1
  } else {
    product.quantity = 1;
    let cartItems = {
      [product.name]: product
    }
  }

  localStorage.setItem('productsQuantity', JSON.stringify(cartItems));
};

function totalQuantity() {
  let cartQuantity = localStorage.getItem('totalQuantity');

  if (cartQuantity != null) {
    cartQuantity = parseInt(cartQuantity);
    localStorage.setItem('totalQuantity', cartQuantity)
  }
};

var closebtns = document.getElementsByClassName("close");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}

function displayCart() {
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);
  let productContainer = document.querySelector(".products-container")
  if (cartItems && productContainer) {
    productContainer.innerHTML = '';
    Object.values(cartItems).map(item => {
      productContainer.innerHTML += `
      <div class="product">
        <span class="close">X</span>
        <img src="images/${item.name}.jpg"></img>
        <span>${item.name}</span>
      </div>
      <div class="price">$${item.price}</div>
      <div class="quantity">
        <span>${item.quantity}</div>
      </div>
      `
    });
  }
}

onLoadCartNumbers();
displayCart();
