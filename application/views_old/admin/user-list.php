<!--app-content open-->
       <div class="app-content">
         <div class="section">
                       <!--page-header open-->
           <div class="page-header">
             <h4 class="page-title"><?php echo $title;?></h4>
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
             </ol>
           </div>
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
								<div class="card">
                  <div class="card-header">
                    <h4><?php echo $title;?>
                      <a href="<?php echo site_url('author/add-user');?>" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div>
                        <span style="color:red"><?php echo $this -> session -> flashdata('errmsg');?></span>
                        <span style="color:green"><?php echo $this -> session -> flashdata('successmsg');?></span>

                        <div style="color:red; padding-left:50px "><?php echo $this -> session -> flashdata('msg');?></div>
                        <div>
                            <table id="customers2" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Full Name</th>
                                        <th>User Name</th>
                                        <th>Mobile No</th>
                                        <th>Email ID</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                     $UserList = json_decode($UserList);
                                        $i = 1;
                                        foreach ($UserList as $value){
                                      ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo ucwords($value -> name);?></td>
                                        <td><?php echo $value -> user_id;?></td>
                                        <td><?php echo $value -> mobile_no;?></td>
                                        <td><?php echo $value -> email_id;?></td>
                                        <td><?php echo ucwords($value -> address);?></td>
                                        <?php
                                          if($value -> status == 1){
                                        ?>
                                        <td><a style="color:green" onclick="return confirm('Are you sure want to inactive this account?')" href="<?=site_url('author/change-status/0'.'/'.$value -> id)?>">Active</a></td> 
                                        <?php
                                          }else{
                                        ?>
                                        <td><a style="color:red" onclick="return confirm('Are you sure want to active this account?')" href="<?=site_url('author/change-status/1'.'/'.$value -> id)?>">Inactive</a></td> 
                                        <?php
                                          }
                                        ?>
                                        <td><a onclick="return confirm('Are you sure want to update this data?');" href="<?php echo site_url('author/update-user/' . base64_encode(base64_encode($value->id))); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo base64_encode(base64_encode($value ->id)); ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
           <!--row closed-->
         </div>
       </div>



<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-user/') ?>' + delid;
        }
    }
</script>
