<!-- CORE SCRIPTS -->
<?php if (isset($core_scripts)) echo assets_js($core_scripts, array('charset' => 'utf-8')); ?>

<!-- APP SCRIPTS -->
<?php if (isset($external_scripts)) echo assets_js($external_scripts, array('charset' => 'utf-8')); ?>

<?php if (ENVIRONMENT !== ENV_PRODUCTION): ?>
    <script>
        $(document).ready(function () {
            $('pre code').each(function (i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
<?php endif; ?>
