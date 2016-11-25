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
            <h2><button onclick="window.history.back();"><span class="fa fa-arrow-circle-o-left"></span></button> Edit Image</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form enctype="multipart/form-data" method="post" action="<?=root()?>/admin/users/myprofile/store_image" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Upload Image</label>
                                <input type="file" class="file" name="image" required data-preview-file-type="any"/>
                                <span class="help-block">image type = jpg/jpeg/png, max size = 1MB</span>
                            </div>
                        </div>
                    </form>
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


<?php require_once ('public/views/admin/common/bottom_fileUP.php');?>


<script>
//    $(function(){
//        $("#file-simple").fileinput({
//            showUpload: false,
//            showCaption: false,
//            browseClass: "btn btn-danger",
//            fileType: "any"
//        });
//        $("#filetree").fileTree({
//            root: '/',
//            script: 'assets/filetree/jqueryFileTree.php',
//            expandSpeed: 100,
//            collapseSpeed: 100,
//            multiFolder: false
//        }, function(file) {
//            alert(file);
//        }, function(dir){
//            setTimeout(function(){
//                page_content_onresize();
//            },200);
//        });
//    });
</script>