let descriptions = [...document.querySelectorAll('.choice-description')];
descriptions.forEach(element => {
    let parent = element.parentNode;
    element.innerHTML = parent.getAttribute('data-title') + " " + parent.getAttribute('data-price');
})

function updateDescription(element) {
    let desc;
    let message;
    let total = document.getElementById('order-total');
    let result = 0;
    if(element.id <=3) {
        desc = document.getElementById('main-description');
        message = "Πιάτο: "
        total.setAttribute('data-last-main-price', element.getAttribute('data-price'));
    } else {
        desc = document.getElementById('salad-description');
        message = "Σαλάτα: "
        total.setAttribute('data-last-salad-price', element.getAttribute('data-price'));
    }
    desc.innerHTML = message + element.getAttribute('data-title') + "<br>" + "Τιμή: " + element.getAttribute('data-price') + "€";
    if(total.getAttribute('data-last-main-price')) {
        result += parseFloat(total.getAttribute('data-last-main-price'));
    }
    if(total.getAttribute('data-last-salad-price')) {
        result += parseFloat(total.getAttribute('data-last-salad-price'));
    }
    total.innerHTML = "Σύνολο παραγγελίας: " + result.toFixed(2) + "€";
}
