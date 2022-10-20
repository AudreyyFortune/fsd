const cookie = require('./../component/cookies.js')


const SearchCountry = () => {

    let els = {};

    const dom = () => {
        els.country = document.querySelector('.js-country-search-countries');
        els.event = document.querySelector('.js-country-search-events');
        els.button = document.querySelector('.js-country-search-button');
        els.searchCountriesRequired = document.querySelector('.js-country-required');
    }

    const bind = () => {
        if (els.button != null) {
            els.button.addEventListener('click', function (e) {
                redirectToCountry();
            })
        }
    }

    const redirectToCountry = () => {

        if (els.country && els.event) {

            let url = "";

            let countryValue = els.country.selectedOptions[0].value;
            let eventValue = els.event.selectedOptions[0].value;

            console.log(els.country); 
            console.log(els.countryValue)

            if (!els.countryValue) {
                countryValue = els.country.value
            }

            if (countryValue != '') {
                    url += countryValue;
                    console.log(url); //pays    

                    if (eventValue != '') {
                        url += eventValue;
                        console.log(url) //pays+event
                        cookie.setCookie('searchEventId', parseInt(els.event.selectedOptions[0].dataset.eventId));
                    }
            }
            else {
                els.country.style.border = '3px solid red';
                els.searchCountriesRequired.style.display = 'block';

                console.log('pays de pays sélectionné')
            }

            console.log('je sors')

            if (url != '') {
                window.location.href = url;
            }

        }

    }

    const init = () => {
        if (document.querySelector('.js-country-search-button')) {    
            dom();    
            bind();
        }

    }
    init(); 
    // return {};

}


module.exports = SearchCountry;



