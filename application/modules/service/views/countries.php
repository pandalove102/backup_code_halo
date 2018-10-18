<div kb-inject="CountriesController">
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
                    <h6 class="m-0">Search country</h6>
                    <div class="p-3">
                        <span>Get all countries</span>
                        <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCountry('all')}">Reload <i class="material-icons">refresh</i></button>
                    </div>
                    <div class="block-handle">
                    </div>
                </div>
                <div class="card-body p-4">
                    <ul class="nav nav-tabs row" id="myTab" role="tablist">
                        <li class="nav-item mb-3">
                            <a class="nav-link active" id="code-tab" data-toggle="tab" href="#code" role="tab" aria-controls="code" aria-selected="true">Search by code</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" id="cid-tab" data-toggle="tab" href="#cid" role="tab" aria-controls="cid" aria-selected="false">Search by id</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" id="cname-tab" data-toggle="tab" href="#cname" role="tab" aria-controls="cname" aria-selected="false">Search by name</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" id="code-continent-tab" data-toggle="tab" href="#code-continent" role="tab" aria-controls="code-continent" aria-selected="false">Search by code continent</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="code" role="tabpanel" aria-labelledby="code-tab">
                            <div class="form-inline p-3">
                                <label class="pr-3" for="countryCodeInput">Country code</label>
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="countryCodeInput" placeholder="AE" data-bind="value: countryCode">
                                <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCountry('countryCode', countryCode())}">Search</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cid" role="tabpanel" aria-labelledby="cid-tab">
                            <div class="form-inline p-3">
                                <label class="pr-3" for="countryIdInput">Country id</label>
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="countryIdInput" placeholder="5aa25069cf7d9a641e18ec29" data-bind="value: countryId">
                                <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCountry('countryId', countryId())}">Search</button>
                            </div></div>
                        <div class="tab-pane fade" id="cname" role="tabpanel" aria-labelledby="cname-tab">
                            <div class="form-inline p-3">
                                <label class="pr-3" for="countryNameInput">Country name</label>
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="countryNameInput" placeholder="Việt Nam" data-bind="value: countryName">
                                <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCountry('countryName', countryName())}">Search</button>
                            </div></div>
                        <div class="tab-pane fade" id="code-continent" role="tabpanel" aria-labelledby="code-continent-tab">
                            <div class="form-inline p-3">
                                <label class="pr-3" for="continentInput">Code continent</label>
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="continentInput" placeholder="AS" data-bind="value: codeContinent">
                                <button type="submit" class="btn btn-primary" data-bind="click : function () {searchCountry('codeContinent', codeContinent())}">Search</button>
                            </div></div>
                    </div>
                    <!-- //Form search -->
                    <div class="table-responsive" style="height : 400px;">
                        <table class="table pt-3">
                            <thead class="thead-light">
                                <tr>
                                    <th>Index</th>
                                    <th>Id</th>
                                    <th>Country</th>
                                    <th>Country code</th>
                                    <th>Capital</th>
                                    <th>Area</th>
                                    <th>Continent</th>
                                    <th>Currency_name</th>
                                    <th>Currency_code</th>
                                    <th>Phone</th>
                                    <th>Geonameid</th>
									<th>Neighbours</th>
									<th><p></p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ko foreach: countries() -->
                                <tr>
                                    <td data-bind="text: $index() + 1"></td>
                                    <td data-bind="text: id()"></td>
                                    <td data-bind="text: country()"></td>
                                    <td data-bind="text: iso()"></td>
                                    <td data-bind="text: capital()" ></td>
                                    <td data-bind="text: area()" ></td>
                                    <td data-bind="text: continent()" ></td>
                                    <td data-bind="text: currency_name()" ></td>
                                    <td data-bind="text: currency_code()" ></td>
                                    <td data-bind="text: phone()" ></td>
                                    <td data-bind="text: geonameid()" ></td>
									<td data-bind="text: neighbours()" ></td>
									<td>
										<div class="container" style="width: 200px;">
											<span><button class="btn btn-primary" data-bind="event: {click : $root.doUpdCountry}">upd</button></span><span class="mr-1">
												<button class="btn btn-warning mr-2" data-bind="event: {click : $root.doDelCountry}">x</button></span>
										</div>
									</td>
                                </tr>
                                <!-- /ko -->
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    <?php include 'inc\modalConfirmDelete.php';?>
</div>
