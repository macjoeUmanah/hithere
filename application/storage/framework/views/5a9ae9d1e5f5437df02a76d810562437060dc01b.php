<?php $__env->startSection('style'); ?>
    <?php echo Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"); ?>

    <?php echo Html::style("assets/libs/data-table/datatables.min.css"); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('Campaign Details')); ?></h2>
        </div>

        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="p-30 p-t-none p-b-none">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab"
                                                                  data-toggle="tab"><i class="fa fa-globe"></i> <?php echo e(language_data('Overview')); ?></a>
                        <li role="presentation"><a href="#update-campaign" aria-controls="update-campaign" role="tab"
                                                   data-toggle="tab"><i class="fa fa-edit"></i> <?php echo e(language_data('Update Campaign')); ?></a>
                        </li>
                        <li role="presentation"><a href="#recipients" aria-controls="recipients" role="tab"
                                                   data-toggle="tab"><i class="fa fa-list" aria-hidden="true"></i>
                                <?php echo e(language_data('Recipients')); ?></a></li>
                    </ul>

                    <!-- Tab panes -->
                </div>
                <div class="col-lg-12">
                    <div class="tab-content panel p-20">

                        <div role="tabpanel" class="tab-pane active" id="overview">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row text-center">

                                        <div class="col-sm-3 m-b-15">
                                            <div class="z-shad-1">
                                                <div class="bg-primary text-white p-15 clearfix">
                                                    <span class="pull-left font-45 m-l-10"><i
                                                                class="fa fa-user"></i></span>
                                                    <div class="pull-right text-right m-t-15">
                                                        <span class="small m-b-5 font-15"><?php echo e($campaign->total_recipient); ?>

                                                            <?php echo e(language_data('Recipients')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-3 m-b-15">
                                            <div class="z-shad-1">
                                                <div class="bg-complete text-white p-15 clearfix">
                                                    <span class="pull-left font-45 m-l-10"><i
                                                                class="fa fa-check"></i></span>
                                                    <div class="pull-right text-right m-t-15">
                                                        <span class="small m-b-5 font-15"><?php echo e($campaign->total_delivered); ?>

                                                            <?php echo e(language_data('Delivered')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-3 m-b-15">
                                            <div class="z-shad-1">
                                                <div class="bg-danger text-white p-15 clearfix">
                                                    <span class="pull-left font-45 m-l-10"><i
                                                                class="fa fa-close"></i></span>
                                                    <div class="pull-right text-right m-t-15">
                                                        <span class="small m-b-5 font-15"><?php echo e($campaign->total_failed); ?>

                                                            <?php echo e(language_data('Failed')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-3 m-b-15">
                                            <div class="z-shad-1">
                                                <div class="bg-success text-white p-15 clearfix">
                                                    <span class="pull-left font-45 m-l-10"><i
                                                                class="fa fa-stack"></i></span>
                                                    <div class="pull-right text-right m-t-15">
                                                        <span class="small m-b-5 font-15"><?php echo e($queued); ?>

                                                            <?php echo e(language_data('Queued')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="p-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-left"><?php echo e(language_data('Campaign Details')); ?></h3>
                                        </div>
                                        <div class="panel-body">
                                            <h3 class="panel-title"><?php echo e(language_data('Campaign ID')); ?>: <?php echo e($campaign->campaign_id); ?></h3>
                                            <br>
                                            <h3 class="panel-title"><?php echo e(language_data('Campaign Type')); ?>: <?php echo e(ucwords($campaign->camp_type)); ?></h3>
                                            <br>
                                            <h3 class="panel-title"><?php echo e(language_data('SMS Type')); ?>: <?php echo e(ucwords($campaign->sms_type)); ?></h3>
                                            <br>
                                            <h3 class="panel-title"><?php echo e(language_data('Status')); ?>: <?php echo e($campaign->status); ?></h3>
                                            <br>
                                            <h3 class="panel-title"><?php echo e(language_data('Run At')); ?>: <?php echo e(date('jS M y h:i A', strtotime($campaign->run_at))); ?></h3>
                                            <br>
                                            <h3 class="panel-title"><?php echo e(language_data('Delivered At')); ?>: <?php if($campaign->delivery_at != null): ?> <?php echo e(date('jS M y h:i A', strtotime($campaign->delivery_at))); ?> <?php endif; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="panel-heading">
                                            <h3 class="panel-title text-center"><?php echo e(language_data('Campaign Status')); ?></h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $campaign_chart->render(); ?>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="update-campaign">
                            <form role="form" method="post" action="<?php echo e(url('sms/post-update-campaign')); ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label><?php echo e(language_data('Campaign Keyword')); ?></label>
                                            <span class="help"><?php echo e(language_data('Only work with two way sms gateway provider')); ?></span>
                                            <select class="selectpicker form-control" name="keyword[]" data-live-search="true" multiple>
                                                <?php $__currentLoopData = $keyword; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($kw->keyword_name); ?>"
                                                            <?php if(in_array_r($kw->keyword_name,$selected_keywords)): ?> selected <?php endif; ?>><?php echo e($kw->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <?php if($campaign->status == 'Delivered'): ?>
                                            <div class="form-group">
                                                <label><?php echo e(language_data('Status')); ?></label>
                                                <select class="selectpicker form-control" disabled>
                                                    <option><?php echo e(language_data('Delivered')); ?></option>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label><?php echo e(language_data('Schedule Time')); ?></label>
                                                <input type="text" class="form-control" disabled
                                                       value="<?php echo e(date('m/d/y H:i y', strtotime($campaign->run_at))); ?>">
                                            </div>

                                        <?php else: ?>
                                            <?php if($campaign->sms_type == 'mms'): ?>

                                                <div class="form-group">
                                                    <label><?php echo e(language_data('Existing MMS File')); ?></label>
                                                    <p><a href="<?php echo e($campaign->media_url); ?>" target="_blank"><?php echo e($campaign->media_url); ?></a></p>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(language_data('Update MMS File')); ?></label>
                                                    <div class="form-group input-group input-group-file">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-primary btn-file">
                                                                <?php echo e(language_data('Browse')); ?> <input type="file" class="form-control" name="image" accept="image/*">
                                                            </span>
                                                        </span>
                                                        <input type="text" class="form-control" readonly="">
                                                    </div>
                                                </div>

                                            <?php endif; ?>


                                            <?php if($campaign->camp_type != 'regular'): ?>
                                                <div class="form-group">
                                                    <label><?php echo e(language_data('Status')); ?></label>
                                                    <select class="selectpicker form-control" name="status">
                                                        <option value="Scheduled" <?php if($campaign->status == 'Scheduled'): ?> selected <?php endif; ?>> <?php echo e(language_data('Scheduled')); ?></option>
                                                        <option value="Stop" <?php if($campaign->status == 'Stop'): ?> selected <?php endif; ?>><?php echo e(language_data('Stop')); ?></option>
                                                        <option value="Paused" <?php if($campaign->status == 'Paused'): ?> selected <?php endif; ?>><?php echo e(language_data('Paused')); ?></option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(language_data('Schedule Time')); ?></label>
                                                    <input type="text" class="form-control dateTimePicker" name="schedule_time" value="<?php echo e(date('m/d/y H:i y', strtotime($campaign->run_at))); ?>">
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>


                                    <div class="col-md-12">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" value="<?php echo e($campaign->id); ?>" name="campaign_id" id="campaign_id">
                                        <?php if($campaign->status != 'Delivered'): ?>
                                            <input type="submit" value="<?php echo e(language_data('Update')); ?>" class="btn btn-success">
                                        <?php endif; ?>
                                    </div>

                                </div>


                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="recipients">
                            <button id="deleteTriger" class="btn btn-danger btn-xs pull-right m-r-20"><i class="fa fa-trash"></i> <?php echo e(language_data('Bulk Delete')); ?></button>
                            <table class="table data-table table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        <div class="coder-checkbox">
                                            <input type="checkbox" id="bulkDelete"/>
                                            <span class="co-check-ui"></span>
                                        </div>

                                    </th>
                                    <th style="width: 20%;"><?php echo e(language_data('Number')); ?></th>
                                    <th style="width: 25%;"><?php echo e(language_data('Message')); ?></th>
                                    <th style="width: 10%;"><?php echo e(language_data('Amount')); ?></th>
                                    <th style="width: 20%;"><?php echo e(language_data('Status')); ?></th>
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

    <?php echo Html::script("assets/libs/data-table/datatables.min.js"); ?>

    <?php echo Html::script("assets/libs/chartjs/chart.js"); ?>

    <?php echo Html::script("assets/libs/moment/moment.min.js"); ?>

    <?php echo Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"); ?>

    <?php echo Html::script("assets/js/form-elements-page.js"); ?>

    <?php echo Html::script("assets/js/bootbox.min.js"); ?>


    <script>
        $(document).ready(function () {
            var oTable = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?php echo url('sms/get-campaign-recipients/'.$campaign->campaign_id); ?>',
                columns: [
                    {data: 'id', name: 'id', orderable: false, searchable: false},
                    {data: 'number', name: 'number'},
                    {data: 'message', name: 'message'},
                    {data: 'amount', name: 'amount'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    url: '<?php echo url("assets/libs/data-table/i18n/".get_language_code()->language.".lang"); ?>'
                },
                responsive: true,
            });

            $("#bulkDelete").on('click', function () { // bulk checked
                var status = this.checked;
                $(".deleteRow").each(function () {
                    $(this).prop("checked", status);
                });
            });

            var deleteTriger = $('#deleteTriger');
            deleteTriger.hide();

            $(".panel").delegate(".deleteRow, #bulkDelete", "change", function (e) {
                $('#deleteTriger').toggle($('.deleteRow:checked').length > 0);
            });


            deleteTriger.on("click", function (event) { // triggering delete one by one
                if ($('.deleteRow:checked').length > 0) {  // at-least one checkbox checked
                    var ids = [];
                    $('.deleteRow').each(function () {
                        if ($(this).is(':checked')) {
                            ids.push($(this).val());
                        }
                    });
                    var ids_string = ids.toString();  // array to string conversion

                    $.ajax({
                        type: "POST",
                        url: '<?php echo url('/sms/bulk-campaign-recipients-delete/'); ?>',
                        data: {
                            data_ids: ids_string,
                            campaign_id : $('#campaign_id').val()
                        },
                        success: function (result) {
                            if (result.status == 'success') {
                                alertify.log("<i class='fa fa-times-circle'></i> <span>" + result.message + "</span>", "success");
                            } else {
                                alertify.log("<i class='fa fa-times-circle'></i> <span>" + result.message + "</span>", "error");
                            }
                            oTable.draw(); // redrawing datatable
                        },
                        async: false
                    });
                }
            });

            /*For Delete Recipient*/
            $("body").delegate(".cdelete", "click", function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm("<?php echo language_data('Are you sure'); ?>?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/sms/delete-campaign-recipient/" + id;
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>