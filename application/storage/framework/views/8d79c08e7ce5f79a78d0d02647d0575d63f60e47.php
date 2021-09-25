<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('Add New Contact')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('Add New Contact')); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form class="" role="form" method="post" action="<?php echo e(url('sms/post-new-contact')); ?>">

                                <div class="form-group">
                                    <label>Country Code</label>
                                    <select class="selectpicker form-control" name="country_code" data-live-search="true">
                                        <option value="0">Exist on phone number</option>
                                        <?php $__currentLoopData = $country_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($code->country_code); ?>" <?php if(app_config('Country') == $code->country_name): ?> selected <?php endif; ?> ><?php echo e($code->country_name); ?> (<?php echo e($code->country_code); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Phone Number')); ?></label>
                                    <input type="text" class="form-control" required name="number" value="<?php echo e(old('number')); ?>">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('First Name')); ?></label>
                                    <input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Last Name')); ?></label>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Email')); ?></label>
                                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                                </div>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Company')); ?></label>
                                    <input type="text" class="form-control" name="company" value="<?php echo e(old('company')); ?>">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('User name')); ?></label>
                                    <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>">
                                </div>



                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" name="cmd" value="<?php echo e($id); ?>">
                                <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> <?php echo e(language_data('Add')); ?> </button>
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