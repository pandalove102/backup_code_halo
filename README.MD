Cấu trúc dự án
--
Cấu trúc gồm 2 thư mục chính
```
|-- application         : Chứa các thành phần liên quan đến xử lý ở PHP (Validate, API, Render ...)
    |-- controllers     : Định nghĩa các method để giao tiếp với FE & render. Các method phục vụ cho ajax thì cần có tiền tố ajax_ để dễ phân biệt
    |-- models          : Định nghĩa API Endpoint cho các đối tượng tương ứng
    |-- views           : Template html để controller render
    |-- config          : Cấu hình, thiết lập hệ thống đều gom vào đây
        |-- api.php     : Định nghĩa các System API Endpoint
        |-- assets.php  : Định nghĩa các Global Asset (css/js..)
        |-- sidebar_menu.php            : Định nghĩa sidebar menu của layout
        |-- view_global_variables.php   : Định nghĩa các Global Constant để JS xài
    |-- log             : Thư mục này chứa log API, cần dùng để debug
    |--modules          :
        |-- auth                 : Tên của modules (Example phần login/các module khác tổ chức tương tư)
            |-- controllers      : controller chứa các file controller tương tác API, load JS cho modules
                |--Login.php     : Dùng để call các js sử dụng cho module, các function giao tiếp API
            |-- views            : chứa file view của module
                |--login.php     : view login -> chú ý đặt tên lowercase
|-- assets              : Chứa các thành phần liên quan đến javascript (knockback, backbone, jquery ...)
    |-- css             : Custom CSS
    |-- img             : Chứa hình ảnh
    |-- js              : Thư mục chính, chứa hầu hết js app
        |-- app         : Các thành phần global js (load ở mọi trang)
            |-- ajax    : Các method phục vụ việc gọi AJAX ở FE
            |-- api     : Định nghĩa các PHP API ENDPOINT ROUTE để ajax gọi
            |-- helper  : Các hàm helper, dùng chung cho toàn hệ thống
            |-- plugins : Nạp các plugins bên thứ 3 (hầu hết là jquery), cần build mới chạy. Không biết build thì liên hệ.
            |-- other   : Chứa các thành phần init, preconfig plugin
        |-- modules     : Chứa các thành phần module js (load theo module tương ứng)
            |-- auth    : Module Auth (Collection, BB Model, BB View)
                |-- collection
                    |-- xxxxxx.js             : chứa nhiều object cùng loại Model/ function fetch để update data của collection
                |-- models
                    |-- CredentialsModel.js   : định nghĩa cấu trúc, thuộc tính mặc định của 1 object => tương tác với API/Database

                |-- view                      :
                    |-- CredentialsView.js    : định nghĩa các thuộc tính, function cụ thể cho từng đối tượng Model => tương tác với UI
                |--loginControler.js          : chỉ nắm giữ các Collection hoặc View để bind ra UI mà thôi
                                                 Và các method tương tác không liên quan đến viewModel
            |-- ...
    |-- theme           : Chứa các assets của theme (Hầu như không cần quan tâm tới nó, giữ nguyên hiện trạng)
    |-- vendor          : Chứa các package được cài thông quan yarn
```

**Một số lưu ý:**
- PHP sử dụng composer để quản lý các package (add thêm package nào thì cần hỏi ý kiến trước để hạn chế thừa các package không cần thiết)
- JS sử dụng yarn để quản lý package (tương tự, thêm package nào thì nên hỏi trước ý kiến)
- Giữ code luôn Clean & Readable & Maintainable
- Commit phải có message rõ ràng, thay đổi những gì
- Chỉ define đủ để dùng, không define thừa, cái nào thừa thì xóa luôn (có git rồi)
- Javascript App
> **Controller** chỉ chứa các biến nắm giữ Model / Collection.

> Model và Collection dùng backbone, chứa các thuộc tính, ajax

> Lớp View chỉ nên định nghĩa các hành động khi thực hiện sự kiện nào đó như onSubmit, onClick ..


(Còn gì sẽ bổ sung sau..)

---

500 ae code backend chú ý. Tại một vài người còn thắc mắc vì sao có một số function thì viết trong model, 
một số function khác thì viết trong collection mà ko viết hết ra controller như ở frontend ? Nên mình giải thích ở đây luôn.
---
JS đang tổ chức theo hướng đối tượng (OOP).
Cơ bản nhất của OOP bao gồm 2 khái niệm là prop và method (Ở đây mình ko đi sâu vào giải thích khái niệm này để tránh dài dòng.)
---
Bây giờ chúng ta tham chiếu qua PHP cho dễ hình dung
- **Backbone Model**: Như là Abstract Class, định nghĩa các prop cơ bản của Object và tương tác với API (trong mô hình MVC, lớp chỉ có lớp Model là tương tác với database)
- **Knockback View**: như là lớp extend từ Model ở trên, bổ sung các method tương tác với đối tượng đó
- **Backbone Model** + **Knockback View** là 1 bộ luôn đi cùng nhau tạm gọi là **ViewModel**
- **Collection**: là một tập hợp gồm nhiều **ViewModel**, có define thêm các  method tương tác với API có response trả về là 1 tập hợp object (thường là lấy danh sách User hoặc bài Post này nọ
- **Controller**: được xem như là lớp keo kết dính dữ liệu JS với HTML, chỉ chứa các observable nắm giữ ViewModel hoặc Collection để bind ra HTML
====> Lý do: OOP

......
Một vài người quen code ở bên frontend, qua đây sẽ thấy lạ lẫm. Cho rằng viết hết ra controller như bên frontend sẽ nhanh hơn.

Tuy nhiên do controller gắn với window, nên luôn tồn tại, không giải phóng được memory mặc dù ko dùng đến.

Tổ chức method thì nằm trong view của tập đối tượng đó.
Còn method liên quan tới tập đối tượng thì nằm trong collection.
> Lúc đối tượng bị destroy, thì các thứ liên quan cũng đi theo luôn, chứ ko như bên controller, các observable luôn tồn tại .