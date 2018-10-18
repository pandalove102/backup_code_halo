


<div class="row"  kb-inject="CarrierPackageController">
    <div class="row container">
        <div class="page-header row no-gutters py-4"  >
                <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
                    <?php if (isset($title)): ?>
                        <span class="text-uppercase page-subtitle"><?php echo $title ?></span>
                    <?php endif; ?>
                    <?php if (isset($heading)): ?>
                        <h3 class="page-title"><?php echo $heading ?></h3>
                    <?php endif; ?>
                </div>
        </div>
    </div> 
    <div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
        
                <thead class="thead-inverse">

                    <tr>
                        <td  colspan="3" ><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalIDADD" >ADD</button></td>
                    
                    </tr>
                    <tr>
                        <td >ID</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <!-- ko foreach: carrierpackage() -->
                    <tr>
                        <td data-bind="text: $index() + 1"></td>
                        <td class="kv001" data-bind="text: kv001()"></td>
                        <td>
                            <button class="btn btn-sm btn-success" id="view" data-bind="click:  $parent.onOpenDetail">View</button>
                            <button class="btn btn-sm btn-success"  data-toggle="modal" data-target="#modalID" data-bind="click:  $parent.onLoadData" >Edit</button>
                            <button class="btn btn-sm btn-danger" id="dell"  >Del</button>
                        
                        </td>
                    </tr>
                <!-- /ko -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="col">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-inverse">
                    <tr>
                        <td  colspan="5" ><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalIDLANG"  data-bind="click:  onAddDataLang"  >ADD</button></td>
                        
                    </tr>
                    <tr>
                        <td>STT</td>
                        <td>LANG</td>
                        <td>NAME</td>
                        <td>NAME</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <!-- ko foreach: carrierpackage_details() -->

                    <tr>
                        <td data-bind="text: $index() + 1"></td>
                        <td data-bind="text: lang()"></td>
                        <td data-bind="text: kv002()"></td>
                        <td data-bind="text: kv003()"></td>
                        <td>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalIDLANG" data-bind="click:  $parent.onLoadDataLang" >Details</button>
                            <button class="btn btn-sm btn-danger"  data-bind="click:  $parent.onOpenDetail">Delete</button>
                        </td>
                    </tr>
                <!-- /ko -->

                </tbody>
            </table>
        </div>
    </div>
        <?php include_once('inc/Modal.php'); ?>

    </div>   
               
</div>



