/*global Knockback */
var app = app || {};

(function () {
    'use strict';

    const LIMIT = 10;
    const ENTER_KEY = 13;
    const MODAL_CONFIRM_PASSWORD = $('#modalConfirmPassword');

    window.UserController = kb.ViewModel.extend({
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

        constructor: function () {
            let self = this;
            // Gọi construct của parent
            kb.ViewModel.prototype.constructor.call(this);

            /* --- OBSERVABLES --- */

            self.keysearch = ko.observable('');

            self.targetUser = ko.observable();

            self.users = kb.collectionObservable(new app.UserCollection(), app.UserView);

            self.isShowMore = ko.observable(false);

            self.lastUsersSort = null;
            self.totalRecord = ko.observable(0);
            self.totalRecordView = ko.observable(0);

            /* --- LOCK & UNLOCK USER --- */

            self.doSelectUser = function (view) {
                self.targetUser(view);
                if (MODAL_CONFIRM_PASSWORD) MODAL_CONFIRM_PASSWORD.modal('show');
            };

            /* --- CONFIRM LOCK & UNLOCK AT MODAL --- */

            self.onConfirm = function () {
                var targetUser = self.targetUser();
                var lockStatus = targetUser.model().get('sys_blocked') == 0 ? 1 : 0;
                var result = targetUser.lock(lockStatus);

                result
                    .then(lockStatus => {
                        if (MODAL_CONFIRM_PASSWORD) MODAL_CONFIRM_PASSWORD.modal('hide');
                    })
                    .catch((error) => console.error(error));
            };

            /* --- SEARCH USER --- */

            var _searchUser = function(type){
                var result = self.users.collection().fetch(type, {q: ko.unwrap(self.keysearch), l: LIMIT, a: self.lastUsersSort});
                result
                    .then((item) => {
                        self.totalRecord(item[1]);
                        self.totalRecordView(self.users.collection().length)
                        self.isShowMore(self.totalRecordView() < self.totalRecord());
                        self.lastUsersSort = item[0];
                        // $('#list-user').removeClass('hide');
                    })
                    .catch((error) => console.error(error));
            };

            // Gọi lần đầu tiên lúc mới vào
            _searchUser();

            self.doSearchUsers = () => {
                self.lastUsersSort = [];
                _searchUser();
            };

            /* --- VIEW MORE --- */

            self.doViewMore = () => {
                _searchUser('ViewMore');
            };

            ko.bindingHandlers.enterkey = {
                init: function (element, valueAccessor, allBindings, viewModel) {
                    var callback = valueAccessor();
                    $(element).keypress(function (event) {
                        var keyCode = (event.which ? event.which : event.keyCode);
                        if (keyCode === 13) {
                            callback.call(viewModel);
                            return false;
                        }
                        return true;
                    });
                }
            };



        }

    });

})();
