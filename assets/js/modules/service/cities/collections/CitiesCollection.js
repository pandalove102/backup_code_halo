/*global Backbone, _ */
var app = app || {};
const ALL = 'all';
const SEARCH_BY_ID = 'cityId';
const SEARCH_BY_NAME = 'cityName';
const SEARCH_BY_CODE = 'cityCode';
(function () {
	'use strict';

	app.CitiesCollection = Backbone.Collection.extend({
		model: app.CitiesModel,
		localStorage: new Backbone.LocalStorage('CitiesCollection'),

        initialize: function () {
            console.log('This collection has been initialized.');
        },

        /*
        |--------------------------------------------------------------------------
        | DEFINE METHOD :: FETCH
        |--------------------------------------------------------------------------
        | Lấy danh sách user rồi nạp vào collection hiện tại
        */
		fetch : function(type, param) {
			var self = this;
            switch (type) {
                case ALL :
                    AJAX.get(API.SERVICE.GET_ALL_CITY, param).done(function(res){
                        if (res.success) {
                            self.reset(Helper.getData(res));
                        } else {
                            console.error('Failed');
                        }
                    }).fail(function(){
                        console.error('System error, please try again later.')
                    });
                    break;
                case SEARCH_BY_NAME : 
                    AJAX.get(API.SERVICE.FIND_CITY_BY_NAME, {'name': param}).done(function(res){
                        if (res.success) {
                            self.reset(Helper.getData(res));
                        } else {
                            console.error('Failed');
                        }
                    }).fail(function(){
                        console.error('System error, please try again later.')
                    });
                    break;
                case SEARCH_BY_ID : 
                    AJAX.get(API.SERVICE.FIND_CITY_BY_ID, {'_id': param}).done(function(res){
                        if (res.success) {
                            self.reset(Helper.getData(res));
                        } else {
                            console.error('Failed');
                        }
                    }).fail(function(){
                        console.error('System error, please try again later.')
                    });
                    break;
                case SEARCH_BY_CODE : 
                    AJAX.get(API.SERVICE.FIND_CITY_BY_CODE, {'code': param}).done(function(res){
                        if (res.success) {
                            self.reset(Helper.getData(res));
                        } else {
                            console.error('Failed');
                        }
                    }).fail(function(){
                        console.error('System error, please try again later.')
                    });
                    break;
                default:
                    break;
                    
            }
           
		},
        
	});
})();
