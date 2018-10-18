/*global Backbone, _ */
var app = app || {};

(function () {
	    app.CarrierPackageLangCollection = Backbone.Collection.extend({
		model: app.CarrierPackageLangModel,
		localStorage: new Backbone.LocalStorage('CarrierPackageLangCollection'),

        initialize: function () {
            console.log('load Collection ok ! ');
		},  
		
		

	
	});
})();
