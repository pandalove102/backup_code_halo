<div kb-inject="UserController">
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

    <!-- List user -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class ="card" id="users">
                <div class="container">
                    <div class="card-header">
                        <h6 class="m-0">Search User</h6>
                        <div class="row">
                            <div class="col-md-8 p-3" style="display: flex;">
                                <input class="search form-control" placeholder="Search" data-bind="value: keysearch, valueUpdate: 'afterkeydown', enterkey: doSearchUsers"/>
                                <button type="button" class="btn btn-success ml-1" data-bind="event: {click : doSearchUsers}"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 clearfix">
                        <!-- ko if : isShowMore() -->
                        <div style="display: inline-block; float: left" >
                            <a href class="text-primary" data-bind="event: {click : doViewMore}"">Show more >></a>
                        </div>
                        <!-- /ko -->
                        <div class="p-1" style="float: right;display: inline-block;"">Total records : <span data-bind="text: totalRecordView"></span>/<span data-bind="text: totalRecord"></span></div>
                    </div>
                    <div class="card-body p-0 hide" id="list-user">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Sex</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <!-- ko foreach: users() -->
                                <tbody>
                                    <tr>
                                        <td data-bind="text: $index() + 1"></td>
                                        <td>
                                            <img data-bind="attr: {src: display_avatar }" width="80" alt="avarta" class="avatar-sm rounded-circle">
                                        </td>
                                        <td data-bind="text: full_name() ? full_name : 'No name'"> </td>
                                        <td data-bind="text: display_gender" > </td>
                                        <td data-bind="text: email() ? email : 'Unknow'"> </td>
                                        <td data-bind="text: age() ? age : 'N/A'" > </td>
                                        <td>                                    

                                            <button type="button" class="btn btn-white" data-bind="event: {click : $root.doSelectUser}">
                                                <span class="text-success"><i class="material-icons" data-bind="text: sys_blocked() == 1 ? 'remove_circle_outline' : 'block'"> </i></span>
                                                <span data-bind="text: sys_blocked() == 1  ? 'Unblock' : 'Block'"> </span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- /ko -->
                            </table>
                        </div>    
                    </div>
                    <div class="p-2 clearfix">
                        <!-- ko if : isShowMore() -->
                        <div style="display: inline-block; float: left" >
                            <a href class="text-primary" data-bind="event: {click : doViewMore}"">Show more >></a>
                        </div>
                        <!-- /ko -->
                        <div class="p-1" style="float: right;display: inline-block;"">Total records : <span data-bind="text: totalRecordView"></span>/<span data-bind="text: totalRecord"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //List user -->
    <?php include 'inc/modalConfirmPassword.php';?>
</div>
