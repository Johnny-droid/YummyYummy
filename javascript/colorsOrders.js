const ordersStatus = document.querySelectorAll('.orderStatus')

if (ordersStatus) {
    ordersStatus.forEach( function (orderStatus) {
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



