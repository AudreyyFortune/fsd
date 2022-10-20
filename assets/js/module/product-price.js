/// PAS UTILISE A SUPPRIMER !!!


const ProductPrice = () => {

    let els = {};

    const dom = () => {
        els.buttonProduct = document.querySelector('.js-product-page-submit')
        els.buttonOrder = document.querySelector('.js-order-page-submit')
    }

    const bind = () => {
        if (els.buttonProduct != null) {
            els.buttonProduct.addEventListener('click', function (e) {
                storeProductPrice();
            })
        }
        if (els.buttonOrder != null) {
                readProductPrice();
        }
    }

    const storeProductPrice = () => {

            els.radios = document.querySelectorAll('.js-price-selected');

            els.radios.forEach(radio => {
                if(radio.checked) {
                    localStorage.setItem('data-price', radio.dataset.price)
                }
            })
    }

    const readProductPrice = () => {
        document.getElementById('order_product_price').innerHTML = localStorage.getItem('data-price') ;
        console.log(localStorage.getItem('data-price'));
    }


    const init = () => {
        if (document.querySelector('.js-product-page-submit') || document.querySelector('.js-order-page-submit')) {
            dom();
            bind();
        }

    }
    init();

}

module.exports = ProductPrice;