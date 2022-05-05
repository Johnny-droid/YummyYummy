const addButtons = document.querySelectorAll('.productButton')

if (addButtons) {
    addButtons.forEach(function(addButton) {
        addButton.addEventListener('click', async function() {
            const response = await fetch('api_getProduct.php?id_product=' + this.value);
            const product = await response.json();
            
            
            
            /*
            const sessionResponse = await fetch('api_getSession.php')
            const sessionArray = await sessionResponse.json();
            const session = sessionArray[0];
            console.log(session['id_restaurant']);
            */
            
            

            
            
        })
    });
        
    
}