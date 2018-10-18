
/*global Knockback */
var app = app || {};

(function () {
    'use strict';

    window.CategoriesController = kb.ViewModel.extend({
        /*
        |--------------------------------------------------------------------------
        | CONSTRUCTOR
        |--------------------------------------------------------------------------
        | Model      :: định nghĩa cấu trúc, thuộc tính mặc định của 1 object => tương tác với API/Database
        | Collection :: chứa nhiều object cùng loại Model
        | View       :: định nghĩa các thuộc tính, function cụ thể cho từng đối tượng Model => tương tác với UI
        | Controller :: chỉ nắm giữ các Collection hoặc View để bind ra UI mà thôi
        | ------------
        | Áp dụng như vậy mới đúng chức năng của mô hình MVC/MVVM
        */

        constructor: function () {
			let self = this;
			// Gọi construct của parent
            kb.ViewModel.prototype.constructor.call(this);

            console.log('load controller ok ');
            // self.abc = observable("123");
            // console.log(sefl.acb()); //123
            // self.abc("123123");
            // console.log(sefl.acb()); //123123
            self.targetCategory = new app.CategoriesView(new app.CategoriesModel());
            self.categories_details = kb.collectionObservable(new app.CategoriesDetailsCollection(),app.CategoriesDetailsView);
            self.categories = kb.collectionObservable(new app.CategoriesCollection(), app.CategoriesView);
        
            self.categories.collection().fetch();
           

            // lick vào lấy danh sách ngôn ngữ của shop 
            this.onOpenDetail = function(model){
                // console.log("KQ tim",model.fk011());

                self.categories_details.collection().reset(model.fk011());

            
                // console.log("data 1",data1);

                // console.log("KQ click",self.categories_details);
            }
            // click vào Edit thì gọi Modal lên , load data lên 
            this.onLoadData=function(model){
                // console.log("ok roi Panda");
                // self.targetCatgory.reset("12434322")
                console.log(self.targetCategory)
                self.targetCategory.id(model.id());
                self.targetCategory.kv001(model.kv001())
            

            }

            this.onLoadData2=function(model){
                console.log("ok roi Panda 2");
                // self.targetCatgory.reset("12434322")
                // console.log(self.targetCategory)
                // self.targetCategory.id(model.id());
                // self.targetCategory.kv001(model.kv001())
            

            }

            
          
            

           
    }

        
    });
})();
