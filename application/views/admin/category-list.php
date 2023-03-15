<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li><?php echo $title;?></li>
</ul>
<div class="page-content-wrap">
    <!--START ADD CUSTOMER-->   
    <div class="row">
        <div class="col-md-12">                    
            <div class="panel panel-default">
                <span style="color:red"><?php echo $this -> session -> flashdata('errmsg');?></span>
                <span style="color:green"><?php echo $this -> session -> flashdata('successmsg');?></span>
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title;?></h3>  
                    <div class="btn-group pull-right">
                  
                     <a href="<?php echo site_url('add-category');?>" class="btn btn-success dropdown-toggle">Add Category</a> 
                    </div>                     
                </div>
                <div style="color:red; padding-left:50px "><?php echo $this -> session -> flashdata('msg');?></div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>                        
                             <?php  
                                $i = 1;
                                foreach ($CategoryList as $value){
                              ?>                           
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo ucwords($value -> name);?></td>                                
                                <td><?php if($value -> image != ''){?><img src="<?php echo base_url('uploads/'.$value -> image);?>" width="30px" height="40px"/><?php }?></td>
                                <td><a href="<?php echo site_url('update-category/' . $value->id); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>|<a href="#" onclick="return del_conn('<?php echo base64_encode(base64_encode($value ->id)); ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>                                
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

<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('delete-user/') ?>' + delid;
        }
    }
</script>