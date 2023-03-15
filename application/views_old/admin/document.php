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
                            <a href="#" data-toggle="modal" data-target="#ViewModal" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
                                                    <th>Doc name</th>
                                                    <th>Doc no</th>
                                                    <th>Issued By</th>
                                                    <th>Issue Date</th>
                                                    <th>Expiry Date</th>
                                                    <th>Country Issue</th>
                                                    <th>File</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($fileList as $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->name; ?></td>
                                                        <td><?php echo $value->doc_no; ?></td>
                                                        <td><?php echo $value->issued_by; ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($value->issue_date)); ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($value->expiry_date)); ?></td>
                                                        <td><?php echo $value->country_issue; ?></td>                                                       
                                                        <td><a target="_blank" href="<?=site_url('uploads/doc/'.$value -> file)?>"><i class="fa fa-file-o" aria-hidden="true"></i></a></td>
                                                       
                                                       <td>
                                                            <a onclick="update('<?=$value -> id?>')" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </a>
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
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new doc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('author/doc-success')?>" enctype="multipart/form-data" method="post" onsubmit="return valid();">
                    <input type="hidden" name="update_id" id="update_id" value =""/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Doc Name<span style="color:red"> *</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Doc name"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Doc No<span style="color:red"> *</span></label>
                                <input type="text" name="doc_no" id="doc_no" class="form-control" placeholder="Doc no"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Issue Date<span style="color:red"> *</span></label>
                                <input type="date" name="issue_date" id="issue_date" class="form-control"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expiry Date<span style="color:red"> *</span></label>
                                <input type="date" name="expiry_date" id="expiry_date" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Issued By<span style="color:red"> *</span></label>
                                <input type="text" name="issued_by" id="issued_by" class="form-control" placeholder="Issued by"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country of Issue<span style="color:red"> *</span></label>
                                <input type="text" name="country_issue" id="country_issue" class="form-control" placeholder="Country Of Issue"/>
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label>File<span style="color:red"> *</span></label>
                                <input type="file" name="userfile[]" id="userfile" class="form-control" />
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

<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-doc/') ?>' + delid;
        }
    }

    function update(updateId){
        $.ajax({ type:'POST', dataType: 'json', data: {id: updateId}, url: "<?=base_url('author/doc-update')?>"})
         .done(function(res){
            $("#name").val(res.name);
            $("#doc_no").val(res.doc_no);
            $("#issue_date").val(res.issue_date);
            $("#expiry_date").val(res.expiry_date);
            $("#issued_by").val(res.issued_by);
            $("#country_issue").val(res.country_issue);
            $("#update_id").val(res.id);
            $('#ViewModal').modal('show');
         })
         .fail(function(){
             alert("Some things error!");
         })
    }

    function valid(){
        if($("#name").val() == ''){
            $("#errmsg").html("Please enter doc name!");
            $("#name").css("border-color", "red");
            return false;
       }else if($("#doc_no").val() == ''){
            $("#errmsg").html("Please enter doc no!");
            $("#doc_no").css("border-color", "red");
            return false;
       }else if($("#issue_date").val() == ''){
            $("#errmsg").html("Please enter issue date!");
            $("#issue_date").css("border-color", "red");
            return false;
       }else if($("#expiry_date").val() == ''){
            $("#errmsg").html("Please enter expiry date!");
            $("#expiry_date").css("border-color", "red");
            return false;
       }else if($("#issued_by").val() == ''){
            $("#errmsg").html("Please enter issue by!");
            $("#issued_by").css("border-color", "red");
            return false;
       }else if($("#country_issue").val() == ''){
            $("#errmsg").html("Please enter country of issue name!");
            $("#country_issue").css("border-color", "red");
            return false;
       }else if($("#file").val() == ''){
            $("#errmsg").html("Please upload a doc file!");
            $("#file").css("border-color", "red");
            return false;
       }
    }
    
    
</script>
