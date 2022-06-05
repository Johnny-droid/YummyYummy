const searchBar = document.querySelector('#inputSearch')
if (searchBar) {
    searchBar.addEventListener('input', async function() {
    const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
    const restaurants = await response.json()

    const section = document.querySelector('#restaurantsSearch')
    section.innerHTML = ''
    if (restaurants.length > 0) {
        section.style.padding = '2em'
    } else {
        section.style.padding = '0em'
    }
    

    for (const restaurant of restaurants) {
        const article = document.createElement('article')
        article.classList.add('restaurantSearch')

        const img = document.createElement('img')
        img.src = '../images/Restaurants/Restaurant' + restaurant.id + '.jpg'

        const infoRestaurant = document.createElement('div')

        const link = document.createElement('a')
        link.href = '../pages/restaurant.php?id=' + restaurant.id
        link.textContent = restaurant.name

        infoRestaurant.appendChild(link)
        article.appendChild(img)
        article.appendChild(infoRestaurant)
        section.appendChild(article)
    }
  })
}
