async function showProductInOrder(id_product, addToSession) {
    if (addToSession) {
        const response = await fetch('api_setSessionProduct.php?id_product=' + id_product);
        const session = await response.json() 
    } 
    
    
    const aside = document.querySelector('.clientOrders');
    if (!aside) {
        aside.innerHTML = '';
        const h1Order = document.createElement('h1')
        const buttonSaveOrder = document.createElement('button')
        
        h1Order.innerHTML = 'Order'
        buttonSaveOrder.innerHTML = 'Save Order'
        buttonSaveOrder.id = 'saveOrder'
        aside.appendChild(h1Order)
        aside.appendChild(buttonSaveOrder)
        aside.classList.add('clientOrders')
        const main = document.querySelector('main')
        main.appendChild(aside)
    }

    
    
    const productDiv = document.getElementById('productDiv' + id_product)

    if (!productDiv) {

        const responseProduct = await fetch('api_getProduct.php?id_product=' + id_product);
        const product = await responseProduct.json();
        
        const productDivNew = document.createElement('div')
        const productName = document.createElement('strong')
        const productPrice = document.createElement('em')
        const productQuantity = document.createElement('em')
        const productRemove = document.createElement('button')

        const price = (product.price * (1 - (product.discount/100)));
        productPrice.innerHTML = (price.toFixed(2))  + ' € ';
        productName.innerHTML = product.name
        productQuantity.innerHTML = 1;
        productQuantity.id = "productQuantity" + id_product;
        productRemove.innerHTML = 'Remove'
        productRemove.value = id_product
        productRemove.addEventListener('click', async function() {
            await fetch('api_removeSessionProduct.php?id_product=' + id_product);
            const productDivToRemove = document.getElementById('productDiv' + id_product);
            if (productDivToRemove) {
                productDivToRemove.remove();
            }
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
    
    } else {
        const productQuantityId = document.querySelector("#productQuantity" + id_product)
        if (productQuantityId) {
            productQuantityId.innerHTML = parseInt(productQuantityId.innerHTML) + 1;
        }
            
    }
    
}

async function showProductInOrderBeginning() {
    const response = await fetch('api_setSessionProduct.php')
    const sessionProductsObject = await response.json();
    let sessionProducts = Object.values(sessionProductsObject)
    sessionProducts = sessionProducts.filter(function(el) {return el !== null})

    sessionProducts.forEach( function (product_id) {
        if (product_id) {
           showProductInOrder(product_id, false) 
        }
    }) 
}

showProductInOrderBeginning();

const addProductsToOrderButtons = document.querySelectorAll('.productOrderAddButton')

if (addProductsToOrderButtons) {
    addProductsToOrderButtons.forEach( function(addProductsToOrderButton) {
        addProductsToOrderButton.addEventListener('click', function() {
            showProductInOrder(addProductsToOrderButton.value, true)
        })         
    });
}










/*
const sessionResponse = await fetch('api_getSession.php')
const sessionArray = await sessionResponse.json();
const session = sessionArray[0];
console.log(session['id_restaurant']);
*/      


