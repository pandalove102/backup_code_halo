/*global Backbone, _ */
var app = app || {};

(function () {
	    app.CurrenciesCollection = Backbone.Collection.extend({
		model: app.CurrenciesModel,
		localStorage: new Backbone.LocalStorage('CurrenciesCollection'),

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
            // Gọi API
            // console.log('fetch');

            AJAX.get(API.SERVICE.GET_CURRENCY, []).done(function(res){
                console.log(res);
                if(res.success){
                    var data = Helper.getDataCurrency(res);

                    // Chúng ta đã có dữ liệu được trích xuất => nạp data đó vào collection thông qua hàm reset
                    collection.reset(data);
                    // console.log(collection);

                    // Ngoài hàm reset ra thì Backbone collection còn có nhiều hàm khác như add, destroy, sort..
                    // http://backbonejs.org/#Collection

                    // Bây giờ xem console => có bao nhiêu object là hiện bấy nhiêu log init model :D
                } else{
                    // Dựa theo res.error mà trả thông báo lỗi
                }
			});
		},

	
	});
})();
