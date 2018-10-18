
/*global Knockback */
var app = app || {};

(function () {
    'use strict';

    window.CitiesController = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        | Model      :: định nghĩa cấu trúc, thuộc tính mặc định của 1 object => tương tác với API/Database
        | Collection :: chứa nhiều object cùng loại Model
        | View       :: định nghĩa các thuộc tính, function cụ thể cho từng đối tượng Model => tương tác với UI
        | Controller :: chỉ nắm giữ các Collection hoặc View để bind ra UI mà thôi
        |               Và các method tương tác không liên quan đến viewModel
        | ------------
        | Áp dụng như vậy mới đúng chức năng của mô hình MVC/MVVM
        */
       
        constructor: function ($parent) {
            let self = this;
			// Gọi construct của parent
			kb.ViewModel.prototype.constructor.call(this);
            // -- Bắt đầu định nghĩa collectionObservable từ Collection và View ban đầu --
			self.cities = kb.collectionObservable(new app.CitiesCollection(), app.CitiesView);
			// -- Get user từ API và nạp vào collection vừa nãy --
            // self.cities.collection().fetch('all', '');
            self.cityCode = ko.observable('');
            self.cityName = ko.observable('');
            self.cityId = ko.observable('');
            self.searchCity = (type, param) => {
                self.cities.collection().fetch(type, param);
            }
        },
        
    });

})();
