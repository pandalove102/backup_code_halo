/*global Backbone */
var app = app || {};

(function () {
	'use strict';

	app.HotelModel = Backbone.Model.extend({
		/* --- Default --- */
		defaults: {
			title: '',
			completed: false
		}
	});
})();
