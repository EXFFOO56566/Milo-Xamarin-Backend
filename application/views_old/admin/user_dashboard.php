 <!--app-content open-->
       <div class="app-content">
         <div class="section">
      <!--page-header open-->
           <div class="page-header">
             <h4 class="page-title">Dashboard</h4>
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
             </ol>
           </div>
      <!--page-header closed-->

          <!--row open-->
          <div class="row">
              <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-primary mr-3">
                      <i class="fa fa-users"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><strong>Gold Plan</strong></h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-orange mr-3">
                      <i class="fa fa-cart-arrow-down"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><strong>192</strong></h4>
                       <h6>Meetings</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-warning mr-3">
                      <i class="fa fa-eye"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><strong>2,456 </strong></h4>
                      <h6>Cancelled Meetings</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-success mr-3">
                      <i class="fa fa-file-text"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><strong>125</strong></h4>
                      <h6>Expiry</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--row closed-->
          <!--row open-->

           <div class="row">
             <div class="col-12 col-md-12 col-lg-4">

 								<div class="card overflow-hidden">
 									<div class="card-header">
 										<h4>Meeting</h4>
 									</div>
 									<div class="card-body">
 										<div class="">
 											<canvas id="canvas" class="overflow-hidden"></canvas>
 										</div>
                    <div class="row text-center">
                      <div class="col-md-12">

    										<span class="badge badge-primary mt-1 mb-1">Joined Meeting</span>

                        <span class="badge badge-warning mt-1 mb-1">Total Meeting</span>

                        <span class="badge badge-orange mt-1 mb-1">Cancl. Meeting</span>

                      </div>
										</div>
 									</div>
 								</div>

             </div>
             <div class="col-12 col-md-12 col-lg-8">
									<div class="card">
										<!-- <div class="card-header">
											<h4>Tabs with Horizontal nav-pills</h4>
										</div> -->
										<div class="card-body">
											<ul class="nav nav-pills pb-3" id="myTab3" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Today,s Meeting</a>
												</li>
											  <li class="nav-item">
													<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Future Meetings</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Meeting History</a>
												</li>
                        <li class="nav-item">
													<a class="nav-link" id="Cancelled-tab3" data-toggle="tab" href="#cancelled3" role="tab" aria-controls="Cancelled" aria-selected="false">Cancelled Meeting</a>
												</li>
                        <li class="nav-item">
													<a class="nav-link" id="Payment-tab3" data-toggle="tab" href="#cancelled3" role="tab" aria-controls="Cancelled" aria-selected="false">Payment History</a>
												</li>
											</ul>
											<div class="tab-content border-top p-3">
												<div class="tab-pane fade show active p-0" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                          <div class="e-table">
    											<div class="table-responsive table-lg text-nowrap">
    												<table class="table table-bordered">
    													<thead>
    														<tr>
    															<th>#</th>
    															<th>Organizer</th>
    															<th>Meeting Participants </th>
    															<th>Meeting Password</th>
    															<th>Date & Time</th>
    															<th>Status</th>
    														</tr>
    													</thead>
    													<tbody>
    														<tr>
    															<td class="text-dark">#01</td>
    															<td>Secan Blank</td>
    															<td>
                                    <span class="text-success">Ashok Das, Rahul sarkar</span>
                                    <span class="text-danger">Tanmoy Das, Sankar</span>
                                  </td>
    															<td>1235 </td>
    															<td class="fw-600">12:30pm  10/12/2020</td>

    															<td class="text-center">
                                    <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                  </td>
    														</tr>
                                <tr>
    															<td class="text-dark">#02</td>
    															<td>Info Media</td>
    															<td>
                                    <span class="text-success">Rahul sarkar</span>
                                    <span class="text-danger">Tanmoy Das, Sankar</span>
                                  </td>
    															<td>1235 </td>
    															<td class="fw-600">12:30pm  10/12/2020</td>

                                  <td class="text-center">
                                    <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                  </td>
    														</tr>
                                <tr>
    															<td class="text-dark">#03</td>
    															<td>Secan Blank</td>
    															<td>
                                    <span class="text-success">Ashok Das, Rahul sarkar</span>
                                    <span class="text-danger">Tanmoy Das, Sankar</span>
                                  </td>
    															<td>1235 </td>
    															<td class="fw-600">12:30pm  10/12/2020</td>

                                  <td class="text-center">
                                    <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>
                                  </td>
    														</tr>
    													</tbody>
    												</table>
    											</div>
										    </div> <!-- e-table -->
										  </div>
										 <div class="tab-pane fade p-0" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                          <div class="e-table">
    											<div class="table-responsive table-lg text-nowrap">
    												<table class="table table-bordered">
    													<thead>
    														<tr>
    															<th>#</th>
    															<th>Organizer</th>
    															<th>Meeting Participants </th>
    															<th>Meeting Password</th>
    															<th>Date & Time</th>
    															<th>Status</th>
    														</tr>
    													</thead>
    													<tbody>
    														<tr>
    															<td class="text-dark">#01</td>
    															<td>Secan Blank</td>
    															<td>
                                    <span class="text-success">Ashok Das, Rahul sarkar</span>
                                    <span class="text-danger">Tanmoy Das, Sankar</span>
                                  </td>
    															<td>1235 </td>
    															<td class="fw-600">12:30pm  10/12/2020</td>

    															<td class="text-center">
                                    <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>

                                  </td>
    														</tr>
                                <tr>
    															<td class="text-dark">#02</td>
    															<td>Info Media</td>
    															<td>
                                    <span class="text-success">Rahul sarkar</span>
                                    <span class="text-danger">Tanmoy Das, Sankar</span>
                                  </td>
    															<td>1235 </td>
    															<td class="fw-600">12:30pm  10/12/2020</td>

                                  <td class="text-center">
                                    <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                  </td>
    														</tr>
                                <tr>
    															<td class="text-dark">#03</td>
    															<td>Secan Blank</td>
    															<td>
                                    <span class="text-success">Ashok Das, Rahul sarkar</span>
                                    <span class="text-danger">Tanmoy Das, Sankar</span>
                                  </td>
    															<td>1235 </td>
    															<td class="fw-600">12:30pm  10/12/2020</td>

                                  <td class="text-center">
                                    <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                  </td>
    														</tr>
    													</tbody>
    												</table>
    											</div>
										    </div>
												</div>

												<div class="tab-pane fade p-0" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                          <div class="e-table">
                            <div class="table-responsive table-lg text-nowrap">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Organizer</th>
                                    <th>Meeting Participants </th>
                                    <th>Meeting Password</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-dark">#01</td>
                                    <td>Secan Blank</td>
                                    <td>
                                      <span class="text-success">Ashok Das, Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
                                    <td>1235 </td>
                                    <td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-dark">#02</td>
                                    <td>Info Media</td>
                                    <td>
                                      <span class="text-success">Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
                                    <td>1235 </td>
                                    <td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-dark">#03</td>
                                    <td>Secan Blank</td>
                                    <td>
                                      <span class="text-success">Ashok Das, Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
                                    <td>1235 </td>
                                    <td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>

                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div> <!-- e-table -->
												</div>

                        <div class="tab-pane fade p-0" id="cancelled3" role="tabpanel" aria-labelledby="contact-tab3">
                          <div class="e-table">
      											<div class="table-responsive table-lg text-nowrap">
      												<table class="table table-bordered">
      													<thead>
      														<tr>
      															<th>#</th>
      															<th>Organizer</th>
      															<th>Meeting Participants </th>
      															<th>Meeting Password</th>
      															<th>Date & Time</th>
      															<th>Status</th>
      														</tr>
      													</thead>
      													<tbody>
      														<tr>
      															<td class="text-dark">#01</td>
      															<td>Secan Blank</td>
      															<td>
                                      <span class="text-success">Ashok Das, Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
      															<td>1235 </td>
      															<td class="fw-600">12:30pm  10/12/2020</td>

      															<td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                    </td>
      														</tr>
                                  <tr>
      															<td class="text-dark">#02</td>
      															<td>Info Media</td>
      															<td>
                                      <span class="text-success">Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
      															<td>1235 </td>
      															<td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                    </td>
      														</tr>
                                  <tr>
      															<td class="text-dark">#03</td>
      															<td>Secan Blank</td>
      															<td>
                                      <span class="text-success">Ashok Das, Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
      															<td>1235 </td>
      															<td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                    </td>
      														</tr>
      													</tbody>
      												</table>
      											</div>
  										    </div> <!-- e-table -->
												</div>

                        <div class="tab-pane fade p-0" id="cancelled3" role="tabpanel" aria-labelledby="contact-tab3">
                          <div class="e-table">
                            <div class="table-responsive table-lg text-nowrap">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Organizer</th>
                                    <th>Meeting Participants </th>
                                    <th>Meeting Password</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-dark">#01</td>
                                    <td>Secan Blank</td>
                                    <td>
                                      <span class="text-success">Ashok Das, Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
                                    <td>1235 </td>
                                    <td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-dark">#02</td>
                                    <td>Info Media</td>
                                    <td>
                                      <span class="text-success">Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
                                    <td>1235 </td>
                                    <td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>


                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-dark">#03</td>
                                    <td>Secan Blank</td>
                                    <td>
                                      <span class="text-success">Ashok Das, Rahul sarkar</span>
                                      <span class="text-danger">Tanmoy Das, Sankar</span>
                                    </td>
                                    <td>1235 </td>
                                    <td class="fw-600">12:30pm  10/12/2020</td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">Join</button>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div> <!-- e-table -->
                        </div>

											</div>

										</div> <!-- card body -->
									</div>
								</div>
           </div>

  <!-- sales summary With Tab Strat ************************************ -->
  <div class="row">
								<div class="col-12">
									<div class="card">
										<!-- <div class="card-header">
											<h4>Tabs with Horizontal nav-pills</h4>
										</div> -->
										<div class="card-body">
											<ul class="nav nav-pills pb-3" id="myTab3" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="sales-tab3" data-toggle="tab" href="#sales" role="tab" aria-controls="home" aria-selected="true">News</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="renewal-tab3" data-toggle="tab" href="#renewal" role="tab" aria-controls="profile" aria-selected="false">Video</a> </li>

											</ul>

											<div class="tab-content border-top p-3">
												<div class="tab-pane fade show active p-0" id="sales" role="tabpanel" aria-labelledby="sales-tab3">
                          <div class="e-table">
                              <div class="table-responsive table-lg text-nowrap">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Category</th>
                                      <th>Image</th>

                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td class="text-dark">#01</td>
                                      <td>Title FoE News</td>
                                      <td>Title FoE News Title FoE News</td>
                                      <td>Online News</td>
                                      <td> <img src="" alt="" width="90px"> </td>

                                      <td class="text-center">
                                        <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">View</button>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="text-dark">#01</td>
                                      <td>Title FoE News</td>
                                      <td>Title FoE News Title FoE News</td>
                                      <td>Online News</td>
                                      <td> <img src="" alt="" width="90px"> </td>

                                      <td class="text-center">
                                        <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">View</button>
                                      </td>
                                    </tr>


                                  </tbody>
                                </table>
                              </div>
                            </div> <!-- e-table -->
												</div>
												<div class="tab-pane fade p-0" id="renewal" role="tabpanel" aria-labelledby="renewal-tab3">
                          <div class="e-table">
                            <div class="table-responsive table-lg text-nowrap">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Image</th>

                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-dark">#01</td>
                                    <td>Title FoE News</td>
                                    <td>Title FoE News Title FoE News</td>
                                    <td>Online News</td>
                                    <td> <img src="" alt="" width="90px"> </td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">View</button>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td class="text-dark">#01</td>
                                    <td>Title FoE News</td>
                                    <td>Title FoE News Title FoE News</td>
                                    <td>Online News</td>
                                    <td> <img src="" alt="" width="90px"> </td>

                                    <td class="text-center">
                                      <button type="button" name="" class="btn btn-sm badge bg-success m-b-5">View</button>
                                    </td>
                                  </tr>


                                </tbody>
                              </table>
                            </div>
                          </div> <!-- e-table -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
  <!-- sales summary With Tab End ************************************ -->


         </div>
       </div>
