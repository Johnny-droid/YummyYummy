const ratingsStatus = document.querySelectorAll('.reviewRating')

if (ratingsStatus) {
    ratingsStatus.forEach( function (ratingStatus) {
        switch (ratingStatus.textContent.trim()) {
            case "1":
                ratingStatus.style.backgroundColor = 'red';
                break;
            
            case "2":
                ratingStatus.style.backgroundColor = 'rgba(255, 191, 0)';
                break;

            case "3":
                ratingStatus.style.backgroundColor = 'yellow';
                break;
            
            case "4":
                ratingStatus.style.backgroundColor = 'rgba(144,238,144)';
                break;
        
            case "5":
                ratingStatus.style.backgroundColor = 'lime';
                break;

            default:
                break;
        }
    })
}
