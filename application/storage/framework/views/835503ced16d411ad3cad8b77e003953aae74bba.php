<ul class="media-list user_list">
    <?php $__currentLoopData = $sms_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="media" id="<?php echo e($history->id); ?>">    <!-- active visitor -->
            <div class="media-left">
            <span class="avatar avatar-md avatar-online">
                <img class="media-object rounded-circle" src="<?php echo e(asset('assets/img/avatar.jpg')); ?>" alt="Image">
            </span>
            </div>
            <div class="media-body">
                <h6 class="list-group-item-heading"><?php echo e(get_contact_info($history->sender)); ?>

                    <span class="font-small-3 pull-right primary chat-time"><?php echo e(date('y-m-d h:m A', strtotime($history->updated_at))); ?></span>
                </h6>
                <p class="list-group-item-text">
                    <?php echo e($history->receiver); ?>

                    <span class="badge chat-bg-primary pull-right"><?php echo e(get_unread_notification($history->id)); ?></span>
                </p>
                
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
