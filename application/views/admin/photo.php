<div class="app-content">
    <div class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title"><?php echo $album_name -> name; ?></h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item"><a href="<?=site_url('author/gallery')?>" class="text-light-color">Album</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $album_name -> name; ?></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo $album_name -> name; ?>
                            <a href="#" data-toggle="modal" data-target="#ViewModal" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <span style="color:red"><?php echo $this->session->flashdata('errmsg'); ?></span>
                                    <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>

                                    <div style="color:red; padding-left:50px "><?php echo $this->session->flashdata('msg'); ?></div>
                        <div class="row">
                            <?php
                             foreach($photoList as $value){
                            ?>
                             <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                                            <div class="card">
                                                <div class="img-container">
                                                    <img src="<?= base_url('uploads/gallery/'.$value -> image) ?>" height="250px" alt="">
                                                    <div class="overlay text-center">
                                                        <p class="text-white"><?=$value ->title?></p>
<!--                                                        <a href="<?=site_url('view-photo/'.$value -> id)?>" class="btn btn-primary"><?=$value ->name?></a>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                           
                             <?php
                             }
                             ?>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row closed-->
</div>
</div>

<!-- modal Start -->
<?php include('add_gallery.php'); ?>
<?php //include('add_gallery_category.php'); ?>



<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-reminder/') ?>' + delid;
        }
    }


   
    function update(updateId) {
        $.ajax({type: 'POST', dataType: 'json', data: {id: updateId}, url: "<?= base_url('author/todo-update') ?>"})
                .done(function (res) {
                    $("#title").val(res.title);
                    $("#location").val(res.location);
                    $("#place_visit").val(res.place_visit);
                    $("#date").val(res.date);
                    $("#category_id").val(res.category_id);
                    $("#start_time").val(res.start_time);
                    $("#note").val(res.note);
                    $("#update_id").val(res.id);
                    $('#ViewModal').modal('show');
                    $("#exampleModalLabel").html("Update Todo");
                })
                .fail(function () {
                    alert("Some things error!");
                })
    }

    function valid() {
        if ($("#title").val() == '') {
            $("#errmsg").html("Please enter reminder title!");
            $("#title").css("border-color", "red");
            return false;
        } else if ($("#type").val() == '') {
            $("#errmsg").html("Please enter a type!");
            $("#type").css("border-color", "red");
            return false;
        } else if ($("#start_date").val() == '') {
            $("#errmsg").html("Please enter start date!");
            $("#start_date").css("border-color", "red");
            return false;
        } else if ($("#end_date").val() == '') {
            $("#errmsg").html("Please enter end date!");
            $("#end_date").css("border-color", "red");
            return false;
        }
    }


</script>
