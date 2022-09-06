<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="AppCtrl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="/global_assets/js/main/jquery.min.js"></script>
    <script src="/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/admin/assets/js/app.js"></script>
    <!-- /theme JS files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.2/angular.min.js" integrity="sha512-OboE6z4eMJ4Z58c77mLjwOChLo1ZoGMdBTd2ggt0PyheD8irXxmQBCqZkLPlz/rNC1f9kPsDuHRNuL2HKkm9FA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/angularjs/app.js"></script>
    <script src="/angularjs/factory.js"></script>
    <script src="/angularjs/dirPagination.js"></script>


</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-lg navbar-dark navbar-static">
    <div class="navbar-brand ml-2 ml-lg-0">
        <a href="index.html" class="d-inline-block">
            <img src="/global_assets/images/logo_light.png" alt="">
        </a>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Enter your credentials below</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" placeholder="Email" ng-model="email">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" placeholder="Password" ng-model="password" >
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" ng-click="login()">Sign in</button>
                            </div>

                            <div class="text-center">
                                <a href="login_password_recover.html">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
						</span>

                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
                        <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
