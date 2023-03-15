<div class="app-content">
    <div class="section">

        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title"><?php echo $title; ?></h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo $title; ?>
                            <a href="<?php echo site_url('author/add-subscription'); ?>" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    
                    <div class="card-body">
                        <div style="color:red; padding-left:50px "><?php echo $this->session->flashdata('msg'); ?></div>
                        <span style="color:red"><?php echo $this->session->flashdata('errmsg'); ?></span>
                        <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>
                        <table id="customers2" class="table datatable">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Valid For</th>
                                    <th>Rules</th>
                                    <th>Max Meeting</th>
                                    <th>Max Participants</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($SubscriptionList as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?= $value->valid_for. ' Days' ?></td>
                                        <td><?php echo $value->rules; ?></td>
                                        <td><?= $value->max_meeting ?></td>
                                        <td><?= $value->max_participants ?></td>
                                        <td><?= number_format($value->price, 2) ?></td>
                                        <td><a onclick="return confirm('Are you sure want to update this data?');" href="<?php echo site_url('author/update-subscription/' . $value->id); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
        <!--row closed-->
    </div>
</div>



<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-subscription/') ?>' + delid;
        }
    }
</script>
