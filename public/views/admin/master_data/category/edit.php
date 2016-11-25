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
            <h2><button onclick="goBack()"><span class="fa fa-arrow-circle-o-left"></span></button> Category Create</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">


            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <!-- START JQUERY VALIDATION PLUGIN -->
                    <div class="block">
                        <!--                        <h4>jQuery Validation</h4>-->
                        <form id="jvalidate" role="form" method="post" class="form-horizontal" action="<?=root()?>/admin/master_data/category/update/<?=$data['category']->id?>">
                            <input type="hidden" name="user_id" value="<?=$_SESSION['userid'];?>">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?=$data['category']->name;?>" name="name" placeholder="Enter Category name"/>
                                        <span class="help-block">min size = 2, max size = 20</span>
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
                minlength: 2,
                maxlength: 20
            },
        }
    });

</script>