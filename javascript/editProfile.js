let id_user;

async function getSession() {
    const sessionResponse = await fetch('../api/api_getSession.php')
    const sessionArray = await sessionResponse.json()
    const session = sessionArray[0]
    return session;
}


// maybe use a array map to store the previous displays 
function getEditElement(parameter) {
    return `
    <div id="${parameter}Div2" class="itemProfile2">
        <input id="${parameter}Value" type="text" placeholder="...">
        <button class="itemProfileButtonCheck" id="${parameter}Check">&#10003</button>
        <button class="itemProfileButtonCross" id="${parameter}Cross">&#10007</button>
    </div>
    `
}

function saveChange(parameter, newValue) {

    let info = {
        param: parameter,
        value: newValue
    } 

    let info_json = 'info_json=' + (JSON.stringify(info));

    request= new XMLHttpRequest()
    request.addEventListener("load", function () {
        
        const response = JSON.parse(this.responseText)

        const selfDiv = document.querySelector('#' + parameter + 'Div2');
        selfDiv.classList.replace('itemProfile1', 'itemProfile2');

        const displayDiv = document.querySelector('#' + parameter + 'Div1');
        displayDiv.classList.replace('itemProfile2', 'itemProfile1');

        const valueDiv = displayDiv.querySelector('div:first-child');
        valueDiv.innerHTML = response.replace(/[\u00A0-\u9999<>\&]/g, function(i) {
            return '&#'+i.charCodeAt(0)+';';
         });

    })
    request.open("POST", "../api/api_updateUser.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(info_json);


}

async function run() {
    const session = await getSession();
    if (!session['id']) return;
    id_user = session['id'];

    // Add the hidden form
    const itemsProfile = document.querySelectorAll('.itemProfile1')
    itemsProfile.forEach(function (itemProfile) {
        const editButton = itemProfile.querySelector('.itemProfileButtonEdit');
        if (!editButton) return;
        const parameter = editButton.getAttribute('id')
        itemProfile.insertAdjacentHTML("afterend", getEditElement(parameter))

    })

    // Add event listeners for the buttons
    // Edit 
    const editButtons = document.querySelectorAll('.itemProfileButtonEdit');
    if (!editButtons) return;

    editButtons.forEach(function (editButton) {
        editButton.addEventListener('click', function () {
            const parameter = editButton.getAttribute('id');

            const selfDiv = document.querySelector('#' + parameter + 'Div1');
            selfDiv.classList.replace('itemProfile1', 'itemProfile2');

            const formDiv = document.querySelector('#' + parameter + 'Div2');
            formDiv.classList.replace('itemProfile2', 'itemProfile1');
        })
    })

    // Cross
    const crossButtons = document.querySelectorAll('.itemProfileButtonCross');
    if (!crossButtons) return;
    
    crossButtons.forEach( function (crossButton) {
        crossButton.addEventListener('click', function () {
            const parameter = crossButton.getAttribute('id').replace("Cross", "");

            const selfDiv = document.querySelector('#' + parameter + 'Div2');
            selfDiv.classList.replace('itemProfile1', 'itemProfile2');

            const displayDiv = document.querySelector('#' + parameter + 'Div1');
            displayDiv.classList.replace('itemProfile2', 'itemProfile1');
        })
    })

    // Check
    const checkButtons = document.querySelectorAll('.itemProfileButtonCheck');
    if (!checkButtons) return;

    checkButtons.forEach(function (checkButton) {
        checkButton.addEventListener('click', function () {
            const parameter = checkButton.getAttribute('id').replace('Check', '');
            const input = document.querySelector('#' + parameter + 'Value');
            const value = input.value;
            const response = saveChange(parameter, value);
        })
    })

}


run();