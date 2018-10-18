/*global Knockback */
var app = app || {};

(function () {
	'use strict';

    const ENTER_KEY = 13;
    const ESC_KEY= 27;

    /*
    |--------------------------------------------------------------------------
    | ROOT APPLICATION VIEW MODEL
    |--------------------------------------------------------------------------
    | The application View Model is created and bound from the HTML using kb-inject.
    | All view will access this app via app
    */

	window.app = kb.ViewModel.extend({
		constructor: function () {
			let self = this;
			kb.ViewModel.prototype.constructor.call(this);

            if (window.Worker) {
                var userService = new Worker("userAction.js");

				// onkeyup could be used instead of onchange if you wanted to update the answer every time
				// an entered value is changed, and you don't want to have to unfocus the field to update its .value

                // first.onchange = function() {
                //     myWorker.postMessage([first.value,second.value]); // Sending message as an array to the worker
                //     console.log('Message posted to worker');
                // };
				//
                // second.onchange = function() {
                //     myWorker.postMessage([first.value,second.value]);
                //     console.log('Message posted to worker');
                // };

                userService.onmessage = function(e) {
                    console.info('Result', e.data);
                    console.log('Message received from worker');
                };
            }

			// New todo title.
			this.title = ko.observable('');

			// The function used for filtering is dynamically selected based on the filterMode.
			this.filterMode = ko.observable('');
            let filterFn = ko.pureComputed(function () {
				switch (self.filterMode()) {
					case 'active':
						return (function (model) { return !model.get('completed'); });
					case 'completed':
						return (function (model) { return model.get('completed'); });
				};
				return (function () { return true; });
			});

			// A collectionObservable can be used to hold the instance of the collection.
			this.todos = kb.collectionObservable(new app.Todos(), app.TodoViewModel, {filters: filterFn});

			// Note: collectionObservables do not track nested model attribute changes by design to avoid
			// list redrawing when models change so changes need to be manually tracked and triggered.
			this.todoAttributesTrigger = kb.triggeredObservable(this.todos.collection(), 'change add remove');
			this.todoStats = ko.computed(function () {
				self.todoAttributesTrigger(); // manual dependency on model attribute changes
				return {
					tasksExist: !!self.todos.collection().length,
					completedCount: self.todos.collection().where({completed: true}).length,
					remainingCount: self.todos.collection().where({completed: false}).length
				};
			});

			// When the checkbox state is written to the observable, all of the models are updated
			this.toggleCompleted = ko.computed({
				read: function () { return !self.todoStats().remainingCount; },
				write: function (value) { self.todos.collection().each(function (model) { model.save({completed: value}); }); }
			});

			// Fetch the todos and the collectionObservable will update once the models are loaded
			this.todos.collection().fetch();

			// Use a Backbone router to update the filter mode
			new Backbone.Router().route('*filter', null, function (filter) { self.filterMode(filter || ''); });
			Backbone.history.start();
		},

		// Create a new model in the underlying collection and the observable will automatically synchronize
		onAddTodo: function (self, e) {
			if (e.keyCode === ENTER_KEY && $.trim(self.title())) {
				self.todos.collection().create({title: $.trim(self.title())});
				self.title('');
			}
		},

		// Operate on the underlying collection instead of the observable given the observable could be filtered
		onClearCompleted: function (self) { _.invoke(self.todos.collection().where({completed: true}), 'destroy'); },

		// Helper function to keep expressions out of markup
		getLabel: function (count) { return ko.utils.unwrapObservable(count) === 1 ? 'item' : 'items'; }
	});
})();
