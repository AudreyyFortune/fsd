const cookie = require('./../component/cookies.js')

const SearchCountry = () => {

    // initialization
    let els = {};

    // elements of the dom (querySelector etc..)
    const dom = () => {
        els.country = document.querySelector('.js-country-search-countries');
        els.event = document.querySelector('.js-country-search-events');
        els.button = document.querySelector('.js-country-search-button');
        els.searchCountriesRequired = document.querySelector('.js-country-required');
    }

    // trigger
    const bind = () => {
        if (els.button != null) {
            els.button.addEventListener('click', function (e) {
                // main function
                redirectToCountry();
            })
        }
    }

    // function triggered by the click
    const redirectToCountry = () => {

        // if we select a country and an event
        if (els.country && els.event) {

            let url = "";

            let countryValue = els.country.selectedOptions[0].value;
            let eventValue = els.event.selectedOptions[0].value;

            if (!els.countryValue) {
                countryValue = els.country.value
            }

            if (countryValue !== '') {
                    url += countryValue; //pays

                    if (eventValue !== '') {
                        url += eventValue; //pays+event
                        cookie.setCookie('searchEventId', parseInt(els.event.selectedOptions[0].dataset.eventId));
                    }
            }
            // no country selected
            else {
                els.country.style.border = '3px solid red';
                els.searchCountriesRequired.style.display = 'block';
            }

            if (url !== '') {
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
}

module.exports = SearchCountry;