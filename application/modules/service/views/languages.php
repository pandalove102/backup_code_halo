<div kb-inject="LanguagesController">
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
        <div class="col-lg-12 mb-12">
            <div class="card card-small h-100">
                <div class="card-header border-bottom">
                    <h6 class="m-0">List languages</h6>
                    <div class="block-handle"></div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Key</th>
                                <th><p></p></th>
                            </tr>
                        </thead>

                        <!-- ko foreach: languages() -->
                        <tbody>
                            <tr>
                                <td data-bind="text: $index() + 1"></td>
                                <td><div data-bind="style: { backgroundImage: 'url(\'' + icon() + '\')' }"></div></td>
                                <td data-bind="text: name()"></td>
                                <td data-bind="text: code()" ></td>
                                <td data-bind="text: keyCurrency()"></td>
                                <td>[Action gi do]</td>
                            </tr>
                        </tbody>
                        <!-- /ko -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
