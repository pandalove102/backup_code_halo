/*global Knockback */
var app = app || {};
var Helper = Helper || {};

(function () {
    'use strict';

    // const ENTER_KEY = 13;
    // const ESC_KEY = 27;

    app.CredentialsView = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        */

        constructor: function (model, options, view) {
            kb.ViewModel.prototype.constructor.call(this, arguments);
        },

        // Stop editing if already editing.
        onSubmit: function (formElement) {
            // Clear notices
            $('#notices').html('');

            // Submit
            this.model().authenticate()
                .done(function (res) {
                    if (res.success) {
                        Helper.redirect(HALO_CONSTANT.BASE_URL);
                    } else if (res.fragments) {
                        _.forEach(res.fragments, function (value, key) {
                            $(key).replaceWith(value);
                        });
                    }
                });
            // console.log('JSON',ko.toJS(this.model().toJSON()));
        },

        onLogin: function (self) {
            console.log('self', self);
        }
    });
})();
