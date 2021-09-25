<?php $__env->startSection('style'); ?>
    <?php echo Html::style("assets/libs/data-table/datatables.min.css"); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('Spam Words')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">

                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('Add New Word')); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form class="" role="form" method="post" action="<?php echo e(url('sms/post-spam-word')); ?>">

                                <div class="form-group">
                                    <label><?php echo e(language_data('Spam Words')); ?></label>
                                    <input type="text" class="form-control" name="spam_word" required>
                                </div>

                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn btn-success btn-sm pull-right"><i
                                            class="fa fa-plus"></i> <?php echo e(language_data('Add')); ?> </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('Spam Words')); ?></h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 70%"><?php echo e(language_data('Words')); ?></th>
                                    <th style="width: 30%"><?php echo e(language_data('Action')); ?></th>
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
      $(document).ready(function () {

        $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '<?php echo url('sms/get-spam-words/'); ?>',
          columns: [
            {data: 'word', name: 'word'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
          ],
          language: {
            url: '<?php echo url("assets/libs/data-table/i18n/".get_language_code()->language.".lang"); ?>'
          },
          responsive: true
        })

        /*For Delete Group*/
        $('body').delegate('.cdelete', 'click', function (e) {
          e.preventDefault()
          var id = this.id
          bootbox.confirm("<?php echo language_data('Are you sure'); ?>?", function (result) {
            if (result) {
              var _url = $('#_url').val()
              window.location.href = _url + '/sms/delete-spam-word/' + id
            }
          })
        })

      })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>