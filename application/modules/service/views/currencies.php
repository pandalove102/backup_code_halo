<div kb-inject="CurrenciesController">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <?php if (isset($title)): ?>
                <span class="text-uppercase page-subtitle"><?php echo $title ?></span>
            <?php endif; ?>
            <?php if (isset($heading)): ?>
                <h3 class="page-title"><?php echo $heading ?></h3>
            <?php endif; ?>
        </div>
     
    </div>
    <!-- End Page Header -->

    <div class="row">
        <div class="col-lg-6 mb-4">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Code</th>
                        <th>price</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th><p></p></th>
                    </tr>
                </thead>
        
                <!-- ko foreach: currencies() -->
                <tbody>
                    <tr>
                        <td data-bind="text: $index() + 1"></td>
                        <td data-bind="text: name()"></td>
                        <td data-bind="text: alias()" ></td>
                        <td data-bind="text: code()" ></td>
                        <td data-bind="text: price()" ></td>
                        <td data-bind="text: date()" ></td>
                        <td data-bind="text: status()" ></td>
                        <td><button data-bind="event:{click: doEdit}">Edit</button></td>
                    </tr>
                </tbody>
                <!-- /ko -->
            </table>
        </div>
    </div>
</div>