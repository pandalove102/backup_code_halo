var API = API || {};

/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
| @author: Tri Huynh
| @created: 11/09/2018
| @edited_by: PhuongTT
| @updated: PhuongTT
*/

(function () {
    "use strict";

    window.API = {
        /*
        |--------------------------------------------------------------------------
        |  API USING FOR (LOGIN/USERS/TOUR/SHOP/HOTEL/SERVICE)
        |--------------------------------------------------------------------------
        | @author: PhuongTT
        */
        AUTH: {
          AUTHENTICATE: 'auth/login/ajax_authorize'
        },
        USER: {
            SEARCH_USERS: 'user/ajax_search_user',
            LOCK_OR_UNLOCK_USER: 'user/ajax_lock_or_unlock_user'
        },
        HOTEL: {
            
        },
        TOUR: {

        },
        SHOP: {
            // Categories
            
            // Carrier package
            CREATE_CARRIER_lANG:'shop/carrierPackage/ajax_create_carrierpackage_language',
            GET_LIST_CARRIER:'shop/carrierPackage/ajax_list_carrierpackage_language'

        },
        SERVICE: {
            GET_LANGUAGES : 'service/languages/ajax_get_languages',
            GET_CURRENCY: 'service/currencies/ajax_get_currency',
            FIND_COUNTRY_BY_CODE : 'service/countries/ajax_find_country_by_code',
            FIND_COUNTRY_BY_ID : 'service/countries/ajax_find_country_by_id',
            FIND_COUNTRY_BY_NAME : 'service/countries/ajax_find_country_by_name',
            FIND_COUNTRY_BY_CONTINENT : 'service/countries/ajax_find_country_by_continent',
			GET_ALL_COUNTRY : 'service/countries/ajax_get_all_country',
			REMOVE_COUNTRY : 'service/countries/ajax_remove_country',
            FIND_CITY_BY_CODE : 'service/cities/ajax_find_city_by_code',
            FIND_CITY_BY_ID : 'service/cities/ajax_find_city_by_id',
            FIND_CITY_BY_NAME : 'service/cities/ajax_find_city_by_name',
            GET_ALL_CITY : 'service/cities/ajax_get_all_city'
        },
    };

})();
