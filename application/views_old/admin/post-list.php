<?php

  $SubCategoryArray = getAllMasterDatawithId('sub_category');
?>

<!--app-content open-->
       <div class="app-content">
         <div class="section">

                       <!--page-header open-->
           <div class="page-header">
             <h4 class="page-title"><?php echo $title;?></h4>
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Profile</li>
             </ol>
           </div>
           <!--page-header closed-->

                       <!--row open-->
           <div class="row">
             	<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
               <div class="card">
                 <span style="color:red"><?php echo $this -> session -> flashdata('errmsg');?></span>
                 <span style="color:green"><?php echo $this -> session -> flashdata('successmsg');?></span>
                 <div class="card-header">
                   <h4><?php echo $title;?>
                     <a href="<?php echo site_url('author/add-post');?>" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                   </h4>
                 </div>
                 <div style="color:red; padding-left:50px "><?php echo $this -> session -> flashdata('msg');?></div>
                 <div class="card-body">
                   <table id="customers2" class="table datatable">
                       <thead>
                           <tr>
                               <th>Serial No</th>
                               <th>Category Name</th>
                               <th>Title</th>
                               <th>Details</th>
                               <th>Video</th>
                               <th>Banner</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                            <?php
                               $i = 1;
                               foreach ($PostDetails as $value){
                             ?>
                           <tr>
                               <td><?php echo $i++?></td>
                               <td><?php echo $SubCategoryArray[$value -> sub_category_id];?></td>
                               <td><?php echo $value -> title;?></td>
                               <td><?=$value -> details?></td>
                               <td><iframe width="80" height="75" src="<?php echo "https://www.youtube.com/embed/".$value -> url;?>"></iframe></td>
                               <td><img src="<?=base_url('uploads/'.$value -> image)?>" width="40px" height="50px"/></td>
                               <td><a onclick="return confirm('Are you sure want to update this data?');" href="<?php echo site_url('author/update-video/' . $value->id); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value ->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
            window.location.href = '<?php echo base_url('author/delete-video/') ?>' + delid;
        }
    }
</script>
