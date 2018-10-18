<!doctype html>
<html class="h-100" lang="en">
<?php $this->load->view('theme/header'); ?>
<body class="h-100">
<div class="container-fluid">
    <div class="row">
        <!-- Main Sidebar -->
        <?php $this->load->view('theme/sidebar'); ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
                <!-- Main Navbar -->
                <?php $this->load->view('theme/topnav'); ?>
            </div>
            <!-- / .main-navbar -->
            <div class="main-content-container container-fluid px-4 pb-5">
                <?php if (isset($notice)) echo $notice; ?>
                <?php if (isset($view_content)) echo $view_content ?>
            </div>
        </main>
    </div>
</div>
<?php $this->load->view('theme/footer'); ?>
</body>
</html>