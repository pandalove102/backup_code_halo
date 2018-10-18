/*global Backbone, _ */
var app = app || {};

(function () {
	    app.CarrierPackageCollection = Backbone.Collection.extend({
		model: app.CarrierPackageModel,
		localStorage: new Backbone.LocalStorage('CarrierPackageCollection'),

        initialize: function () {
            console.log('load Collection ok ! ');
        },
        /*
        |--------------------------------------------------------------------------
        | DEFINE METHOD :: FETCH
        |--------------------------------------------------------------------------
        | Lấy danh sách user rồi nạp vào collection hiện tại
        */
		fetch : function() {
		    var collection = this;
            AJAX.get(API.SHOP.GET_LIST_CARRIER, []).done(function(res){
                if(res.success){
                    var data = Helper.getData(res);
                    collection.reset(data);
                } else{
                    // Dựa theo res.error mà trả thông báo lỗi
                }
			});
        },
       
     
        
        

	
	});
})();
