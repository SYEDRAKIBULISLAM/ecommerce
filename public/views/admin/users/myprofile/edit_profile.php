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
            <h2><button onclick="goBack()"><span class="fa fa-arrow-circle-o-left"></span></button> Profile Edit</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">


            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <!-- START JQUERY VALIDATION PLUGIN -->
                    <div class="block">
                        <!--                        <h4>jQuery Validation</h4>-->
                        <form id="jvalidate" role="form" method="post" class="form-horizontal" action="<?=root()?>/admin/users/myprofile/store_profile">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?=$data['user']->name?>" name="name" placeholder="Enter your name"/>
                                        <span class="help-block">min size = 4, max size = 100</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Birth Date</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" id="dp-3" name="birth" class="form-control datepicker" value="<?php echo (isset($data['user']->userProfile->birth_day) ? $data['user']->userProfile->birth_day : false); ?>" data-date="<?php echo (isset($data['user']->userProfile->birth_day) ? $data['user']->userProfile->birth_day : false); ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                        <span class="help-block">please enter valid birth date</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gender</label>
                                    <div class="col-md-9">
                                        <div class="col-xs-4">
                                            <label class="check"><input type="radio" value="male" class="iradio" name="gender"/> Male</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <label class="check"><input type="radio" value="female"  class="iradio" name="gender" /> Female</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <label class="check"><input type="radio" value="others"  class="iradio" name="gender" /> Others</label>
                                        </div>
                                        <span class="help-block">.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?=$data['user']->email?>" name="email" placeholder="Enter your E-mail"/>
                                        <span class="help-block">please use valid email address</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" value="<?php echo (isset($data['user']->userProfile->address) ? $data['user']->userProfile->address : false); ?>" name="address" placeholder="Enter your address"></textarea>
                                        <span class="help-block">min size = 10, max size = 255</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contact</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo (isset($data['user']->userProfile->contact) ? $data['user']->userProfile->contact : false); ?>" name="contact" placeholder="Enter your contact Number"/>
                                        <span class="help-block">min size = 5, max size = 50</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Profession</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo (isset($data['user']->userProfile->profession) ? $data['user']->userProfile->profession : false); ?>" name="profession" placeholder="Enter your profession"/>
                                        <span class="help-block">min size = 5, max size = 50</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Company Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo (isset($data['user']->userProfile->company_name) ? $data['user']->userProfile->company_name : false); ?>" name="company" placeholder="Enter your company name"/>
                                        <span class="help-block">min size = 5, max size = 100</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Designation</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo (isset($data['user']->userProfile->designation) ? $data['user']->userProfile->designation : false); ?>" name="designation" placeholder="Enter your designation"/>
                                        <span class="help-block">min size = 5, max size = 50</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">About you</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" value="<?php echo (isset($data['user']->userProfile->about) ? $data['user']->userProfile->about : false); ?>" name="about" placeholder="Enter about you"></textarea>
                                        <span class="help-block">min size = 10, max size = 255</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Website</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo (isset($data['user']->userProfile->website) ? $data['user']->userProfile->website : false); ?>" name="website" placeholder="https://example.com" class="form-control"/>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Social Links</label>
                                    <div class="col-md-9">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Facebook</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo (isset($data['user']->userProfile->fb) ? $data['user']->userProfile->fb : false); ?>" name="facebook" placeholder="https://www.facebook.com/example" class="form-control"/>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Twitter</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo (isset($data['user']->userProfile->tw) ? $data['user']->userProfile->tw : false); ?>" name="twitter" placeholder="https://twitter.com/example" class="form-control"/>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Google+</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo (isset($data['user']->userProfile->gplus) ? $data['user']->userProfile->gplus : false); ?>" name="googleplus" placeholder="https://plus.google.com/example" class="form-control"/>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Linkedin</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo (isset($data['user']->userProfile->ln) ? $data['user']->userProfile->ln : false); ?>" name="linkedin" placeholder="https://www.linkedin.com/example" class="form-control"/>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Github</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo (isset($data['user']->userProfile->git) ? $data['user']->userProfile->git : false); ?>" name="github" placeholder="https://github.com/example" class="form-control"/>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="btn-group pull-right">
                                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <!-- END JQUERY VALIDATION PLUGIN -->
                    </div>
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


<script type="text/javascript">
    var jvalidate = $("#jvalidate").validate({
        ignore: [],
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 100
            },
            email: {
                required: true,
                email: true
            },
            address: {
                minlength: 10,
                maxlength: 255
            },
            contact: {
                minlength: 5,
                maxlength: 50
            },
            profession: {
                minlength: 5,
                maxlength: 50
            },
            company: {
                minlength: 5,
                maxlength: 100
            },
            designation: {
                minlength: 5,
                maxlength: 50
            },
            about: {
                minlength: 10,
                maxlength: 255
            },
            website: {
                url: true,
                maxlength: 255
            },

            facebook: {
                url: true,
                maxlength: 255
            },
            twitter: {
                url: true,
                maxlength: 255
            },
            googleplus: {
                url: true,
                maxlength: 255
            },
            linkedin: {
                url: true,
                maxlength: 255
            },
            github: {
                url: true,
                maxlength: 255
            }

        }
    });

</script>