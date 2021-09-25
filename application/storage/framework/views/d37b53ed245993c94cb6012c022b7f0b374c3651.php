<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(app_config('AppName')); ?> - <?php echo e(language_data('Forget Password')); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <?php echo Html::style("assets/libs/bootstrap/css/bootstrap.min.css"); ?>

    <?php echo Html::style("assets/libs/font-awesome/css/font-awesome.min.css"); ?>

    <?php echo Html::style("assets/css/style.css"); ?>

    <?php echo Html::style("assets/css/responsive.css"); ?>


</head>
<body>

<main id="wrapper" class="wrapper">
    <div class="container jumbo-container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="app-logo-inner text-center">
                    <img src="<?php echo asset(app_config('AppLogo')); ?>" alt="logo" class="bar-logo">
                </div>

                <div class="panel panel-30">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><?php echo e(language_data('Reset your password')); ?></h3>
                    </div>
                    <div class="panel-body">
                        <form class="" role="form" action="<?php echo e(url('user/forgot-password-token')); ?>" method="post">

                            <div class="form-group form-group-default required">
                                <label for="Email"><?php echo e(language_data('Email')); ?></label>
                                <input type="email" name="email" class="form-control" required="">
                            </div>

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><?php echo e(language_data('Reset My Password')); ?></button>
                        </form>
                        <br>
                        <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="panel-other-acction">
                    <div class="text-sm text-center">
                        <a href="<?php echo e(url('/')); ?>"><?php echo e(language_data('Back To Sign in')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php echo Html::script("assets/libs/jquery-1.10.2.min.js"); ?>

<?php echo Html::script("assets/libs/jquery.slimscroll.min.js"); ?>

<?php echo Html::script("assets/libs/bootstrap/js/bootstrap.min.js"); ?>

<?php echo Html::script("assets/js/scripts.js"); ?>


</body>
</html>
