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
<!--        <div class="page-title">-->
<!--            <h2><button onclick="goBack()"><span class="fa fa-arrow-circle-o-left"></span></button> Category 3 Edit</h2>-->
<!--        </div>-->
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-12">

                    <div class="error-container">
                        <div class="error-code">404</div>
                        <div class="error-text">page not found</div>
                        <div class="error-subtext">Unfortunately we're having trouble loading the page you are looking for. Please wait a moment and try again or use action below.</div>
                        <div class="error-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-info btn-block btn-lg" onClick="document.location.href = '<?php root();?>/admin';">Back to dashboard</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Previous page</button>
                                </div>
                            </div>
                        </div>
                        <div class="error-subtext">Or you can use search to find anything you need.</div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..." class="form-control"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
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


<?php require_once ('public/views/admin/common/bottom.php');?>

