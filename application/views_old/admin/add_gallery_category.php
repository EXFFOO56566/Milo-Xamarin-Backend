<div class="modal fade" id="Viewcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Add Album</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>



                <div class="modal-body">

                    <span id="caterrmsg" style="color:red"></span>

                    <span id="catsuccmsg" style="color:green"></span>



                    <form action="<?=site_url('gallery_controller/add_category')?>" enctype="multipart/form-data" method="post" autocomplete="off">



                        <input type="hidden" name="cat_update_id" id="cat_update_id" value =""/>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <label>Album Name<span style="color:red"> *</span></label>

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Album Name"/>

                                </div>

                                <div class="form-group">

                                    <label>Album Details<span style="color:red"> *</span></label>

                                    <textarea name="details" id="details" class="form-control" placeholder="Album Details"></textarea>

                                </div>

                                <div class="form-group">

                                    <label>Cover Image<span style="color:red"> *</span></label>

                                    <input type="file" name="userfile[]" id="userfile" class="form-control"/>

                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit"/>

                        </div>

                    </form>

                </div>

            </div>

    </div>

</div>



<script>

  $(document).ready(function(){

           $.ajax({ type: 'post', datatype: 'json', url: "<?= base_url('Gallery_controller/get_category_dropdown') ?>"})

            .done(function(res){

                $("#category_id").html(res)

            })

            .fail(function(){

                alert("somethings error");

            })

    })

    

     function get_dropdowncategory(){

              $.ajax({ type: 'post', datatype: 'json', url: "<?= base_url('Gallery_controller/get_category_dropdown') ?>"})

            .done(function(res){

                $("#category_id").html(res)

            })

            .fail(function(){

                alert("somethings error");

            }) 

           }

    

    function category(){

      $.ajax({ type: 'post', datatype: 'json', url: "<?=base_url('Gallery_controller/get_category')?>"})

       .done(function(res){

        $('#Viewcategory').modal('show');

        $("#addtodo").html(res)

       })

       .fail(function(){

           alert("somethings error");

       })      

    }



   

    

    function delcategory(catId){

        if(confirm("Are you sure want to delete the data?"))

        $.ajax({ type: 'post', datatype: 'json', data: {'cat_id': catId}, url: "<?=base_url('Todo_controller/deletecategory')?>"})

         .done(function(res){

           get_dropdowncategory();

           category();  

         })   

    }

    

    function addcategory(){

        if($("#name").val() == ""){

            $("#caterrmsg").html("Please enter a album name!");

            $("#name").css("border-color", "red");   

        }else{

        $.ajax({ type: 'post', datatype: 'json', data: {'cat_name': $('#name').val(), 'details': $('#details').val(), 'update_id': $('#cat_update_id').val()}, url: "<?=base_url('Gallery_controller/add_category')?>"})

       .done(function(res){

           alert(res);

   

         if(res == 1){

           get_dropdowncategory();

           category();  

         }else if(res == 0){

            $("#caterrmsg").html("Data insert error."); 

         }else{

            $("#caterrmsg").html("Enter a duplicate category name."); 

         }

       })

       .fail(function(){

           alert("somethings error.");

       })

      }

    }

    

    

    

    function updatecategory(updateId){

        $.ajax({ type:'POST', dataType: 'json', data: {id: updateId}, url: "<?=base_url('Todo_controller/updatecategory')?>"})

         .done(function(res){

            $("#name").val(res.name);

            $("#cat_update_id").val(res.id);

         })

         .fail(function(){

             alert("Some things error!");

         })

    }



</script>
