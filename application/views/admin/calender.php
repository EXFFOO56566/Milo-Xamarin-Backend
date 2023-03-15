				<div class="container content-area">
					<section class="section">
						<div class="page-header">
							<h4 class="page-title"><?php echo $title; ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="card">
									<div class="card-header">
										<h4>Full Calendar</h4>
										<span style="color:red"><?=$this -> session -> flashdata('errmsg');?></span>
                                        <span style="color:green"><?=$this -> session -> flashdata('successmsg');?></span>
									</div>
									<div class="card-body">
										<div id='calendar1'></div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="modal fade" id="myMeeting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a new meeting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('author/meeting-create-success')?>" method="post" onsubmit="return valid();">
                    <input type="hidden" name="meeting_start_date" id="meeting_start_date" />
                    <input type="hidden" name="meeting_end_date" id="meeting_end_date"/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meeting Title<span style="color:red"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Meeting Title"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meeting ID<span style="color:red"> *</span></label>
                                <input type="text" readonly="readonly" value="<?=$meeting_id?>" name="meeting_id" id="meeting_id"  class="form-control" placeholder="Meeting ID"/>
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email ID<span style="color:red"> *</span></label>
                                <input type="text" name="register_id" id="register_id" class="form-control" placeholder="Email ID"/>
                            </div>
                        </div>
                        
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Staring Time<span style="color:red"> *</span></label>
                                <input type="time" name="starting_time" id="starting_time"  class="form-control" placeholder="Starting Time"/>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Ending Time<span style="color:red"> *</span></label>
                                <input type="time" name="ending_time" id="ending_time"  class="form-control" placeholder="Ending Time"/>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Agenda<span style="color:red"> *</span></label>
                                <textarea name="agenda" id="agenda" placeholder="Agenda" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="modal-footer">
                     <button type="submit" onclick="getData();" class="btn btn-primary">Save changes</button>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
                </form>
            </div>           
        </div>
    </div>
</div>

<script>
$( document ).ready(function() {
     $("#register_id").change(function() {
    if($("#register_id option:selected").length > <?=$plan_details -> max_participants?>) { 
     alert('You can select upto '+ <?=$plan_details -> max_participants?> +' participants only');   
  }
});   
});

</script>