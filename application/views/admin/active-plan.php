                <!--app-content open-->
				<div class="container content-area">
					<section class="section">

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
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4>
                      <?php echo $title;?>
                    </h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example-2" class="table table-striped table-bordered border-t0 text-nowrap w-100" >
												<thead>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Registered Name</th>
                                                    <th>Email ID</th>
                                                    <th>Plan Name</th>
                                                    <th>Price</th>
                                                    <th>Active Date</th>
                                                    <th>Expiry Date</th>
                                                    <th>Status</th>
                                                </tr>
												</thead>
                                                <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($SubscriptionList as $value) {
                                                    
                                                    
                                                    if($this -> session -> userdata('AyaUserRole') == 1){
                                                        if($value -> expiry_date >= date('Y-m-d', time())){                                                           
                                                            if($value -> is_active == 1){
                                                            $Status = 'Active';
                                                            $color = 'green';
                                                            $url = base_url('author/deactive-subscription/'.$value -> id);
                                                            }else{
                                                            $Status = 'Inactive';
                                                            $color = 'red';
                                                            $url = base_url('author/active-subscription/'.$value -> id);  
                                                            }
                                                        }else{
                                                            $Status = 'Expired';
                                                            $color = 'red';
                                                            $url = 'javascript:void(0)';
                                                        }
                                                    }else{
                                                        
                                                        if($value -> expiry_date >= date('Y-m-d', time())){                                                           
                                                            if($value -> is_active == 1){
                                                            $Status = 'Active';
                                                            $color = 'green';
                                                            $url = 'javascript:void(0)';
                                                            }else{
                                                            $Status = 'Inactive';
                                                            $color = 'red';
                                                            $url = 'javascript:void(0)'; 
                                                            }
                                                        }else{
                                                            $Status = 'Expired';
                                                            $color = 'red';
                                                            $url = 'javascript:void(0)';
                                                        }
                                                    }
                                                   
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->user_name; ?></td>
                                                        <td><?php echo $value->email_id; ?></td>
                                                        <td><?php echo $value->plan_name; ?></td>
                                                        <td><?php echo $value->price; ?></td>
                                                        <td><?php echo date('d.m.Y', strtotime($value->purchase)); ?></td>
                                                        <td><?php echo date('d.m.Y', strtotime($value->expiry_date)); ?></td>    
                                                        <td><a href="<?=$url?>" style="color:<?=$color?>"><?=$Status?></a></td>
                                                        
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


					</section>
				</div>

        <script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-user/') ?>' + delid;
        }
    }
</script>
