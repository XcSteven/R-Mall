let carts = document.querySelectorAll('.add-cart');

let products = [
  {
    name: 'Cherry',
    tag: 'cherry',
    id: 1,
    price: 20,
    inCart: 0
  },
  {
    name: 'Pepsi',
    tag: 'pepsi',
    id:2, 
    price: 0.40,
    inCart: 0
  }
];

for(let i=0; i< carts.length; i++) {
  carts[i].addEventListener('click', () => {
      cartNumbers(products[i]);
      totalAmount(products[i]);
  });
}

function onLoadCartNumbers() {
  let productNumbers = localStorage.getItem('cartNumbers');
  if( productNumbers ) {
      document.querySelector('.cart span').textContent = productNumbers;
  }
}

function cartNumbers(product, action) {
  let productNumbers = localStorage.getItem('cartNumbers');
  productNumbers = parseInt(productNumbers);

  let cartItems = localStorage.getItem('productsInCart');
  cartItems = JSON.parse(cartItems);

  if( action ) {
      localStorage.setItem("cartNumbers", productNumbers - 1);
      document.querySelector('.cart span').textContent = productNumbers - 1;
  } else if( productNumbers ) {
      localStorage.setItem("cartNumbers", productNumbers + 1);
      document.querySelector('.cart span').textContent = productNumbers + 1;
  } else {
      localStorage.setItem("cartNumbers", 1);
      document.querySelector('.cart span').textContent = 1;
  }
  setItems(product);
}

function setItems(product) {
  // let productNumbers = localStorage.getItem('cartNumbers');
  // productNumbers = parseInt(productNumbers);
  let cartItems = localStorage.getItem('productsInCart');
  cartItems = JSON.parse(cartItems);

  if(cartItems != null) {
      let currentProduct = product.tag;
  
      if( cartItems[currentProduct] == undefined ) {
          cartItems = {
              ...cartItems,
              [currentProduct]: product
          }
      } 
      cartItems[currentProduct].inCart += 1;

  } else {
      product.inCart = 1;
      cartItems = { 
          [product.tag]: product
      };
  }

  localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}

function totalAmount( product, action ) {
    let cart = localStorage.getItem("totalAmount");
    if( action) {
        cart = parseInt(cart);
        localStorage.setItem("totalAmount", cart - 1);
    } else if(cart != null) {       
        cart = parseInt(cart);
        localStorage.setItem("totalAmount", cart + 1); 
    } else {
        localStorage.setItem("totalAmount", product.inCart);
    }
}

function displayCart() {
  let cartItems = localStorage.getItem('productsInCart');
  cartItems = JSON.parse(cartItems);

  let cart = localStorage.getItem("totalAmount");
  cart = parseInt(cart);

  let productContainer = document.querySelector('.products');
  
  if( cartItems && productContainer ) {
      productContainer.innerHTML = '';
      Object.values(cartItems).map( (item, index) => {
          productContainer.innerHTML += 
          `<div class="product">
               <img src="images/close.jpg">
               <span>${item.name}</span>
          </div>
          <div class="price">$${item.price}</div>
          <div class="quantity">
              <img class="decrease" src="images/down.jpg">
                  <span>${item.inCart}</span>
              <img class="increase" src="images/up.jpg">   
          </div>`;
      });

      productContainer.innerHTML += `
          <div class="basketTotalContainer">
              <h4 class="basketTotalTitle">Total Amount</h4>
              <h4 class="basketTotal">${cart}</h4>
          </div>`

      deleteButtons();
      manageQuantity();
  }
}

function manageQuantity() {
  let decreaseButtons = document.querySelectorAll('.decrease');
  let increaseButtons = document.querySelectorAll('.increase');
  let currentQuantity = 0;
  let currentProduct = '';
  let cartItems = localStorage.getItem('productsInCart');
  cartItems = JSON.parse(cartItems);

  for(let i=0; i < increaseButtons.length; i++) {
      decreaseButtons[i].addEventListener('click', () => {
          console.log(cartItems);
          currentQuantity = decreaseButtons[i].parentElement.querySelector('span').textContent;
          console.log(currentQuantity);
          currentProduct = decreaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
          console.log(currentProduct);

          if( cartItems[currentProduct].inCart > 1 ) {
              cartItems[currentProduct].inCart -= 1;
              cartNumbers(cartItems[currentProduct], "decrease");
              totalAmount(cartItems[currentProduct], "decrease");
              localStorage.setItem('productsInCart', JSON.stringify(cartItems));
              displayCart();
          }
      });

      increaseButtons[i].addEventListener('click', () => {
          console.log(cartItems);
          currentQuantity = increaseButtons[i].parentElement.querySelector('span').textContent;
          console.log(currentQuantity);
          currentProduct = increaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
          console.log(currentProduct);

          cartItems[currentProduct].inCart += 1;
          cartNumbers(cartItems[currentProduct]);
          totalAmount(cartItems[currentProduct]);
          localStorage.setItem('productsInCart', JSON.stringify(cartItems));
          displayCart();
      });
  }
}

function deleteButtons() {
  let deleteButtons = document.querySelectorAll('.product img');
  let productNumbers = localStorage.getItem('cartNumbers');
  let cartAmount = localStorage.getItem("totalAmount");
  let cartItems = localStorage.getItem('productsInCart');
  cartItems = JSON.parse(cartItems);
  let productName;
  console.log(cartItems);

  for(let i=0; i < deleteButtons.length; i++) {
      deleteButtons[i].addEventListener('click', () => {
          productName = deleteButtons[i].parentElement.textContent.toLocaleLowerCase().replace(/ /g,'').trim();
         
          localStorage.setItem('cartNumbers', productNumbers - cartItems[productName].inCart);
          localStorage.setItem('totalAmount', cartAmount - cartItems[productName].inCart);

          delete cartItems[productName];
          localStorage.setItem('productsInCart', JSON.stringify(cartItems));

          displayCart();
          onLoadCartNumbers();
      })
  }
}

onLoadCartNumbers();
displayCart()
