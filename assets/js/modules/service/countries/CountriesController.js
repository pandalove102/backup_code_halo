
/*global Knockback */
var app = app || {};

(function () {
    'use strict';

	const MODAL_CONFIRM_DELETE = $('#modalConfirmDelete');
    window.CountriesController = kb.ViewModel.extend({
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
			self.countries = kb.collectionObservable(new app.CountriesCollection(), app.CountriesView);
			// -- Get user từ API và nạp vào collection vừa nãy --
            self.countries.collection().fetch('all', null);
            self.countryCode = ko.observable('');
            self.countryName = ko.observable('');
            self.codeContinent = ko.observable('');
			self.countryId = ko.observable('');
			self.targetCountry = ko.observable('');
            self.searchCountry = (type, param) => {
                self.countries.collection().fetch(type, param);
			}
			self.doDelCountry = (viewModel) => {
				console.log('here');
				self.targetCountry(viewModel);
				MODAL_CONFIRM_DELETE.modal('show');
			}
			self.onConfirmDel = () => {
				var result = self.targetCountry().deleteCountry({'id': self.targetCountry().id()});
                result
                    .then(data => {
						if (MODAL_CONFIRM_DELETE) MODAL_CONFIRM_DELETE.modal('hide');
						// remove data from collection
                    })
                    .catch((error) => console.error(error));
			}
        },
        
    });

})();
