/*global Backbone */
var app = app || {};

(function () {
	'use strict';

	app.todoModel = Backbone.Model.extend({
		/* --- Default --- */
		defaults: {
			title: '',
			completed: false
		}
	});
})();
