<?php $__env->startSection('style'); ?>
    <?php echo Html::style("assets/libs/data-table/datatables.min.css"); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('Language')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">

            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">

                <div class="col-lg-4">
                    <div class="panel">

                        <div class="panel-heading">
                            <h3 class="panel-title"> <?php echo e(language_data('Add Language')); ?></h3>
                        </div>

                        <div class="panel-body">
                            <form class="" role="form" action="<?php echo e(url('settings/language-settings/add')); ?>" method="post" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label><?php echo e(language_data('Language')); ?> <?php echo e(language_data('Name')); ?></label>
                                    <select class="selectpicker form-control" name="language_name" data-live-search="true">
                                        <option value="af_Afrikaans">Afrikaans</option>
                                        <option value="sq_Albanian">Albanian</option>
                                        <option value="am_Amharic">Amharic</option>
                                        <option value="ar_Arabic">Arabic</option>
                                        <option value="hy_Armenian">Armenian</option>
                                        <option value="az_Azerbaijan">Azerbaijan</option>
                                        <option value="bn_Bengali">Bengali</option>
                                        <option value="eu_Basque">Basque</option>
                                        <option value="be_Belarusian">Belarusian</option>
                                        <option value="bg_Bulgarian">Bulgarian</option>
                                        <option value="ca_Catalan">Catalan</option>
                                        <option value="zh_Chinese">Chinese</option>
                                        <option value="hr_Croatian">Croatian</option>
                                        <option value="cs_Czech">Czech</option>
                                        <option value="da_Danish">Danish</option>
                                        <option value="nl_Dutch">Dutch</option>
                                        <option value="en_English">English</option>
                                        <option value="et_Estonian">Estonian</option>
                                        <option value="fi_Finnish">Finnish</option>
                                        <option value="fr_French">French</option>
                                        <option value="gl_Galician">Galician</option>
                                        <option value="ka_Georgian">Georgian</option>
                                        <option value="de_German">German</option>
                                        <option value="el_Greek">Greek</option>
                                        <option value="gu_Gujarati">Gujarati</option>
                                        <option value="he_Hebrew">Hebrew</option>
                                        <option value="hi_Hindi">Hindi</option>
                                        <option value="hu_Hungarian">Hungarian</option>
                                        <option value="is_Icelandic">Icelandic</option>
                                        <option value="id_Indonesian">Indonesian</option>
                                        <option value="ga_Irish">Irish</option>
                                        <option value="it_Italian">Italian</option>
                                        <option value="ja_Japanese">Japanese</option>
                                        <option value="kk_Kazakh">Kazakh</option>
                                        <option value="ko_Korean">Korean</option>
                                        <option value="lv_Latvian">Latvian</option>
                                        <option value="lt_Lithuanian">Lithuanian</option>
                                        <option value="mk_Macedonian">Macedonian</option>
                                        <option value="ms_Malay">Malay</option>
                                        <option value="mn_Mongolian">Mongolian</option>
                                        <option value="ne_Nepali">Nepali</option>
                                        <option value="nb_Norwegian-Bokmal">Norwegian-Bokmal</option>
                                        <option value="nn_Norwegian-Nynorsk">Norwegian-Nynorsk</option>
                                        <option value="fa_Persian">Persian</option>
                                        <option value="pl_Polish">Polish</option>
                                        <option value="pt_Portuguese">Portuguese</option>
                                        <option value="ro_Romanian">Romanian</option>
                                        <option value="ru_Russian">Russian</option>
                                        <option value="sr_Serbian">Serbian</option>
                                        <option value="si_Sinhala">Sinhala</option>
                                        <option value="sk_Slovak">Slovak</option>
                                        <option value="sl_Slovenian">Slovenian</option>
                                        <option value="es_Spanish">Spanish</option>
                                        <option value="sw_Swahili">Swahili</option>
                                        <option value="sv_Swedish">Swedish</option>
                                        <option value="ta_Tamil">Tamil</option>
                                        <option value="te_Telugu">Telugu</option>
                                        <option value="th_Thai">Thai</option>
                                        <option value="tr_Turkish">Turkish</option>
                                        <option value="uk_Ukrainian">Ukrainian</option>
                                        <option value="ur_Urdu">Urdu</option>
                                        <option value="uz_Uzbek">Uzbek</option>
                                        <option value="vi_Vietnamese">Vietnamese</option>
                                        <option value="cy_Welsh">Welsh</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Status')); ?></label>
                                    <select class="selectpicker form-control" name="status">
                                        <option value="Active"><?php echo e(language_data('Active')); ?></option>
                                        <option value="Inactive"><?php echo e(language_data('Inactive')); ?></option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Flag')); ?></label>
                                    <div class="input-group input-group-file">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <?php echo e(language_data('Browse')); ?> <input type="file" class="form-control" name="flag" accept="image/*">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                </div>

                                <p class="text-uppercase text-complete help"><?php echo e(language_data('It will take few minutes. Please do not reload the page')); ?></p>


                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> <?php echo e(language_data('Add')); ?> </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('All Languages')); ?></h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 15%;"><?php echo e(language_data('Flag')); ?></th>
                                    <th style="width: 35%;"><?php echo e(language_data('Language')); ?> <?php echo e(language_data('Name')); ?></th>
                                    <th style="width: 25%;"><?php echo e(language_data('Status')); ?></th>
                                    <th style="width: 25%;"><?php echo e(language_data('Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-label="<?php echo e(language_data('Flag')); ?>"><img src="<?php echo asset('assets/country_flag/'.$d->icon); ?>"></td>
                                        <td data-label="<?php echo e(language_data('Language')); ?> <?php echo e(language_data('Name')); ?>"><p><?php echo e($d->language); ?></p></td>
                                        <?php if($d->status=='Active'): ?>
                                            <td data-label="<?php echo e(language_data('Status')); ?>"><p class="btn btn-success btn-xs"><?php echo e(language_data('Active')); ?></p></td>
                                        <?php else: ?>
                                            <td data-label="<?php echo e(language_data('Status')); ?>"><p class="btn btn-warning btn-xs"><?php echo e(language_data('Inactive')); ?></p></td>
                                        <?php endif; ?>
                                        <td>
                                            <?php if($d->language!='English'): ?>
                                                <a class="btn btn-complete btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo e(language_data('Translate')); ?>" href="<?php echo e(url('settings/language-settings-translate/'.$d->id)); ?>"><i class="fa fa-language"></i></a>
                                                <a class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo e(language_data('Edit')); ?>" href="<?php echo e(url('settings/language-settings-manage/'.$d->id)); ?>"><i class="fa fa-edit"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo e(language_data('Delete')); ?>" class="btn btn-danger btn-xs cdelete" id="<?php echo e($d->id); ?>"><i class="fa fa-trash"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
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
            language: {
              url: '<?php echo url("assets/libs/data-table/i18n/".get_language_code()->language.".lang"); ?>'
            },
            responsive: true
          });


            /*For Delete Department*/
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
              bootbox.confirm("<?php echo language_data('Are you sure'); ?>?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/settings/language-settings/delete/" + id;
                    }
                });
            });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>