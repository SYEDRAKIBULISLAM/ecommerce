<?php include_once 'functions/RootURL.php'; ?>
<!--TOP OF THE HTML PAGE-->

<?php require_once ('public/views/admin/common/top.php');?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <?php require_once ('public/views/admin/common/sidebar.php');?>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <?php require_once ('public/views/admin/common/header.php');?>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <?php require_once ('public/views/admin/common/breadcrumb.php');?>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><button onclick="window.history.back();"><span class="fa fa-arrow-circle-o-left"></span></button> My Profile</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">Information</h3>
                    </div>
                    <div class="panel-heading">
                        <div class="col-md-6" align="center">
                            <?php if(isset($data['user']->userProfile->image)): ?>
                                <a href="<?=root()?>/admin/users/myprofile/edit_image" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Update Image</a>
                            <?php else: ?>
                                <a href="<?=root()?>/admin/users/myprofile/edit_image" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add Image</a>
                            <?php endif;?>
                        </div>
                        <div class="col-md-6" align="center">
                            <a href="<?=root()?>/admin/users/myprofile/edit_profile" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Edit Profile</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6" align="center">
                            <div>
                                <img class="img-responsive"  src="<?=root()?><?=$data['imgPath']?>" alt="<?=$data['user']->name?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table  table-hover">

                                    <tbody>
                                    <tr>
                                        <th>Username</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Birthday</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Profession</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Company Name</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>About Me</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <th>Social Links</th>
                                        <td>
                                            <a class="btn btn-block btn-social btn-facebook">
                                                <i class="fa fa-facebook"></i> Facebook
                                            </a>
                                            <a class="btn btn-block btn-social btn-twitter">
                                                <i class="fa fa-twitter"></i> Twitter
                                            </a>
                                            <a class="btn btn-block btn-social btn-google-plus">
                                                <i class="fa fa-google-plus"></i> Google Plus
                                            </a>
                                            <a class="btn btn-block btn-social btn-linkedin">
                                                <i class="fa fa-linkedin"></i> LinkedIn
                                            </a>
                                            <a class="btn btn-block btn-social btn-github">
                                                <i class="fa fa-github"></i> GitHub
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--                    <div class="panel-body list-group border-bottom">-->
<!--                        <a href="#" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> Activity</a>-->
<!--                        <a href="#" class="list-group-item"><span class="fa fa-coffee"></span> Groups <span class="badge badge-default">+3</span></a>-->
<!--                        <a href="#" class="list-group-item"><span class="fa fa-users"></span> Friends <span class="badge badge-danger">+7</span></a>-->
<!--                        <a href="#" class="list-group-item"><span class="fa fa-folder"></span> Apps</a>-->
<!--                        <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Settings</a>-->
<!--                    </div>-->
                </div>

            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->

    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<?php require_once ('public/views/admin/common/message_box.php');?>
<!-- END MESSAGE BOX-->


<?php require_once ('public/views/admin/common/bottom_form.php');?>

