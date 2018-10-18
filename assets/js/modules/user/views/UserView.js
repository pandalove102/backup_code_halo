/*global Knockback */
var app = app || {};
var Helper = Helper || {};

(function () {
    'use strict';

    app.UserView = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        */

        constructor: function (model, options, view) {
            var self = this;
            kb.ViewModel.prototype.constructor.call(this, arguments);

            self.password = ko.observable();

            // Những thứ xử lý phức tạp hoặc dài thì nên đưa vào view xử lý bằng pureComputed, để tránh gây rối ở ngoài HTML
            self.display_gender = ko.pureComputed(function(){
                switch(self.model().get('gender')){
                    case 'F':
                        return 'Female';
                    case 'M':
                        return 'Male';
                    default:
                        return 'N/A';
                }
            });

            self.display_avatar = ko.pureComputed(function(){
               var avatar =  self.model().get('avatar');
               return avatar ? avatar : HALO_CONSTANT.NO_AVATAR;
            });

            self.lock = function(status){
                return new Promise((resolve, reject) => {
                    var requestBody = {
                        'nv109': self.password(),
                        'nn132': status,
                        'f_id': [self.model().get('id')]
                    };

                    AJAX.post(API.USER.LOCK_OR_UNLOCK_USER, requestBody).done((res) => {
                        if (res.success) {
                            self.model().set('sys_blocked', status);
                            self.password('')
                            resolve(status);
                        } else {
                            reject('Can\'t update status this account!!!');
                        }
                    }).fail(function(){
                        reject('System error, please try again later.')
                    });
                });
            };


            /* --- END --- */
        },
    });
})();
