<?php $__env->startSection('style'); ?>
    <?php echo Html::style("assets/libs/data-table/datatables.min.css"); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('All Keywords')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">

            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo e(language_data('Keyword features only work with two way sms gateway provider')); ?>.
            </div>

            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('All Keywords')); ?></h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 30%;"><?php echo e(language_data('Title')); ?></th>
                                    <th style="width: 20%;"><?php echo e(language_data('Keyword')); ?></th>
                                    <th style="width: 10%;"><?php echo e(language_data('Price')); ?></th>
                                    <th style="width: 10%;"><?php echo e(language_data('Status')); ?></th>
                                    <th style="width: 30%;"><?php echo e(language_data('Action')); ?></th>
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

            let Body = $("body");

            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?php echo url('keywords/get-keywords/'); ?>',
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'keyword_name', name: 'keyword_name'},
                    {data: 'price', name: 'price'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    url: '<?php echo url("assets/libs/data-table/i18n/".get_language_code()->language.".lang"); ?>'
                },
                responsive: true
            });


            /*For Delete Keyword*/
            Body.delegate(".remove_mms", "click", function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm("<?php echo language_data('Are you sure'); ?>?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/keywords/remove-mms-file/" + id;
                    }
                });
            });

            /*For Delete Keyword*/
            Body.delegate(".cdelete", "click", function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm("<?php echo language_data('Are you sure'); ?>?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/keywords/delete-keyword/" + id;
                    }
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>