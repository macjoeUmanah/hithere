<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30"></div>
        <div class="p-15 p-t-none p-b-none m-l-10 m-r-10">

            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        

        <div class="p-15 p-t-none p-b-none">
            <div class="row">
                

                <div class="col-sm-4 m-b-15">
                    <div class="z-shad-1">
                        <div class="bg-success text-white p-15 clearfix">
                            <span class="pull-left font-45 m-l-10"><i class="fa fa-file-code-o"></i></span>

                            <div class="pull-right text-right m-t-15">
                                <span class="small m-b-5 font-15"><?php echo e($total_clients); ?> Templates</span>
                                <br>
                                <a href="<?php echo e(url('sms/create-sms-template')); ?>" class="btn btn-complete btn-xs text-uppercase"><?php echo e(language_data('Add New')); ?></a>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-sm-4 m-b-15">
                    <div class="z-shad-1">
                        <div class="bg-primary text-white p-15 clearfix">
                            <span class="pull-left font-45 m-l-10"><i class="fa fa-keyboard-o"></i></span>

                            <div class="pull-right text-right m-t-15">
                                <span class="small m-b-5 font-15"><?php echo e($total_groups); ?> Keyword</span>
                                <br>
                                <a href="<?php echo e(url('keywords/groups')); ?>" class="btn btn-complete btn-xs text-uppercase"><?php echo e(language_data('Add New')); ?></a>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><?php echo e(language_data('SMS Success History')); ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $sms_status_json->render(); ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="p-15 p-t-none p-b-none">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><?php echo e(language_data('SMS History By Date')); ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $sms_history->render(); ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>



    </section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('style'); ?>
    <?php echo Html::script("assets/libs/chartjs/chart.js"); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>