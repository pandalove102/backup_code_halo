
/*global Knockback */
var app = app || {};

(function () {
    'use strict';

    window.CarrierPackageController = kb.ViewModel.extend({
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
            //tạo Collection , ViewModel 
            self.detailCarrierPackage_load_modal = new app.CarrierPackageView(new app.CarrierPackageModel());
            self.detaiLang_load_modal = new app.CarrierPackageView(new app.CarrierPackageModel());
            self.carrierpackage_details = kb.collectionObservable(new app.CarrierPackageLangCollection(),app.CarrierPackageLangView);
            self.carrierpackage = kb.collectionObservable(new app.CarrierPackageCollection(), app.CarrierPackageView);
            self.carrierpackage_load_modal=kb.collectionObservable(new app.CarrierPackageCollection(), app.CarrierPackageView);
            // load data vào table
            self.carrierpackage.collection().fetch();

            //  function khi tác động từ user

                // lick vào lấy danh sách ngôn ngữ của shop 
                self.onOpenDetail = function(model){
                    self.carrierpackage_details.collection().reset(model.fk011());
                }

                // click vào Edit thì gọi Modal lên , load data lên 
                self.onLoadData=function(model){
                    self.detailCarrierPackage_load_modal.id(model.id());
                    self.detailCarrierPackage_load_modal.kv001(model.kv001());
                }

                 // click add CarrierPackage , gôi modal details CarrierPackage với gia tri NUll, Add Carrier Package
                 self.onAddData = function(s){
                    var self=this
                    // tạo param để set giá trị mới 
                    var param={
                                "id":"",
                                "kv001":self.detailCarrierPackage_load_modal.kv001(),
                                "fk011":[{
                                            "id":"",
                                            "kv002":self.detaiLang_load_modal.kv002(),
                                            "kv003":self.detaiLang_load_modal.kv003(),
                                            "lang": self.detaiLang_load_modal.lang()
                                        }]
                                }
                    console.log(param);
                    // Gọi AJAX , gởi param đi 
                    AJAX.post(API.SHOP.CREATE_CARRIER_lANG,param).done((res) => {
                            if (res.success) {
                                console.log(res)
                                console.log('Panda oi , add dc roi !')
                                $('#modalIDADD').modal('toggle');
                                
                            } else {
                                reject('Can\'t add CarrierPackage and Language');
                            }
					    })
                    



                }
                // load Data Lang lên Modal khi click vào detail update nội dung 
                self.onLoadDataLang=function(model){
                    self.detaiLang_load_modal.id(model.id());
                    self.detaiLang_load_modal.lang(model.lang());
                    self.detaiLang_load_modal.kv002(model.kv002());
                    self.detaiLang_load_modal.kv003(model.kv003())
                   
                }
                // click add language , goi modal detai voi gia tri gan la Null , add Langguage 
                self.onAddDataLang=function(Model){
                    self.detaiLang_load_modal.id("");
                    self.detaiLang_load_modal.lang("");
                    self.detaiLang_load_modal.kv002("");
                    self.detaiLang_load_modal.kv003("")

                     // var param=[
                    //             id="",
                    //             kv001= self.detailCarrierPackage_load_modal.kv001(),
                    //             fk011= [{
                    //                         id=self.carrierpackage_details.id(),
                    //                         kv002=self.carrierpackage_details.kv002(),
                    //                         kv003=self.carrierpackage_details.kv003(),
                    //                         lang=self.carrierpackage_details.lang()
                    //                     }]
                    //         ]
                    
                }

               

            
          
            

           
    }

        
    });
})();
