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


async function run() {
    const allStatus = ['RECEIVED', 'PREPARING', 'READY', 'DELIVERED'];
    const session = await getSession();
    console.log(session);
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
                    const saveButton = document.querySelector('#buttonSaveOrder' + id_order);
                    let position = allStatus.indexOf(saveButton.getAttribute('value'));

                    if (position <= 0) return;
                    position--;

                    saveButton.setAttribute('value', allStatus[position]);
                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                })
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    let string = nextButton.getAttribute('id');
                    let id_order = string.replace(/^\D+/g, '');
                    const orderStatusDisplayed = document.querySelector('#orderStatus' + id_order); 
                    const saveButton = document.querySelector('#buttonSaveOrder' + id_order);
                    let position = allStatus.indexOf(saveButton.getAttribute('value'));
                    

                    if (position >= 2) return;
                    position++;

                    saveButton.setAttribute('value', allStatus[position]);
                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                })
            }



        } else if (session['type'] === 'E') {
            if (previousButton) {
                previousButton.addEventListener('click', function () {
                    let string = nextButton.getAttribute('id');
                    let id_order = string.replace(/^\D+/g, '');
                    const orderStatusDisplayed = document.querySelector('#orderStatus' + id_order); 
                    const saveButton = document.querySelector('#buttonSaveOrder' + id_order);
                    let position = allStatus.indexOf(saveButton.getAttribute('value'));

                    if (position <= 2) return;
                    position--;

                    saveButton.setAttribute('value', allStatus[position]);
                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                })
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    let string = nextButton.getAttribute('id');
                    let id_order = string.replace(/^\D+/g, '');
                    const orderStatusDisplayed = document.querySelector('#orderStatus' + id_order); 
                    const saveButton = document.querySelector('#buttonSaveOrder' + id_order);
                    let position = allStatus.indexOf(saveButton.getAttribute('value'));
                    

                    if (position >= 3) return;
                    position++;

                    saveButton.setAttribute('value', allStatus[position]);
                    orderStatusDisplayed.textContent = allStatus[position];
                    updateColors();
                })
            }
        }
    }
}


run();