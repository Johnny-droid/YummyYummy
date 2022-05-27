const ordersStatus = document.querySelectorAll('.orderStatus')

console.log("Hey!")

if (ordersStatus) {
    ordersStatus.forEach( function (orderStatus) {
        if (orderStatus.textContent == "READY".textContent) {
            console.log("Wow!")
        } else if (orderStatus.textContent === "READY".textContent) {
            console.log("Wow2!");
        } else if (orderStatus.textContent === 'READY'.textContent) {
            console.log("Wow3!");
        } else {
            console.log(orderStatus.textContent)
        }
    })
}



