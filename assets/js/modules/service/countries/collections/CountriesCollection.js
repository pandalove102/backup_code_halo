/*global Backbone, _ */
var app = app || {};
const ALL = 'all';
const SEARCH_BY_ID = 'countryId';
const SEARCH_BY_CODE_CONTINENT = 'codeContinent';
const SEARCH_BY_NAME = 'countryName';
const SEARCH_BY_CODE = 'countryCode';
(function () {
	'use strict';

	app.CountriesCollection = Backbone.Collection.extend({
		model: app.CountriesModel,
		localStorage: new Backbone.LocalStorage('CountriesCollection'),

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
            console.log(param + type);
            console.log(SEARCH_BY_NAME);
            switch (type) {
                case ALL :
                    AJAX.get(API.SERVICE.GET_ALL_COUNTRY, param).done(function(res){
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
                    AJAX.get(API.SERVICE.FIND_COUNTRY_BY_NAME, {'name': param}).done(function(res){
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
                    AJAX.get(API.SERVICE.FIND_COUNTRY_BY_ID, {'_id': param}).done(function(res){
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
                    AJAX.get(API.SERVICE.FIND_COUNTRY_BY_CODE, {'code': param}).done(function(res){
                        if (res.success) {
                            self.reset(Helper.getData(res));
                        } else {
                            console.error('Failed');
                        }
                    }).fail(function(){
                        console.error('System error, please try again later.')
                    });
                    break;
                case SEARCH_BY_CODE_CONTINENT : 
                    AJAX.get(API.SERVICE.FIND_COUNTRY_BY_CONTINENT, {'code': param}).done(function(res){
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
