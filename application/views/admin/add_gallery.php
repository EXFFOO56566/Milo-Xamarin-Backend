<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('author/gallery-success')?>" enctype="multipart/form-data" method="post" onsubmit="return valid();">
                    <input type="hidden" name="update_id" id="update_id" value =""/>
                    <input type="hidden" id="category_id" name="category_id" value="<?php echo $album_name -> id; ?>"/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Caption<span style="color:red"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Caption"/>
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="userfile[]" id="userfile" class="form-control"/>
                            </div>
                        </div>
                    </div>
                     <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
                </form>
            </div>           
        </div>
    </div>
</div>
