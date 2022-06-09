async function getSession() {
    const sessionResponse = await fetch('../api/api_getSession.php')
    const sessionArray = await sessionResponse.json()
    const session = sessionArray[0]
    return session;
}

async function updateColors() {
    const ordersStatus = document.querySelectorAll('.orderStatus')

    if (ordersStatus) {
        ordersStatus.forEach(function (orderStatus) {
            switch (orderStatus.textContent.trim()) {
                case "RECEIVED":
                    orderStatus.style.backgroundColor = 'rgba(0, 255, 255, 0.3)';
                    orderStatus.style.color = 'rgb(0, 200, 255)'
                    break;

                case "PREPARING":
                    orderStatus.style.backgroundColor = 'rgba(255, 0, 0, 0.4)';
                    orderStatus.style.color = 'red'
                    break;

                case "READY":
                    orderStatus.style.backgroundColor = 'lightyellow';
                    orderStatus.style.color = 'rgb(255, 235, 0)'
                    break;

                case "DELIVERED":
                    orderStatus.style.backgroundColor = 'rgba(0, 255, 0, 0.2)';
                    orderStatus.style.color = 'rgb(50, 255, 50)'
                    break;

                default:
                    break;
            }
        })
    }
}


async function saveStatus(id_order, statusText) {
    let orderInfo = {
        order: id_order,
        status: statusText
    } 
    console.log(orderInfo)
    let orderInfo_json = 'orderInfo_json=' + (JSON.stringify(orderInfo));

    request= new XMLHttpRequest()
    request.open("POST", "../api/api_updateOrderStatus.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(orderInfo_json);
}


async function run() {
    const allStatus = ['RECEIVED', 'PREPARING', 'READY', 'DELIVERED'];
    const session = await getSession();

    if (!session['id'] || !session['orders'] || (session['type'] === 'C')) return;

    for (id_order in session['orders']) {
        let previousButton = document.querySelector('#buttonPrevious' + id_order);
        let nextButton = document.querySelector('#buttonNext' + id_order);

        if (session['type'] === 'O') {
            if (previousButton) {
                previousButton.addEventListener('click', function () {
                    let string = nextButton.getAttribute('id');
                    let id_order = string.replace(/^\D+/g, '');
                    const orderStatusDisplayed = document.querySelector('#orderStatus' + id_order); 
                    const status = orderStatusDisplayed.textContent.trim()
                    let position = allStatus.indexOf(status);

                    if (position <= 0) return;
                    position--;

                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                    saveStatus(parseInt(id_order), allStatus[position]);
                })
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    let string = nextButton.getAttribute('id');
                    let id_order = string.replace(/^\D+/g, '');
                    const orderStatusDisplayed = document.querySelector('#orderStatus' + id_order); 
                    const status = orderStatusDisplayed.textContent.trim()
                    let position = allStatus.indexOf(status);
                    
                    if (position >= 2) return;
                    position++;

                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                    saveStatus(parseInt(id_order), allStatus[position]);
                })
            }



        } else if (session['type'] === 'E') {
            if (previousButton) {
                previousButton.addEventListener('click', function () {
                    let string = nextButton.getAttribute('id');
                    let id_order = string.replace(/^\D+/g, '');
                    const orderStatusDisplayed = document.querySelector('#orderStatus' + id_order); 
                    const status = orderStatusDisplayed.textContent.trim()
                    let position = allStatus.indexOf(status);

                    if (position <= 2) return;
                    position--;

                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                    saveStatus(parseInt(id_order), allStatus[position]);
                })
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    let string = nextButton.getAttribute('id');
                    let id_order = string.replace(/^\D+/g, '');
                    const orderStatusDisplayed = document.querySelector('#orderStatus' + id_order); 
                    const status = orderStatusDisplayed.textContent.trim()
                    let position = allStatus.indexOf(status);
                    
                    if (position >= 3) return;
                    position++;

                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                    saveStatus(parseInt(id_order), allStatus[position]);
                })
            }
        }



    }
}


run();