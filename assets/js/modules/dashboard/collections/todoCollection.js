/*global Backbone */
var app = app || {};

(function () {
	'use strict';

	app.todoCollection = Backbone.Collection.extend({
		model: app.todoModel,
		localStorage: new Backbone.LocalStorage('todoCollection')
	});
})();
