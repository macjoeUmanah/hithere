<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('SMS Gateway Manage')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <form class="" role="form" method="post" action="<?php echo e(url('sms/post-manage-sms-gateway')); ?>">

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo e(language_data('Basic Information')); ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($gateway->custom=='Yes'): ?>
                                            <div class="form-group">
                                                <label><?php echo e(language_data('Gateway Name')); ?></label>
                                                <input type="text" class="form-control" required name="gateway_name" value="<?php echo e($gateway->name); ?>">
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <label><?php echo e(language_data('Gateway Name')); ?></label>
                                                <input type="text" class="form-control" name="gateway_name" value="<?php echo e($gateway->name); ?>" required>
                                            </div>
                                        <?php endif; ?>

                                            <?php if($gateway->settings!='Twilio' && $gateway->settings!='Signalwire' && $gateway->settings!='Zang' && $gateway->settings!='Plivo' && $gateway->settings!='AmazonSNS' && $gateway->settings!='TeleSign' && $gateway->settings!='BSG' && $gateway->settings!='TwilioCopilot'): ?>
                                                <div class="form-group">
                                                    <label><?php echo e(language_data('Gateway API Link')); ?></label>
                                                    <input type="text" class="form-control" required name="gateway_link" value="<?php echo e($gateway->api_link); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if($gateway->settings!='Twilio' && $gateway->settings=='Signalwire' && $gateway->settings!='Zang' && $gateway->settings!='Plivo' && $gateway->settings!='AmazonSNS' && $gateway->settings!='TeleSign' && $gateway->settings!='BSG' && $gateway->settings!='TwilioCopilot'): ?>
                                                <div class="form-group">
                                                    <label>SPACE URL</label>
                                                    <input type="text" class="form-control" required name="gateway_link" value="<?php echo e($gateway->api_link); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Signalwire Phone number</label>
                                                    <textarea class="form-control" name="gateway_ids"><?php echo e($gateway->gateway_ids); ?></textarea>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($gateway->settings=='Asterisk' || $gateway->settings=='JasminSMS' || $gateway->settings=='Diafaan' || $gateway->type=='smpp'): ?>
                                                <div class="form-group">
                                                    <label>Port</label>
                                                    <input type="text" class="form-control" name="port" value="<?php echo e($gateway->port); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label><?php echo e(language_data('Schedule SMS')); ?></label>
                                                <select class="selectpicker form-control" name="schedule">
                                                    <option value="Yes" <?php if($gateway->schedule=='Yes'): ?> selected <?php endif; ?>><?php echo e(language_data('Yes')); ?></option>
                                                    <option value="No" <?php if($gateway->schedule=='No'): ?> selected <?php endif; ?>><?php echo e(language_data('No')); ?></option>
                                                </select>
                                            </div>

                                        <div class="form-group">
                                            <label>Global <?php echo e(language_data('Status')); ?></label>
                                            <select class="selectpicker form-control" name="global_status">
                                                <option value="Active" <?php if($gateway->status=='Active'): ?> selected <?php endif; ?>><?php echo e(language_data('Active')); ?></option>
                                                <option value="Inactive" <?php if($gateway->status=='Inactive'): ?> selected <?php endif; ?>><?php echo e(language_data('Inactive')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-9">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo e(language_data('Credential Setup')); ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover" id="sms_gateways">
                                            <tbody>
                                            <?php $__currentLoopData = $credentials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credential): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="info">
                                                <td>
                                                    <div class="form-group">
                                                        <label>
                                                            <?php if($gateway->settings=='Telenorcsms'): ?>
                                                                <?php echo e(language_data('Msisdn')); ?>

                                                            <?php elseif($gateway->settings=='Twilio' || $gateway->settings=='Zang'): ?>
                                                                <?php echo e(language_data('Account Sid')); ?>

                                                            <?php elseif($gateway->settings=='Signalwire'): ?>
                                                                <?php echo e('Project id'); ?>

                                                            <?php elseif($gateway->settings=='Plivo'): ?>
                                                                <?php echo e(language_data('Auth ID')); ?>

                                                            <?php elseif($gateway->settings=='Wavecell'): ?>
                                                                Sub Account ID
                                                            <?php elseif($gateway->settings=='Ovh'): ?>
                                                                APP Key
                                                            <?php elseif($gateway->settings=='MessageBird' || $gateway->settings=='AmazonSNS'): ?>
                                                                Access Key
                                                            <?php elseif($gateway->settings=='Clickatell_Touch' || $gateway->settings=='ViralThrob' || $gateway->settings=='CNIDCOM' || $gateway->settings=='SmsBump' || $gateway->settings=='BSG' || $gateway->settings=='Onehop' || $gateway->settings=='TigoBeekun' || $gateway->settings=='Beepsend' || $gateway->settings=='Easy' || $gateway->settings=='Mailjet' || $gateway->settings=='Smsgatewayhub' || $gateway->settings=='MaskSMS'  || $gateway->settings == 'EblogUs' || $gateway->settings == 'MessageWhiz'): ?>
                                                                API Key
                                                            <?php elseif($gateway->settings=='Semysms' || $gateway->settings=='Tropo'): ?>
                                                                User Token
                                                            <?php elseif($gateway->settings=='SendOut'): ?>
                                                                Phone Number
                                                            <?php elseif($gateway->settings=='Dialog'): ?>
                                                                API Key For 160 Characters
                                                            <?php elseif($gateway->settings=='LightSMS' || $gateway->name=='KingTelecom' || $gateway->name=='Tellegroup'): ?>
                                                                Login
                                                            <?php elseif($gateway->settings=='CheapSMS'): ?>
                                                                Login ID
                                                            <?php elseif($gateway->settings=='TxtNation'): ?>
                                                                Company
                                                            <?php elseif($gateway->settings=='CMSMS'): ?>
                                                                Product Token
                                                            <?php elseif($gateway->settings=='ClxnetworksHTTPRest' || $gateway->settings=='SmsGatewayMe' || $gateway->settings=='WhatsAppChatApi' || $gateway->settings=='Gatewayapi'): ?>
                                                                API Token
                                                            <?php elseif($gateway->settings=='Diamondcard'): ?>
                                                                Account ID
                                                            <?php elseif($gateway->settings=='BulkGate'): ?>
                                                                Application ID
                                                            <?php elseif($gateway->settings=='msg91'): ?>
                                                                Auth Key
                                                            <?php else: ?>
                                                                <?php echo e(language_data('SMS Api User name')); ?>

                                                            <?php endif; ?>
                                                        </label>
                                                        <input type="text" class="form-control" name="gateway_user_name[]" value="<?php echo e($credential->username); ?>">
                                                    </div>
                                                </td>
                                                <?php if($gateway->settings!='MessageBird' && $gateway->settings!='SmsGatewayMe' && $gateway->settings!='Clickatell_Touch' && $gateway->settings!='Tropo' && $gateway->settings!='SmsBump' && $gateway->settings!='BSG' && $gateway->settings!='Beepsend' && $gateway->settings!='TigoBeekun' && $gateway->settings!='Easy' && $gateway->settings!='CMSMS' && $gateway->settings != 'Mailjet' && $gateway->settings != 'ClxnetworksHTTPRest' && $gateway->settings != 'MaskSMS' && $gateway->settings!='WhatsAppChatApi' && $gateway->settings!='Gatewayapi' && $gateway->settings!='MessageWhiz'): ?>
                                                    <td>

                                                        <div class="form-group">
                                                            <label>
                                                                <?php if($gateway->settings=='Twilio' || $gateway->settings=='Zang' || $gateway->settings=='Plivo' || $gateway->settings=='Signalwire'): ?>
                                                                    <?php echo e(language_data('Auth Token')); ?>

                                                                <?php elseif($gateway->settings=='SMSKaufen' || $gateway->settings=='NibsSMS' || $gateway->settings=='LightSMS' || $gateway->settings=='Wavecell' || $gateway->settings == 'ClickSend'): ?>
                                                                    <?php echo e(language_data('SMS Api key')); ?>

                                                                <?php elseif($gateway->settings=='Semysms'): ?>
                                                                    Device ID
                                                                <?php elseif($gateway->name=='Skebby' || $gateway->name=='KingTelecom'): ?>
                                                                     Access Token
                                                                <?php elseif($gateway->settings=='SendOut'): ?>
                                                                    API Token
                                                                <?php elseif($gateway->settings=='Ovh'  || $gateway->settings=='CNIDCOM'): ?>
                                                                    APP Secret
                                                                <?php elseif($gateway->settings=='AmazonSNS'): ?>
                                                                    Secret Access Key
                                                                <?php elseif($gateway->settings=='ViralThrob'): ?>
                                                                    SaaS Account
                                                                <?php elseif($gateway->settings=='TxtNation'): ?>
                                                                    eKey
                                                                <?php elseif($gateway->settings=='Onehop'): ?>
                                                                    Label/Route
                                                                <?php elseif($gateway->settings=='Dialog'): ?>
                                                                    API Key For 320 Characters
                                                                <?php elseif($gateway->settings=='Smsgatewayhub'): ?>
                                                                    Channel
                                                                <?php elseif($gateway->settings=='Diamondcard'): ?>
                                                                    Pin code
                                                                <?php elseif($gateway->settings=='BulkGate'): ?>
                                                                    Application Token
                                                                <?php elseif($gateway->settings=='Tellegroup'): ?>
                                                                    Senha
                                                                <?php elseif($gateway->settings == 'EblogUs' || $gateway->settings == 'BudgetSMS'): ?>
                                                                    User ID
                                                                <?php elseif($gateway->settings=='msg91'): ?>
                                                                    Route
                                                                <?php else: ?>
                                                                    <?php echo e(language_data('SMS Api Password')); ?>

                                                                <?php endif; ?>
                                                            </label>
                                                            <input type="text" class="form-control" name="gateway_password[]" value="<?php echo e($credential->password); ?>">
                                                        </div>
                                                    </td>
                                                <?php endif; ?>

                                                <?php if($gateway->custom=='Yes' || $gateway->settings=='SmsGatewayMe' || $gateway->settings=='GlobexCam' || $gateway->settings=='Ovh' || $gateway->settings=='1s2u' || $gateway->settings=='SMSPRO' || $gateway->settings=='DigitalReach' || $gateway->settings=='AmazonSNS' || $gateway->settings=='ExpertTexting' || $gateway->settings == 'Advansystelecom' || $gateway->settings == 'AlertSMS' || $gateway->settings == 'Clickatell_Central' || $gateway->settings == 'Smsgatewayhub' || $gateway->settings == 'Ayyildiz' || $gateway->settings == 'TwilioCopilot' || $gateway->settings == 'BudgetSMS' || $gateway->settings=='msg91'): ?>
                                                    <td>

                                                        <div class="form-group">
                                                            <?php if($gateway->settings=='SmsGatewayMe'): ?>
                                                                <label>Device ID</label>
                                                            <?php elseif($gateway->settings=='GlobexCam' || $gateway->settings == 'Clickatell_Central'): ?>
                                                                <label><?php echo e(language_data('SMS Api key')); ?></label>
                                                            <?php elseif($gateway->settings=='Ovh'): ?>
                                                                <label>Consumer Key</label>
                                                            <?php elseif($gateway->settings=='1s2u'): ?>
                                                                <label>IPCL</label>
                                                            <?php elseif($gateway->settings=='SMSPRO'): ?>
                                                                <label>Customer ID</label>
                                                            <?php elseif($gateway->settings=='msg91'): ?>
                                                                Country Code
                                                            <?php elseif($gateway->settings=='DigitalReach'): ?>
                                                                <label>MT Port</label>
                                                            <?php elseif($gateway->settings=='AmazonSNS'): ?>
                                                                <label>Region</label>
                                                            <?php elseif($gateway->settings == 'Advansystelecom'): ?>
                                                                <label>Operator</label>
                                                            <?php elseif($gateway->settings == 'Smsgatewayhub'): ?>
                                                                <label>Route</label>
                                                            <?php elseif($gateway->settings == 'AlertSMS'): ?>
                                                                <label>Api Token</label>
                                                            <?php elseif($gateway->settings=='ExpertTexting'): ?>
                                                                <label> <?php echo e(language_data('SMS Api key')); ?></label>
                                                            <?php elseif($gateway->settings=='Ayyildiz'): ?>
                                                                <label> BayiKodu</label>
                                                            <?php elseif($gateway->settings=='TwilioCopilot'): ?>
                                                                <label> Service ID</label>
                                                            <?php elseif($gateway->settings == 'BudgetSMS'): ?>
                                                                <label>Handle</label>
                                                            <?php else: ?>
                                                                <label><?php echo e(language_data('Extra Value')); ?></label>
                                                            <?php endif; ?>
                                                            <input type="text" class="form-control" name="extra_value[]" value="<?php echo e($credential->extra); ?>">
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                                <?php if($gateway->settings=='Asterisk' ): ?>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Device Name</label>
                                                            <input type="text" class="form-control" name="device_name" value="<?php echo e(env('SC_DEVICE')); ?>">
                                                        </div>
                                                    </td>
                                                <?php endif; ?>

                                                <td>
                                                    <div class="form-group">
                                                        <label><?php echo e(language_data('Credential Base Status')); ?></label>
                                                        <select class="selectpicker form-control" name="credential_base_status[]">
                                                            <option value="Active" <?php if($credential->status=='Active'): ?> selected <?php endif; ?>><?php echo e(language_data('Active')); ?></option>
                                                            <option value="Inactive" <?php if($credential->status=='Inactive'): ?> selected <?php endif; ?>><?php echo e(language_data('Inactive')); ?></option>
                                                        </select>
                                                        <span class="help"><?php echo e(language_data('You can only active one credential information')); ?></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>


                                        <div class="row bottom-inv-con">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-success" id="blank-add"><i
                                                            class="fa fa-plus"></i> <?php echo e(language_data('Add New')); ?>

                                                </button>
                                                <button type="button" class="btn btn-danger" id="item-remove"><i
                                                            class="fa fa-minus-circle"></i> <?php echo e(language_data('Delete')); ?>

                                                </button>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>

                                        <div class="text-right">
                                            <input type="hidden" value="<?php echo e($gateway->id); ?>" name="cmd">
                                            <input type="hidden" value="<?php echo e($gateway->settings); ?>" id="gateway_name">
                                            <input type="hidden" value="<?php echo e($gateway->custom); ?>" id="gateway_custom">
                                            <input type="hidden" value="<?php echo e($gateway->type); ?>" id="gateway_type">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-save"></i> <?php echo e(language_data('Update')); ?> </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <?php echo Html::script("assets/libs/handlebars/handlebars.runtime.min.js"); ?>

    <?php echo Html::script("assets/js/form-elements-page.js"); ?>

    <?php echo Html::script("assets/js/sms-gateway.js"); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>