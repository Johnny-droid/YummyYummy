const session = await getSession(); 
id_user = session['id']; 
id_restaurant = session['id_restaurant']; 

async function getSession() {
    const sessionResponse = await fetch('../api/api_getSession.php')
    const sessionArray = await sessionResponse.json()
    const session = sessionArray[0]
    return session; 
}


async function getFav() {

}


async function addFavourite() {
    const request = new XMLHttpRequest(); 
    
    request.open("get", "../api/api_IsFavourite.php?" + "id_user=" + id_user 
                   + "&id_restaurant=" + id_restaurant, true)
    request.send()

    console.log(session); 

}

addFavourite(); 