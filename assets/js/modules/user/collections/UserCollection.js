/*global Backbone, _ */
var app = app || {};

(function () {
	'use strict';

	app.UserCollection = Backbone.Collection.extend({
		model: app.UserModel,
		localStorage: new Backbone.LocalStorage('UserCollection'),

        initialize: function () {
            console.log('This collection has been initialized.');
            /*
            |--------------------------------------------------------------------------
            | EVENTS
            |--------------------------------------------------------------------------
            | Backbone collection có các sự kiện:
            | - add : Lúc add thêm object vào collection
            | - remove: lúc xóa bớt 1 object khỏi collection
            | - reset: lúc reset lại danh sách object của collection
            | - sort: lúc sắp xếp lại danh sách object trong collection
            */

            // Tương tự như bên model thôi :D không làm gì thì cũng chẳng cần define
        },


        /*
        |--------------------------------------------------------------------------
        | DEFINE METHOD :: FETCH
        |--------------------------------------------------------------------------
        | Lấy danh sách user rồi nạp vào collection hiện tại
        */
		fetch : function(type , params) {
		    var self = this;
            return new Promise((resolve, reject) => {
                AJAX.get(API.USER.SEARCH_USERS, params).done(function(res){
                    if (res.success) {
                        if (type == 'ViewMore') {
                            self.push(Helper.getData(res));
                        } else {
                            self.reset(Helper.getData(res));
                        }
                        resolve([Helper.getLastSortData(res), Helper.getTotalHits(res)]);
                    } else {
                        reject('Failed');
                    }
                }).fail(function(){
                    reject('System error, please try again later.')
                });
            });
		},

        /* --- END --- */
        // https://devhints.io/backbone
        // http://backbonejs.org
        // Search list data
	});
})();
