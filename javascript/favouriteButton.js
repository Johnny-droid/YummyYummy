const clientFavourite = document.querySelector('#restaurantStatus')

if (restaurantStatus) {
    switch (restaurantStatus.textContent.trim().toLowerCase()) {
        case 'open':
            restaurantStatus.style.color = 'green'
            break;
        case 'closed':
            restaurantStatus.style.color = 'red'
            break;
        default:
            break;
    }



}