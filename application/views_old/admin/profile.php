
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
             <div class="col-lg-12 col-xl-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<div class="text-center">
											<div class="userprofile social">
												<div class="userpic"> <img src="<?php echo base_url('assets/img/avatar/avatar-3.jpeg'); ?>" alt="" class="userpicimg"> </div>
												<h3 class="username">Alica Nestle</h3>
												<p>Web Designer, USA</p>

												<div class="socials text-center"> <a href="" class="btn btn-circle btn-primary ">
													<i class="fa fa-facebook"></i></a> <a href="" class="btn btn-circle btn-danger ">
													<i class="fa fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">
													<i class="fa fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
              <div class="col-lg-8 col-md-12 col-sm-12">
								<div class="card">

									<div class="card-body">
                    <div class="row d-flex">
											<div class="col-lg-6 col-md-12">
													<h4>Personal Details</h4>
											</div>
											<div class="col-lg-6 col-md-12 follower">
												<div class="float-right d-none d-lg-block">

													<a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-success mt-1"><i class="fe fe-edit followbtn ml-1"></i> Edit Profile</a>
												</div>
											</div>
                      <div class="col-lg-6 col-md-12">

                        <p><b>Full Name :</b>  <span class="pull-right">Alica Nestle</span></p>
                        <p><b>User ID :</b> <span class="pull-right">Alicanestle</span></p>
                        <p><b>Mobile No :</b><span class="pull-right">+876 6789 234</span></p>
                        <p><b>Email ID :</b> <span class="pull-right">jessicalee@gmail.com</span></p>
                        <p><b>City :</b> <span class="pull-right">Kolkata</span></p>
                        <p><b>State :</b> <span class="pull-right">UP</span></p>
                        <p><b>Zip Code :</b> <span class="pull-right">780257</span></p>
                        <p><b>Address : </b> <span class="pull-right"> 900 E. La Sierra St.Valrico, FL 33594</span></p>
                      </div>
										</div>



									</div>
								</div>


							</div>
           </div>
           <!--row closed-->

         </div>
       </div>
       <!-- Edit Profile  Modal -->
       				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       					<div class="modal-dialog" role="document">
       						<div class="modal-content">
       							<div class="modal-header">
       								<h5 class="modal-title" id="exampleModalLabel">Edit Personal Details</h5>
       								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       									<span aria-hidden="true">×</span>
       								</button>
       							</div>
       							<div class="modal-body">
                      <form method="post">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>User Name<span style="color:red"> *</span></label>
                                  <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value=""/>
                              </div>
                            </div>
                            <div class="col-md-6">

                              <div class="form-group">
                                <label>Password<span style="color:red"> *</span></label>
                                  <input type="text" name=""  class="form-control" placeholder="User ID" value=""/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile No<span style="color:red"> *</span></label>
                                  <input type="text" name=""  class="form-control" placeholder="Mobile No" value=""/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Email ID<span style="color:red"> *</span></label>
                                  <input type="email" name=""  class="form-control" placeholder="Email ID" value=""/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>City<span style="color:red"> *</span></label>
                                <select class="form-control" name="">
                                  <option value=""> UP</option>
                                  <option value=""> Kolkata</option>
                                </select>

                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>State<span style="color:red"> *</span></label>
                                <select class="form-control" name="">
                                  <option value=""> WB</option>
                                  <option value=""> Maharastha</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Zip Code<span style="color:red"> *</span></label>
                                  <input type="text" name=""  class="form-control" placeholder="Zip Code" value=""/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Photo<span style="color:red"> *</span></label>
                                <div class="custom-file">
    																<input type="file" class="custom-file-input" name="example-file-input-custom">
    																<label class="custom-file-label">Choose file</label>
															  </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Address<span style="color:red"> *</span></label>
                                <textarea class="form-control" name="name"  rows="5" cols="40"></textarea>
                              </div>
                            </div>



                          </div>
                      </form>
       							</div>
       							<div class="modal-footer">
                      	<button type="button" class="btn btn-primary">Save changes</button>
       								<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
       							</div>
       						</div>
       					</div>
       				</div>
<!-- Edit Profile Modal closed -->
