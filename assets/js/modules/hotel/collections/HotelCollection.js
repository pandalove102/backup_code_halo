/*global Backbone */
var app = app || {};

(function () {
	'use strict';

	app.HotelCollection = Backbone.Collection.extend({
		model: app.todoModel,
		localStorage: new Backbone.LocalStorage('HotelCollection')
	});
})();
