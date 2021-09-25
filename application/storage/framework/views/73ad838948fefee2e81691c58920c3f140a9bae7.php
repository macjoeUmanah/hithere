<?php $__env->startSection('content'); ?>
    <section class="wrapper-bottom-sec">
        <div class="p-30  p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <?php echo Html::script("assets/libs/handlebars/handlebars.runtime.min.js"); ?>

    <?php echo Html::script("assets/js/form-elements-page.js"); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>