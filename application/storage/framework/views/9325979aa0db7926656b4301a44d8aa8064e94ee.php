<?php $__env->startSection('style'); ?>
    <?php echo Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('Update')); ?> <?php echo e(language_data('Schedule SMS')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('Update')); ?> <?php echo e(language_data('Schedule SMS')); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo e(url('sms/post-update-schedule-sms')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Phone Number')); ?></label>
                                    <span class="help">(<?php echo e(language_data('Remain country code at the beginning of the number')); ?>)</span>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo e($sh->number); ?>">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Schedule Time')); ?></label>
                                    <input type="text" class="form-control dateTimePicker" name="schedule_time" value="<?php echo e(date('m/d/y H:i y',strtotime($sh->submitted_time))); ?>">
                                </div>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Message')); ?></label>
                                    <textarea class="form-control" name="message" rows="5" id="message"><?php echo e($sh->message); ?></textarea>
                                </div>

                                <input type="hidden" value="<?php echo e($sh->id); ?>" name="cmd">
                                <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-save"></i> <?php echo e(language_data('update')); ?> </button>
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

    <?php echo Html::script("assets/libs/moment/moment.min.js"); ?>

    <?php echo Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"); ?>

    <?php echo Html::script("assets/js/form-elements-page.js"); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>