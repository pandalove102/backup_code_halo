<!doctype html>
<html class="no-js h-100" lang="en">
<?php $this->load->view('theme/header'); ?>
<body class="h-100">
<?php if (isset($notice)): ?>
    <?php echo $notice; ?>
<?php endif; ?>
<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- End Main Sidebar -->
        <main class="main-content col">
            <div class="main-content-container container-fluid px-4 my-auto h-100">
                <?php if (isset($view_content)) echo $view_content ?>
            </div>
        </main>
    </div>
</div>
<?php $this->load->view('theme/footer'); ?>
</body>
</html>