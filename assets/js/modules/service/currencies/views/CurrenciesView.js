/*global Knockback */
var app = app || {};
var Helper = Helper || {};

(function () {
    'use strict';


    app.CurrenciesView = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        */

        constructor: function (model, options, view) {
            kb.ViewModel.prototype.constructor.call(this, arguments);
        },

        doEdit: (viewModel) => {
            console.log(viewModel.name());
        }
       
    });
})();

