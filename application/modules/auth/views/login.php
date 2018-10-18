<div class="row no-gutters h-100"  kb-inject="LoginController">
    <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
        <div class="card">
            <div class="card-body" data-bind="with: credentials">
                <?php echo assets_img('hahalolo-logo.png', array('class' => 'auth-form__logo d-table mx-auto mb-3', 'style' => 'max-width: 120px')); ?>
                <h5 class="auth-form__title text-center mb-4">Access Your Account</h5>
                <form data-bind="submit: onSubmit">
                    <div class="form-group">
                        <label for="input-username">Username</label>
                        <input type="text" class="form-control" id="input-username"
                               placeholder="Enter email or phone" data-bind="value: username"></div>
                    <div class="form-group">
                        <label for="input-password">Password</label>
                        <input type="password" class="form-control" id="input-password"
                               placeholder="Password" data-bind="value: password"></div>

                    <?php if (FALSE): /* Hiện tại không dùng đến */ ?>
                        <div class="form-group mb-3 d-table mx-auto">
                            <div class="custom-control custom-checkbox mb-1">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Remember me for 30
                                    days.</label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Access
                        Account
                    </button>
                </form>
            </div>
        </div>
        <?php if (FALSE): ?>
            <div class="auth-form__meta d-flex mt-4">
                <a href="forgot-password.html">Forgot your password?</a>
                <a class="ml-auto" href="register.html">Create new account?</a>
            </div>
        <?php endif; ?>
    </div>
</div>