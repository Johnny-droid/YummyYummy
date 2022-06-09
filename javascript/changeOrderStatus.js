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

    let orderInfo_json = 'orderInfo_json=' + (JSON.stringify(orderInfo));

    request= new XMLHttpRequest()
    request.open("POST", "../api/api_updateOrderStatus.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(orderInfo_json);
}

async function updateOrderCourier(id_order) {
    let orderCourier_json = 'orderCourier_json=' + (JSON.stringify(id_order));

    request= new XMLHttpRequest()
    request.open("POST", "../api/api_updateOrderCourier.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(orderCourier_json);
}

function addEventListenersPrevNext(type, id_order) {
    let previousButton = document.querySelector('#buttonPrevious' + id_order);
    let nextButton = document.querySelector('#buttonNext' + id_order);
    const allStatus = ['RECEIVED', 'PREPARING', 'READY', 'DELIVERED'];

    if (type === 'O') {
        if (previousButton) {
            previousButton.addEventListener('click', function () {
                let string = previousButton.getAttribute('id');
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



    } else if (type === 'E') {
        if (previousButton) {
            previousButton.addEventListener('click', function () {
                let string = previousButton.getAttribute('id');
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
                
                if (position >= 3 || position < 2) return;
                position++;

                orderStatusDisplayed.textContent = allStatus[position];
                updateColors();
                saveStatus(parseInt(id_order), allStatus[position]);
            })
        }
    }
}


async function run() {
    const session = await getSession();

    if (!session['id'] || !session['orders'] || (session['type'] === 'C')) return;


    // Previous and Next Button Interactions 
    for (id_order in session['orders']) {
        addEventListenersPrevNext(session['type'], id_order);
    }

    
    if (!session['orders_free'] || (session['type'] !== 'E')) return;

    for (id_order in session['orders_free']) {
        let acceptButton = document.querySelector('#buttonAccept' + id_order);
        
        if (acceptButton) {
            acceptButton.addEventListener('click', function () {

                const string = acceptButton.getAttribute('id');
                const id_order = string.replace(/^\D+/g, '');
                const article = document.querySelector('#availableOrder' + id_order); 
                const copyArticle = article.cloneNode(true);
                const acceptButtonToDelete = copyArticle.querySelector('.orderButtons');
                acceptButtonToDelete.remove();
                copyArticle.innerHTML += 
                    `
                    <div class="orderButtons">
                        <button id="buttonPrevious${id_order}">PREVIOUS</button>
                        <button id="buttonNext${id_order}">NEXT</button>
                    </div>
                
                    `

                updateOrderCourier(parseInt(id_order));
                article.remove();
                const courierOrdersSection = document.querySelector('.ordersGlobal:nth-child(2)')
                courierOrdersSection.appendChild(copyArticle)
                addEventListenersPrevNext('E', id_order)
            })
        }


    }

}


run();