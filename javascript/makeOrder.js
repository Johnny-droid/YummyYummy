// Get the buttons and the products
const addProductsToOrderButtons = document.querySelectorAll('.productOrderAddButton')
const aside = document.querySelector('.clientOrders');
const makeOrderButton = document.querySelector('#makeOrder');
let products = {}


async function getSessionProducts() {
    const sessionResponse = await fetch('../api/api_getSession.php')
    const sessionArray = await sessionResponse.json()
    const session = sessionArray[0]
    return session['products']
}
    
async function setSessionProducts() {
    // send the products to be added to session
    let products_json = 'products_json=' + (JSON.stringify(products))
    request= new XMLHttpRequest()
    request.open('POST', '../api/api_setSessionProducts.php', true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(products_json)

    /*
    console.log("The initial products: ")
    console.log(products_json)
    console.log("After seting session products: ")
    console.log(await getSessionProducts())
    */
}

async function drawOrder(id_product) {
    const responseProduct = await fetch('../api/api_getProduct.php?id_product=' + id_product);
    const product = await responseProduct.json();
    
    const productDivNew = document.createElement('div')
    const productName = document.createElement('strong')
    const productPrice = document.createElement('em')
    const productQuantity = document.createElement('em')
    const productRemove = document.createElement('button')

    const price = (product.price * (1 - (product.discount/100)));
    productPrice.innerHTML = (price.toFixed(2))  + ' € ';
    productName.innerHTML = product.name
    productQuantity.innerHTML = products[id_product];
    productQuantity.id = "productQuantity" + id_product;
    productRemove.innerHTML = 'Remove'
    productRemove.value = id_product
    productRemove.addEventListener('click', async function() {
        products[id_product] = 0;
        const productDivToRemove = document.getElementById('productDiv' + id_product);
        if (productDivToRemove) {
            productDivToRemove.remove();
        }
        setSessionProducts()
    })
    productRemove.classList.add('productOrderRemoveButton')

    productDivNew.classList.add('productInOrders')
    productDivNew.id = 'productDiv' + id_product
    productDivNew.appendChild(productName)
    productDivNew.appendChild(productPrice)
    productDivNew.innerHTML += " Quantity: "
    productDivNew.appendChild(productQuantity)
    productDivNew.appendChild(productRemove)
    aside.appendChild(productDivNew)
}

async function updateOrder(id_product) {
    const productQuantityId = document.querySelector("#productQuantity" + id_product)
    if (productQuantityId) {
        productQuantityId.innerHTML = products[id_product];
    }
}

async function redrawOrders(id_product) {
    const productDiv = document.getElementById('productDiv' + id_product)
    
    if (!productDiv) {
        drawOrder(id_product)
    } else {
        updateOrder(id_product)
    }
}


async function drawOrders() {
    products = await getSessionProducts()
    if (!aside) return
    keys = Object.keys(products)
    keys.forEach( (id_product) => {
        if (products[id_product] != 0) {
            drawOrder(id_product)
        }
    })
}

// draw the orders stored in session
drawOrders()

// When the product button is pressed, it should add the product to products and redraw the order section
if (addProductsToOrderButtons) {
    addProductsToOrderButtons.forEach( function(addProductsToOrderButton) {
        addProductsToOrderButton.addEventListener('click', function() {
            const id_product = addProductsToOrderButton.value
            
            if (products.hasOwnProperty(id_product)) {
                products[id_product]++
                //console.log('Product id: ' + id_product + '     Quantity: ' + products[id_product] + '\n')
            } else {
                products[id_product] = 1;
                //console.log('Product id: ' + id_product + '     Quantity: ' + products[id_product] + '\n')
            }
            
            redrawOrders(id_product)
            setSessionProducts()
        })         
    });
}

// When the make order button is pressed, it should make the order using the products in session 
if (makeOrderButton) {
    makeOrderButton.addEventListener('click', function() {
        window.location.href = "/../action/action_order.php"
    })
}