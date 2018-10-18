
<script src="http://knockoutjs.com/downloads/knockout-3.2.0.js"></script>
<!-- <div class="row">
        <div class="col">
            <div class="table-responsive">
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalIDAdd">Add</button>
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>Content</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                                 
                        <tbody data-bind="foreach: list">
                            <tr>
                                <td data-bind="text: firtName"></td>
                                <td data-bind="text: lastName"></td>
                                <td data-bind="text: fullName"> </td>
                                <td data-bind="text: mail"></td>
                                <td data-bind="text: content"></td>
                                <td>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalID">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                   
                </table>
            </div>
        </div>
      
    </div>


<?php 
    include_once('inc/modaldemo.php');
?>
<script>

 function demoViewModel() {
        var self=this;
         self.list = ko.observableArray([
            {firtName:"heo 1",lastName:"Con",fullName:"heo 1 Con",mail:"mail@gmail.com",content:"noi dung thu"},
            {firtName:"heo 2",lastName:"Con",fullName:"heo 2 Con",mail:"mail@gmail.com",content:"noi dung thu"},
            {firtName:"heo 3",lastName:"Con",fullName:"heo 3 Con",mail:"mail@gmail.com",content:"noi dung thu"},
            {firtName:"heo 4",lastName:"Con",fullName:"heo 4 Con",mail:"mail@gmail.com",content:"noi dung thu"}
        ]);
        self.list_details =ko.observable([{firtName:"",lastName:"",fullName:"",mail:"",content:""}])
      
        self.onUpdate = function(demoViewModel){
            var self=this;
            console.log()
            
             
            
            // $('#modalID').modal('hide');

            }
}

ko.applyBindings(demoViewModel)
</script> -->



<!-- This is a *view* - HTML markup that defines the appearance of your UI -->

<!-- <p>First name: <input data-bind="value: firstName" /></p>
<p>Last name: <input data-bind="value: lastName" /></p>
<p>Full name: <input data-bind="value: fullName" /></p>
<button type="button" data-bind="click: capitalizeLastName">Change LastName</button> -->


<!-- // This is a simple *viewmodel* - JavaScript that defines the data and behavior of your UI -->
<!-- <script>
function AppViewModel() {
    var self=this;
    self.firstName=ko.observable('Heo con')
    self.lastName=ko.observable('mập')
    self.fullName=ko.computed(function(){
    return self.firstName()+" "+self.lastName();
    });
    self.capitalizeLastName=function(){
        var currentVal = self.lastName();
        self.lastName(currentVal.toUpperCase());
    };
}

// Activates knockout.js
ko.applyBindings(new AppViewModel());
</script> -->


<h2>Your seat reservations</h2>
<h2> Booked(<span data-bind="text: seats().length"></span>)</h2>

<table>
    
    <thead>
    <tr>
        <th>Passenger name</th>
        <th>Meal</th>
        <th>Surcharge</th>
        <th>Aciton</th>
    </tr>
    </thead>
    <!-- Todo: Generate table body -->
    <tbody data-bind="foreach: seats">
       <tr>
           <td ><input data-bind="value: name" /></td>
           <td><select data-bind="options: $root.availableMeals, value: meal,optionsText:'mealName'"></td>
           <td data-bind="text: formattedPrice"></td>
           <td><a href="#" data-bind="click: $root.removeSeat">Remove</a></td>
       </tr>
    </tbody>
    
</table>

<h3 data-bind="visible: totalSurcharge()>0">
        total surcharge: $<span data-bind="text: totalSurcharge().toFixed(2)"></span>
    </h3>
    <button data-bind="click: addSeat,enable: seats().length <5">Add</button>

<script>
// Class to represent a row in the seat reservations grid
function SeatReservation(name, initialMeal) {
    var self = this;
    self.name = name;
    self.meal = ko.observable(initialMeal);
    
    self.formattedPrice= ko.computed(function(){
        var price=self.meal().price;
        return price ? "$" + price.toFixed(2): "None";
    });
}


// Overall viewmodel for this screen, along with initial state
function ReservationsViewModel() {
    var self = this;

    // Non-editable catalog data - would come from the server
    self.availableMeals = [
        { mealName: "Standard (sandwich)", price: 0 },
        { mealName: "Premium (lobster)", price: 34.95 },
        { mealName: "Ultimate (whole zebra)", price: 290 }
    ];    

    // Editable data
    self.seats = ko.observableArray([
        new SeatReservation("Steve", self.availableMeals[2]),
        new SeatReservation("Bert", self.availableMeals[1])
    ]);
    
    self.removeSeat=function(seat){
        self.seats.remove(seat)
    }
    self.totalSurcharge=ko.computed(function(){
        var total=0;
        for(var i=0; i< self.seats().length;i++)
        {
            total+= self.seats()[i].meal().price;
        }
        return total;
    });
}

ko.applyBindings(new ReservationsViewModel());
</script>