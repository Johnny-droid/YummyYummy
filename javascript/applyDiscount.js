async function getSession() {
    const sessionResponse = await fetch('../api/api_getSession.php')
    const sessionArray = await sessionResponse.json()
    const session = sessionArray[0]
    return session; 
}

function toggleDiscountButton() {
    const discountButtons = document.querySelectorAll('.itemRestaurantButtonDiscount');
    if (!discountButtons) return;

    discountButtons.forEach(function (discountButton) {
        discountButton.addEventListener('click', function() {
            const value = parseInt(discountButton.value);
            const id_product = discountButton.id.replace(/^\D+/g, '');
            const inputDiscount = document.querySelector('#inputDiscount' + id_product);
            const saveCheckButton = document.querySelector('#saveCheckBox' + id_product);

            if (value === 1) {
                discountButton.value = 0;
                inputDiscount.style.display = 'none';
                saveCheckButton.style.display = 'none';

            } else {
                discountButton.value = 1;
                inputDiscount.style.display = 'flex';
                saveCheckButton.style.display = 'flex';
            }
        })


    })
}

async function insertDiscount() {
    const applyDiscountButtons = document.querySelectorAll('.itemRestaurantButtonDiscountApply');

    if (!applyDiscountButtons) return;

    applyDiscountButtons.forEach(function(applyDiscountButton) {
        applyDiscountButton.addEventListener('click', function() {
            const id_product = parseInt(applyDiscountButton.value);
            const inputDiscount = document.querySelector('#inputDiscount' + id_product);
            const discount = parseInt(inputDiscount.value);

            applyDiscount(id_product, discount);
        })


    })
    
}


async function applyDiscount(id_product, newDiscount) {
    let info_discount = {
        product: id_product,
        discount: newDiscount
    } 
    let info_discount_json = 'info_discount_json=' + (JSON.stringify(info_discount));

    request= new XMLHttpRequest()
    request.open("POST", "../api/api_updateDiscount.php", true)
    request.addEventListener("load", function () {
        
        const product = JSON.parse(this.responseText)
        
        const productInfoDiv = document.querySelector('#productItemInfo' + product.id);
        

        if (product.discount === 0 ) {
            productInfoDiv.innerHTML = `
                ${product.name} ${product.price.toFixed(2)}€
            `
        } else {
            productInfoDiv.innerHTML = `
            ${product.name}  ${(product.price * (1 - (product.discount/100))).toFixed(2) }€ <br>
            Discount: ${product.discount}% &nbsp&nbsp Old price: ${product.price}€
        `
        }
        
    })
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(info_discount_json);
}


async function run() {
    const session = await getSession(); 
    if (!session['id'] || !session['id_restaurant'] || session['type'] !== 'O') return;

    toggleDiscountButton();

    insertDiscount();


}



run();