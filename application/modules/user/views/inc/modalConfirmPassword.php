<div class="modal fade" id="modalConfirmPassword" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalLabel" style="text-align: center;">Please input your password for <br> to confirm action!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <!-- ko if: targetUser -->
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" data-bind="value: targetUser().email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" data-bind="value: targetUser().password">
                    </div>
                </div>

<!--                <div class="form-group">-->
<!--                    <label for="">Username</label>-->
<!--                    <p data-bind="text: selectedUser.email"> </p>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                <span>Password :</span>-->
<!--				<input type="password" name="password" style="width: 200px;" data-bind="value: password">-->
<!--                </div>-->
                <!-- /ko -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-warning" data-bind="event: {click : onConfirm }">Confirm</button>
			</div>
		</div>  
	</div>
</div>
