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
                                        <td><?=$data['user']->username?></td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td><?=$data['user']->name?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?=$data['user']->email?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td><?=$data['user']->contact?></td>
                                    </tr>
                                    <?php if(isset($data['user']->userProfile->id)):?>
                                    <tr>
                                        <th>Birthday</th>
                                        <td><?php if($data['user']->userProfile->birth_date != '0000-00-00'){echo $data['user']->userProfile->birth_date;}?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td><?=$data['user']->userProfile->gender?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?=$data['user']->userProfile->address?></td>
                                    </tr>
                                    <tr>
                                        <th>Profession</th>
                                        <td><?=$data['user']->userProfile->profession?></td>
                                    </tr>
                                    <tr>
                                        <th>Company Name</th>
                                        <td><?=$data['user']->userProfile->company_name?></td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td><?=$data['user']->userProfile->designation?></td>
                                    </tr>
                                    <tr>
                                        <th>About Me</th>
                                        <td><?=$data['user']->userProfile->about?></td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td><a href="<?=$data['user']->userProfile->website?>" target="_blank"><?=$data['user']->userProfile->website?></a></td>
                                    </tr>
                                    <tr>
                                        <th>Social Links</th>
                                        <td>
                                            <?php if($data['user']->userProfile->fb != ''):?>
                                            <a class="btn btn-block btn-social btn-facebook" href="<?=$data['user']->userProfile->fb?>" target="_blank">
                                                <i class="fa fa-facebook"></i> Facebook
                                            </a>
                                            <?php endif; ?>
                                            <?php if($data['user']->userProfile->tw != ''):?>
                                            <a class="btn btn-block btn-social btn-twitter" href="<?=$data['user']->userProfile->tw?>" target="_blank">
                                                <i class="fa fa-twitter"></i> Twitter
                                            </a>
                                            <?php endif; ?>
                                            <?php if($data['user']->userProfile->gplus != ''):?>
                                            <a class="btn btn-block btn-social btn-google-plus" href="<?=$data['user']->userProfile->gplus?>" target="_blank">
                                                <i class="fa fa-google-plus"></i> Google Plus
                                            </a>
                                            <?php endif; ?>
                                            <?php if($data['user']->userProfile->ln != ''):?>
                                            <a class="btn btn-block btn-social btn-linkedin" href="<?=$data['user']->userProfile->ln?>" target="_blank">
                                                <i class="fa fa-linkedin"></i> LinkedIn
                                            </a>
                                            <?php endif; ?>
                                            <?php if($data['user']->userProfile->git != ''):?>
                                            <a class="btn btn-block btn-social btn-github" href="<?=$data['user']->userProfile->git?>" target="_blank">
                                                <i class="fa fa-github"></i> GitHub
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
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

