async function getSession() {
    const sessionResponse = await fetch('../api/api_getSession.php')
    const sessionArray = await sessionResponse.json()
    const session = sessionArray[0]
    return session; 
}


async function deleteMenuItem(id_product) {
    let idProduct = {
        product: id_product
    } 
    let idProduct_json = 'idProduct_json=' + (JSON.stringify(idProduct));

    request= new XMLHttpRequest()
    request.open("POST", "../api/api_removeProduct.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    console.log(idProduct_json); 
    request.send(idProduct_json);
}


async function run() {
    const buttonsDelete = document.querySelectorAll('.itemRestaurantButtonDelete'); 

    if(!buttonsDelete) return; 

    const session = await getSession(); 

    buttonsDelete.forEach(function (buttonDelete) {
        buttonDelete.addEventListener('click', function() {
            const id_product = buttonDelete.value;
            
            deleteMenuItem(id_product);

            const prod = document.querySelector('#productItem' + id_product)

            prod.remove(); 

        })
    }) 

}


run(); 


