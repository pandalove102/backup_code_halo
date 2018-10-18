/*global Backbone, _ */
var app = app || {};

(function () {
	'use strict';

	app.LanguagesCollection = Backbone.Collection.extend({
		model: app.LanguagesModel,
		localStorage: new Backbone.LocalStorage('LanguagesCollection'),

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
		fetch : function() {
            var collection = this;
            var params = [];
		    // Gọi API
            AJAX.get(API.SERVICE.GET_LANGUAGES, params).done(function(res){
                if(res.success){
                    var data = Helper.getData(res);
                    // Chúng ta đã có dữ liệu được trích xuất => nạp data đó vào collection thông qua hàm reset
                    console.log('data', this);
                    collection.reset(data);
                    console.log(collection);
                } else{
                    console.log('ERROR Rồi');
                    // Dựa theo res.error mà trả thông báo lỗi
                }
			});
		},

	});
})();
