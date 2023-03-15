<?php
  $CategoryList = getAllMasterDatawithId('category');
?>
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
     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
         <div class="card">
           <div class="card-header">
             <h4>
               <?php echo $title; ?>
               <span class="req"> * All Fields are required</span>
             </h4>
              <h4>
             <span class="req" id="errmsg"><?php echo $this->session->flashdata('errmsg'); ?></span>
             <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>
            </h4>    
           </div>
           <div class="card-body">

               <form method="post" class="form-horizontal" action="<?php echo base_url('master_controller/updatesubcategorysuccess'); ?>" enctype="multipart/form-data" onsubmit="return valid()">
                 <div class="row">
                   <input type="hidden" name="updateid" id="updateid" value="<?=$SubCategory[0] -> id?>"/>

                     
                     <div class="col-md-4">
                       <div class="form-group">
                         <label>Category Name<span style="color:red"> *</span></label>
                         <select name="category_id" id="category_id" class="form-control">
                             <option value="">Select</option>
                             <?php
                               foreach($CategoryList as $key => $value){
                             ?>
                             <option value="<?=$key?>" <?=($SubCategory[0] -> category_id == $key)?'Selected':''?>><?=$value?></option>
                             <?php
                               }
                             ?>

                         </select>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group">
                         <label>Sub Category Name<span style="color:red"> *</span></label>
                         <input type="text" name="name" id="name" class="form-control" placeholder="Sub Category Name" value="<?=$SubCategory[0] -> name?$SubCategory[0] -> name:''?>"/>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group">
                         <label>Image<span style="color:red"> *</span></label>
                         <input type="file" name="userfile[]" id="userfile" class="form-control"/>
                       </div>
                     </div>
                     <div class="col-md-12 text-center">
                       <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save"/>
                       <a href="#" class="btn btn-danger">Cancel</a>
                     </div>

               </form>
             </div>
           </div>
         </div>
     </div>
    </div>
    <!--row closed-->
  </div>
</div>


<script>
    function valid() {
        if ($("#category_id").val() == '') {
            $("#errmsg").html("Please select a category name!");
            $("#category_id").css("border-color", "red");
            return false;
        }else if ($("#name").val() == '') {
            $("#errmsg").html("Please enter unique category name!");
            $("#name").css("border-color", "red");
            return false;
        }
    }
</script>
