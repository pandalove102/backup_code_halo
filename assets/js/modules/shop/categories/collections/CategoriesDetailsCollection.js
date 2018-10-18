/*global Backbone, _ */
var app = app || {};

(function () {
	    app.CategoriesDetailsCollection = Backbone.Collection.extend({
		model: app.CategoriesDetailsModel,
		localStorage: new Backbone.LocalStorage('CategoriesDetailsCollection'),

        initialize: function () {
            console.log('load Collection ok ! ');
        },
        /*
        |--------------------------------------------------------------------------
        | DEFINE METHOD :: FETCH
        |--------------------------------------------------------------------------
        | Lấy danh sách user rồi nạp vào collection hiện tại
        */
		// fetch : function() {
		//     var collection = this;
        //     AJAX.get(API.SHOP.GET_LIST_SHOP, []).done(function(res){
        //         if(res.success){
        //             var data = Helper.getDataListShop(res);
        //             collection.reset(data);
        //             console.log(data);
        //         } else{
        //             // Dựa theo res.error mà trả thông báo lỗi
        //         }
		// 	});
        // },
       
     
        
        

	
	});
})();
