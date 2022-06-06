function toggleReviewButton() {
    let reviewButton = document.querySelector('#buttonMakeReview');
    let reviewForm = document.querySelector('#makeReviewForm');
    
    if (reviewForm.style.display === "none") {
        reviewForm.style.display = "flex";
        reviewButton.textContent = 'Hide Review'
    } else {
        reviewForm.style.display = "none";
        reviewButton.textContent = 'Make Review';
    }
}

