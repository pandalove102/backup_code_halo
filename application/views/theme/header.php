<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard - HAHALOLO</title>
    <meta name="description"
          content="HAHALOLO Slogan">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CORE STYLESHEET -->
    <?php if (isset($core_stylesheets)) echo assets_css($core_stylesheets); ?>

    <!-- APP STYLESHEET -->
    <?php if (isset($external_stylesheets)) echo assets_css($external_stylesheets); ?>

    <!-- VIEW CONSTANT -->
    <script>var HALO_CONSTANT = <?php echo json_encode($this->config->item('view_global_variables')) ?>;</script>
    <?php if(ENVIRONMENT !== ENV_PRODUCTION): ?>
        <script>
            console.log('%c ENVIRONMENT: ','color: green;', '<?php echo strtoupper(ENVIRONMENT) ?>');
            console.log('%c HALO_CONSTANT: ','color: blue;', HALO_CONSTANT );
        </script>
<?php endif; ?>
</head>