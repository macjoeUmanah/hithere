<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('Keyword Settings')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('Keyword Settings')); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form class="" role="form" action="<?php echo e(url('keywords/post-keyword-setting')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Show In Client')); ?></label>
                                    <select class="selectpicker form-control" name="show_keyword_in_client">
                                        <option value="1" <?php if(app_config('show_keyword_in_client')=='1'): ?> selected <?php endif; ?>><?php echo e(language_data('Yes')); ?></option>
                                        <option value="0" <?php if(app_config('show_keyword_in_client')=='0'): ?> selected <?php endif; ?>><?php echo e(language_data('No')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="fname"><?php echo e(language_data('Opt in SMS Keyword')); ?></label>
                                    <span class="help"><?php echo e(language_data('Insert keyword using comma')); ?> (,)</span>
                                    <textarea class="form-control" name="opt_in_sms_keyword" rows="5"><?php echo e(app_config('opt_in_sms_keyword')); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fname"><?php echo e(language_data('Opt Out SMS Keyword')); ?></label>
                                    <span class="help"><?php echo e(language_data('Insert keyword using comma')); ?> (,)</span>
                                    <textarea class="form-control" name="opt_out_sms_keyword" rows="5"><?php echo e(app_config('opt_out_sms_keyword')); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fname"><?php echo e(language_data('Custom Gateway Success Response Status')); ?></label>
                                    <span class="help"><?php echo e(language_data('Insert keyword using comma')); ?> (,)</span>
                                    <textarea class="form-control" name="custom_gateway_response_status" rows="5"><?php echo e(app_config('custom_gateway_response_status')); ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> <?php echo e(language_data('Update')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <?php echo Html::script("assets/libs/handlebars/handlebars.runtime.min.js"); ?>

    <?php echo Html::script("assets/js/form-elements-page.js"); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>