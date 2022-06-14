async function getSession() {
    const sessionResponse = await fetch('/../api/api_getSession.php')
    const sessionArray = await sessionResponse.json()
    const session = sessionArray[0]
    return session; 
}

async function toggleFavourite(id_user, id_restaurant, changeStatus) {
    let favInfo = {
        user: id_user,
        restaurant: id_restaurant,
        change: changeStatus
    } 
    let favInfo_json = 'favInfo_json=' + (JSON.stringify(favInfo));

    request= new XMLHttpRequest()
    request.addEventListener("load", function () {
        let exists = JSON.parse(this.responseText)
        updateButtonText(exists);
    })
    request.open("POST", "/../api/api_isFavourite.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(favInfo_json);
}


function updateButtonText(isFavourite) {
    if (isFavourite) {
        buttonFav.textContent = '⭐ REMOVE FROM FAVOURITES'
    } else {
        buttonFav.textContent = '⭐ ADD TO FAVOURITES'
    }
}

async function run() {
    const session = await getSession(); 
    if (!session['id'] || !session['id_restaurant']) return;

    const id_user = session['id']; 
    const id_restaurant = session['id_restaurant']; 
    let isFav = toggleFavourite(id_user, id_restaurant, false);
    buttonFav.addEventListener('click', function () {
        toggleFavourite(id_user, id_restaurant, true);
    })
}


const buttonFav = document.querySelector('#buttonFavourite')

if (buttonFav) {
    run();
}
