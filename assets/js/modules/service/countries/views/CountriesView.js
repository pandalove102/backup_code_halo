/*global Knockback */
var app = app || {};
var Helper = Helper || {};

(function () {
    'use strict';

    app.CountriesView = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        */
        constructor: function (model, options, view) {
			var self = this;
			kb.ViewModel.prototype.constructor.call(this, arguments);

			self.deleteCountry = (params) => {
				console.log(params);
				return new Promise( (resolve, reject) => {
					AJAX.post(API.SERVICE.REMOVE_COUNTRY, {requesBody: params}).done((res) => {
						if (res.success) {
							var data = Helper.getData(res);
							resolve(data);
						} else {
							reject('Can\'t delete country');
						}
					}).fail(function(){
                        reject('System error, please try again later.')
                    });
				});
			}
			
			self.updateCountry = (params) => {

			}
        },
    });
})();
