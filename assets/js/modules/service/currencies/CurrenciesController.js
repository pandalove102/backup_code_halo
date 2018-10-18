
/*global Knockback */
var app = app || {};

(function () {
    'use strict';

    window.CurrenciesController = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        | Model      :: định nghĩa cấu trúc, thuộc tính mặc định của 1 object => tương tác với API/Database
        | Collection :: chứa nhiều object cùng loại Model
        | View       :: định nghĩa các thuộc tính, function cụ thể cho từng đối tượng Model => tương tác với UI
        | Controller :: chỉ nắm giữ các Collection hoặc View để bind ra UI mà thôi
        | ------------
        | Áp dụng như vậy mới đúng chức năng của mô hình MVC/MVVM
        */

        constructor: function () {
			let self = this;
			// Gọi construct của parent
            kb.ViewModel.prototype.constructor.call(this);
            console.log('load controller ok ');

            self.currencies = kb.collectionObservable(new app.CurrenciesCollection(), app.CurrenciesView);
        
            self.currencies.collection().fetch();
            
            // console.log('ohaha = ', self.currencies());

            // self.currenciesView = new app.CurrenciesView(new app.CurrenciesModel());
            // console.log('currenciesView',self.currenciesView);

            
           
		

			
        },
    });
})();
