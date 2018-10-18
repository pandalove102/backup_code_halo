/*global Backbone */
var app = app || {};

(function () {
    'use strict';

    app.CurrenciesModel = Backbone.Model.extend({
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
            console.log('load Model ok !!');
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

        /* --- Root URL --- */
        // url: HALO_CONSTANT.BASE_URL + API.AUTH.AUTHENTICATE,


        /*
        |--------------------------------------------------------------------------
        | KHỞI TẠO CÁC ATTRIBUTE DEFAULT SAU CHO OBJECT LÚC INIT
        |--------------------------------------------------------------------------
        */
        defaults: {
            name: '',
            alias:'',
            code: '',
            price: '',
            date: '',
            status: '',
            length:''       
        },

        /*
        |--------------------------------------------------------------------------
        | VALIDATE DỮ LIỆU VÀO
        |--------------------------------------------------------------------------
        | Nếu một thao tác set/unset dẫn đến việc validate trả về lỗi, thì thao tác đó sẽ bị bỏ qua & không được cập nhật
        | ------------
        | obj.validationError  //=> Get thông báo lỗi
        | obj.isValid() //=> Kiểm tra object có vượt qua được vòng loại validate hay không :D
        | ------------
        | Method này được gọi khi thực hiện 1 trong số các thao tác sau
        | obj.save()
        | obj.set({ ··· }, { validate: true })
        */

        validate: function (attrs) {
            console.log(attrs);
            // if (!attrs.username) {
            //     return 'I need your name';
            // }

            // Trả về FALSE là coi như không xảy ra lỗi => cho phép giá trị thay đổi được cập nhật vào attribute tương ứng
            return false;
        },


        /*
        |--------------------------------------------------------------------------
        | ĐỊNH NGHĨA CÁC METHOD CHO MODEL
        |--------------------------------------------------------------------------
        | CRUD: fetch / save / destroy
        */

        /* --- FETCH --- */
        fetch: function () {
            // var model = this;
            // AJAX.post(API.USER.GET_USER_PROFILE, params).done(function(res){
            //     if(res.success){
            //         var data = Helper.getData(res);
            //         // Set json data {username: 'abc', age: 17 ...} vào model thông qua hàm set của backbone Model
            //         model.set(data);
            //     } else{
            //         // Dựa theo res.error mà trả thông báo lỗi
            //     }
            // });
        },

        /* --- SAVE --- */
        save: function () {
            var objectData = this.toJSON(); // toJSON là 1 hàm lợi hại của backbone
            if(objectData.id){
                // Gọi API đẩy giá trị objectData lên để update
            } else{
                // Gọi API đẩy giá trị objectData lên để tạo mới
            }

            // API thì gọi kiểu như fetch trên kia :D
        },

        /* --- DESTROY --- */
        destroy: function () {
            // Gọi API truyền vào this.get('id') để tiến hành xóa Object có id đó trên Database
        },
        

    });
})();
