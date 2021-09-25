<?php $__env->startSection('style'); ?>
    <?php echo Html::style("assets/libs/data-table/datatables.min.css"); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30 clearfix">
            <h2 class="page-title inline-block">HTTP <?php echo e(language_data('SMS Gateway')); ?></h2>

            <a href="<?php echo e(url('sms/add-sms-gateways')); ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> <?php echo e(language_data('Add Gateway')); ?></a>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">HTTP <?php echo e(language_data('SMS Gateway')); ?></h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 5%;"><?php echo e(language_data('SL')); ?>#</th>
                                    <th style="width: 13%;"><?php echo e(language_data('Gateway Name')); ?></th>
                                    <th style="width: 13%;"><?php echo e(language_data('Original Name')); ?></th>
                                    <th style="width: 10%;"><?php echo e(language_data('Schedule SMS')); ?></th>
                                    <th style="width: 10%;"><?php echo e(language_data('Two Way')); ?></th>
                                    <th style="width: 8%;"><?php echo e(language_data('MMS')); ?></th>
                                    <th style="width: 8%;"><?php echo e(language_data('Voice')); ?></th>
                                    <th style="width: 8%;"><?php echo e(language_data('Status')); ?></th>
                                    <th style="width: 20%;"><?php echo e(language_data('Action')); ?></th>
                                </tr>
                                </thead>
                            </table>
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

    <?php echo Html::script("assets/libs/data-table/datatables.min.js"); ?>

    <?php echo Html::script("assets/js/bootbox.min.js"); ?>


    <script>
        $(document).ready(function(){
          $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo url('sms/get-all-gateways-data/'); ?>',
            columns: [
              {data: 'id', name: 'id', orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {data: 'settings', name: 'settings'},
              {data: 'schedule', name: 'schedule', searchable: false},
              {data: 'two_way', name: 'two_way', searchable: false},
              {data: 'mms', name: 'mms', searchable: false},
              {data: 'voice', name: 'voice', searchable: false},
              {data: 'status', name: 'status', searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language: {
              url: '<?php echo url("assets/libs/data-table/i18n/".get_language_code()->language.".lang"); ?>'
            },
            responsive: true
          });


            /*For Delete Gateway*/
            $( "body" ).delegate( ".cdelete", "click",function (e) {
                e.preventDefault();
                var id = this.id;
              bootbox.confirm("<?php echo language_data('Are you sure'); ?>?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/sms/delete-sms-gateway/" + id;
                    }
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>