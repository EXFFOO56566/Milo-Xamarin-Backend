<?php
  $CategoryList = getAllMasterDatawithId('category');
?>
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
           <!--page-header closed-->

                       <!--row open-->
           <div class="row">
             	<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
               <div class="card">
                 <div class="card-header">
                   <h4><?php echo $title;?>
                     <a href="<?php echo site_url('author/add-sub-category');?>" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                   </h4>
                 </div>
                 <div class="card-body">
                   <span style="color:red"><?php echo $this -> session -> flashdata('errmsg');?></span>
                   <span style="color:green"><?php echo $this -> session -> flashdata('successmsg');?></span>
                   <div style="color:red; padding-left:50px "><?php echo $this -> session -> flashdata('msg');?></div>
                   <div>
                       <table id="customers2" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                           <thead>
                               <tr>
                                   <th>Serial No</th>
                                   <th>Category Name</th>
                                   <th>Sub Category</th>
                                   <th>Image</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                                <?php
                                   $i = 1;
                                   foreach ($SubCategoryList as $value){
                                 ?>
                               <tr>
                                   <td><?php echo $i++?></td>
                                   <td><?=(array_key_exists($value -> category_id, $CategoryList)?$CategoryList[$value -> category_id]:'');?></td>
                                   <td><?php echo ucwords($value -> name);?></td>
                                   <td><?php if($value -> image != ''){?><img src="<?=base_url('uploads/'.$value -> image)?>" width="30px" height="40px"><?php } ?></td>
                                   <td><a onclick="return confirm('Are you sure want to update this data?');" href="<?php echo site_url('author/update-sub-category/' . $value->id); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo base64_encode(base64_encode($value ->id)); ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
           <!--row closed-->

         </div>
       </div>

<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-sub-category/') ?>' + delid;
        }
    }
</script>
