
/*global Knockback */
var app = app || {};

(function () {
    'use strict';

    window.LoginController = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        | Controller :: (cũng là là View) nhưng chỉ nắm giữ các collection hoặc view để bind ra UI
        | View :: định nghĩa các thuộc tính, function cụ thể cho từng đối tượng Model
        | Model :: định nghĩa cấu trúc, thuộc tính mặc định => Chỉ tương tác với lớp View và API/Database
        | Apply như vậy mới đúng chức năng của mô hình MVC
        */

        constructor: function () {
            let self = this;
            kb.ViewModel.prototype.constructor.call(this);

            self.credentials = new app.CredentialsView(new app.CredentialsModel());
        },

    });
})();
