<div class="modal fade" id="modalID">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Edit Mail</h4>
            </div>

            <div class="modal-body">
                <p>Eidt Mail</p>
                Frist Name<input class="form-control" type="text" name="" data-bind="value: firtName" >
                Last Name<input class="form-control" type="text" name="" data-bind="value: lastName">
                Full Name<input class="form-control" type="text" name="" data-bind="value: fullName">
                Email<input class="form-control" type="text" name=""    data-bind="value: mail">
                Content<input class="form-control" type="text" name="" data-bind="value: content">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bind="click: onUpdate">Update</button>
            </div>

        </div>
    </div>
</div>