

const addProductsToOrderButtons = document.querySelectorAll('.productOrderAddButton')

if (addProductsToOrderButtons) {
    addProductsToOrderButtons.forEach(function(addProductsToOrderButton) {
        addProductsToOrderButton.addEventListener('click', async function() {
            const responseSession = await fetch('api_setSessionProduct.php?id_product=' + this.value);
            const productsIds = await responseSession.json();

            const aside = document.querySelector('.clientOrders');
            aside.innerHTML = '';
            const h1Order = document.createElement('h1')
            h1Order.innerHTML = 'Order'
            aside.appendChild(h1Order)
            
            let idsUsed = new Set()

            //Maybe here we can use Promise All to get all products at the same time
            for (const productId of productsIds) {
                if (!idsUsed.has(productId)) {
                    idsUsed.add(productId)
                    const responseProduct = await fetch('api_getProduct.php?id_product=' + productId);
                    const product = await responseProduct.json();
                    
                    const productDiv = document.createElement('div')
                    const productName = document.createElement('strong')
                    const productPrice = document.createElement('em')
                    const productQuantity = document.createElement('em')
                    const productRemove = document.createElement('button')

                    const price = (product.price * (1 - (product.discount/100)));
                    productPrice.innerHTML = (price.toFixed(2))  + ' € ';
                    productName.innerHTML = product.name
                    productQuantity.innerHTML = 1;
                    productQuantity.id = "productQuantity" + productId;
                    productRemove.innerHTML = 'Remove'
                    productRemove.value = product.id
                    productRemove.addEventListener('click', async function() {
                        await fetch('api_removeSessionProduct.php?id_product=' + this.value);
                        const productDivToRemove = document.getElementById('productDiv' + productId);
                        if (productDivToRemove) {
                            productDivToRemove.remove();
                        }
                    })
                    productRemove.classList.add('productOrderRemoveButton')

                    productDiv.classList.add('productInOrders')
                    productDiv.id = 'productDiv' + productId
                    productDiv.appendChild(productName)
                    productDiv.appendChild(productPrice)
                    productDiv.innerHTML += " Quantity: "
                    productDiv.appendChild(productQuantity)
                    productDiv.appendChild(productRemove)
                    aside.appendChild(productDiv)
                
                } else {
                    const productQuantityId = document.querySelector("#productQuantity" + productId)
                    if (productQuantityId) {
                        productQuantityId.innerHTML = parseInt(productQuantityId.innerHTML) + 1;
                    }
                        
                }

            }
            

            
            /*
            const sessionResponse = await fetch('api_getSession.php')
            const sessionArray = await sessionResponse.json();
            const session = sessionArray[0];
            console.log(session['id_restaurant']);
            */          
            
        })
    });
}




