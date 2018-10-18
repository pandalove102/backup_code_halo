/*global Backbone */
var app = app || {};

(function () {
    'use strict';

    app.CitiesModel = Backbone.Model.extend({
        /* --- Prevent backbone sync --- */
        sync: function () {
            return false;
        },

        /*
        |--------------------------------------------------------------------------
        | ĐỊNH NGHĨA QUÁ TRÌNH INIT MODEL
        |--------------------------------------------------------------------------
        | var newObjModel = new app.UserModel();
        | var existObjModel = new app.UserModel({ username: 'demo@domain.com', age: '69' });
        */

        initialize: function () {
            console.log('This model has been initialized.');
            // Thật ra trong initialize chẳng làm gì hay lắng nghe sự kiện gì thì cũng chẳng define cũng được :D
            // Chẳng qua đây demo mẫu cho biết :D

            /*
            |--------------------------------------------------------------------------
            | EVENTS
            |--------------------------------------------------------------------------
            | Backbone Model có các sự kiện:
            | - change : Lúc giá trị bất kì attribute nào đó thay đổi
            | - change:[attr] : lúc giá trị attribute chỉ định thay đổi
            | - destroy: lúc object bị xóa
            | - invalid: lúc giá trị attribute được set không vượt qua được vòng loại validate :D
            */

            this.on("change", function() {
                console.log("Đứa nào đó vừa sửa giá trị Model rồi");
            });

            this.on("change:username", function() {
                console.log("Username vừa bị đổi rồi má ôi!")
            });

            this.on("destroy", function() {
                console.log("Oops! Cát bụi lại trở về với cát bụi")
            });

            this.on("invalid", function() {
                console.log("Oops! Cát bụi lại trở về với cát bụi")
            });

            // Hủy lắng nghe event thì thay vì on, giờ là off thôi this.off("destroy", function() {
            // Muốn trigger sự kiện thủ công thì object.trigger('change')
        },

        /*
        |--------------------------------------------------------------------------
        | KHỞI TẠO CÁC ATTRIBUTE DEFAULT SAU CHO OBJECT LÚC INIT
        |--------------------------------------------------------------------------
        */
        defaults: {
            "ascii_name": "",
            "code": "",
            "geonameid": "",
            "name": "",
            "id": ""
        },
    });
})();
