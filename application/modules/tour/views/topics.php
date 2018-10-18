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
    <div class="col-12 col-sm-8 d-flex align-items-center justify-content-end">
        <div class="btn-group btn-group-toggle d-inline-flex mb-4 mb-sm-0" role="group" aria-label="Page actions">
            <a href="index.html" class="btn btn-white active"> New Facilities Group </a>
            <!--            <a href="ecommerce.html" class="btn btn-white"> Sales </a>-->
        </div>
    </div>
</div>
<!-- End Page Header -->

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card card-small h-100">
            <div class="card-header border-bottom">
                <h6 class="m-0">Group</h6>
                <div class="block-handle"></div>
            </div>
            <div class="card-body p-0">
                <div class="container-fluid px-0 py-2">
                    <div class="row px-3 align-items-center">
                        <div class="col">
                            Thiết bị giải trí
                        </div>
                        <div class="col-auto">
                            <div class="btn-toolbar">
                                <div class="btn-group btn-group-sm mr-1">
                                    <button type="button" class="btn btn-white">
                                        <span class="text-danger"><i class="material-icons">clear</i></span></button>
                                </div>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-white">
                                        <span class="text-success"><i class="material-icons">check</i></span> Rename </button>
                                    <button type="button" class="btn btn-white">
                                        <span class="text-light"><i class="material-icons">more_vert</i></span> Detail </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success">Create new group</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card card-small">
            <div class="card-header border-bottom">
                <h6 class="m-0">Facilities</h6>
                <div class="block-handle"></div>
            </div>
            <div class="card-body p-0">

            </div>
            <div class="card-footer border-top">

            </div>
        </div>
    </div>
</div>