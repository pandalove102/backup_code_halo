<div kb-inject="CitiesController">
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
    <!-- Form search -->
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="card card-small h-100">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Search city</h6>
                    <div class="p-3">
                        <span>Get all Cities</span>
                        <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCity('all')}">Reload <i class="material-icons">refresh</i></button>
                    </div>
                    <div class="block-handle">
                    </div>
                </div>
                <div class="card-body p-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="code-tab" data-toggle="tab" href="#code" role="tab" aria-controls="code" aria-selected="true">Search by code</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cid-tab" data-toggle="tab" href="#cid" role="tab" aria-controls="cid" aria-selected="false">Search by id</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cname-tab" data-toggle="tab" href="#cname" role="tab" aria-controls="cname" aria-selected="false">Search by name</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="code" role="tabpanel" aria-labelledby="code-tab">
                            <div class="form-inline p-3">
                                <label class="pr-3" for="cityCodeInput">City code</label>
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="cityCodeInput" placeholder="VN.74.25" data-bind="value: cityCode">
                                <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCity('cityCode', cityCode())}">Search</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cid" role="tabpanel" aria-labelledby="cid-tab">
                            <div class="form-inline p-3">
                                <label class="pr-3" for="cityIdInput">City id</label>
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="cityIdInput" placeholder="5aa261facf7d9a641e1a8b37" data-bind="value: cityId">
                                <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCity('cityId', cityId())}">Search</button>
                            </div></div>
                        <div class="tab-pane fade" id="cname" role="tabpanel" aria-labelledby="cname-tab">
                            <div class="form-inline p-3">
                                <label class="pr-3" for="cityNameInput">City name</label>
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="cityNameInput" placeholder="Thanh Pho Bac Ninh" data-bind="value: cityName">
                                <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCity('cityName', cityName())}">Search</button>
                            </div></div>
                    </div>
                    <!-- //Form search -->
                    <div class="table-responsive">
                        <table class="table pt-3">
                            <thead class="thead-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Geonameid</th>
                                    <th>Code</th>
                                    <th>Ascii_name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ko foreach: cities() -->
                                <tr>
                                    <td data-bind="text: id()"></td>
                                    <td data-bind="text: name()"></td>
                                    <td data-bind="text: geonameid()" ></td>
                                    <td data-bind="text: code()" ></td>
                                    <td data-bind="text: ascii_name()" ></td>
                                </tr>
                                <!-- /ko -->
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    
</div>