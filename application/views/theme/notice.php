<div id="notices">
    <?php if (isset($notice) && is_array($notice)) : ?>
        <div class="alert alert-<?php echo $notice['type']; ?> alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <span><?php echo $notice['message']; ?></span>
        </div>
    <?php endif; ?>
</div>

