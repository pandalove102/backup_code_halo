/*global Backbone */
var app = app || {};

(function () {
    'use strict';

    app.CredentialsModel = Backbone.Model.extend({
        /* --- Prevent backbone sync --- */
        sync: function () {
            return false;
        },

        /* --- Init --- */
        initialize: function () {
            // console.log('This model has been initialized.');
            // this.on("change", function() {
            //     console.log("Value has changed")
            // })
        },

        /* --- Root URL --- */
        // url: HALO_CONSTANT.BASE_URL + API.AUTH.AUTHENTICATE,

        /* --- Default --- */
        // Set các giá trị mặc định ban đầu lúc khởi tạo
        defaults: {
            username: '',
            password: ''
        },

        /* --- Validate --- */
        // Nếu một thao tác set/unset dẫn đến việc validate trả về lỗi, thì thao tác đó sẽ bị bỏ qua & không được cập nhật
        validate: function (attrs) {
            console.log(attrs);
            // if (!attrs.username) {
            //     return 'I need your name';
            // }
            return false;
        },


        /* --- CUSTOM METHOD --- */
        authenticate: function (callback) {
            let params = _.pick(this.toJSON(),['username','password']);
            return AJAX.post(API.AUTH.AUTHENTICATE, params);
        }
    });
})();
