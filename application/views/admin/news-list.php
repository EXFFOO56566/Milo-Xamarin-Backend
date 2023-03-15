<?php
$SubCategoryArray = getAllMasterDatawithId('sub_category');
?>
<div class="app-content">
    <div class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title"><?php echo $title; ?></h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo $title; ?>
                            <a href="<?php echo site_url('author/add-news'); ?>" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <span style="color:red"><?php echo $this->session->flashdata('errmsg'); ?></span>
                                    <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>

                                    <div style="color:red; padding-left:50px "><?php echo $this->session->flashdata('msg'); ?></div>
                                    <div>
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Category Name</th>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($NewsList as $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $SubCategoryArray[$value->sub_category_id]; ?></td>
                                                        <td><?php echo $value->title; ?></td>
                                                        <td>
                                                            <?php echo $value->details; ?>
<!--                                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#ViewModal"><b> View Button </b></a>-->
                                                        </td>
                                                        <td><img src="<?= base_url('uploads/' . $value->image) ?>" width="40px" height="50px"/></td>
                                                        <td>
                                                            <a onclick="return confirm('Are you sure want to update this data?');" href="<?php echo site_url('author/update-news/' . $value->id); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </a>
<!--                                                            <a href="#" class="btn btn-sm btn-warning ">View </a>-->
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
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
<!-- Modal -->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">News Title Show </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    Shah Rukh Khan and Gauri Khan's daughter Suhana Khan is one of the most popular star kids on social media. The young diva, who enjoys a huge fan following on social media, recently took to Instagram to share a series of new pictures. Suhana has been spending quality time at home with family amid the ongoing pandemic and winning over the internet with her social media posts. Taking to Instagram, the young starlet recently shared a series of pictures of herself wherein she can be seen showing off her mesmerising looks as she spends time in the house library. Suhana captioned the post as "walked into the room, you know you made my
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal closed -->
<!-- modal End -->

<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-news/') ?>' + delid;
        }
    }
</script>
