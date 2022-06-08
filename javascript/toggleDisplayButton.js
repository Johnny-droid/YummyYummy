function toggleDisplayButton(idButton, idForm, showString, hideString) {
    let reviewButton = document.querySelector('#' + idButton);
    let reviewForm = document.querySelector('#' + idForm);
    
    if (reviewForm.style.display === "none") {
        reviewForm.style.display = "flex";
        reviewButton.textContent = hideString;
    } else {
        reviewForm.style.display = "none";
        reviewButton.textContent = showString;
    }
}

