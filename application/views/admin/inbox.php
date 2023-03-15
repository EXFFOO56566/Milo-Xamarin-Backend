<!--app-content open-->
      <div class="app-content">
        <div class="section">

            <!--page-header open-->
          <div class="page-header">
            <h4 class="page-title">Mail-Inbox</h4>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#" class="text-light-color">Mail</a></li>
              <li class="breadcrumb-item active" aria-current="page">Mail-Inbox</li>
            </ol>
          </div>
          <!--page-header closed-->

                      <!--email-app open-->
          <div class="email-app mb-4">
            <nav class="p-0">
              <div class="card-body">
                <a href="#" class="btn btn-primary btn-block mb-0">New Email</a>
              </div>
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link mr-0 border-top" href="#"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-primary">4</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mr-0" href="#"><i class="fa fa-star"></i> Stared</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mr-0" href="#"><i class="fa fa-rocket"></i> Sent</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mr-0" href="#"><i class="fa fa-trash-o"></i> Trash</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mr-0" href="#"><i class="fa fa-bookmark"></i> Important</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mr-0" href="#"><i class="fa fa-inbox"></i> Settings <span class="badge badge-danger">4</span></a>
                </li>
              </ul>
            </nav>
            <div class="inbox p-0">
              <div class="card-body">
                <div class="mailsearch mb-0">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-primary" type="submit"><i class="ion ion-search"></i></button>
                </div>
                <div class="toolbar d-none d-lg-block ">
                  <div class="btn-group mt-3 ">
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-envelope"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-star"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-star-o"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-bookmark-o"></span>
                    </button>
                  </div>
                  <div class="btn-group mt-3 ">
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-mail-reply"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-mail-reply-all"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-mail-forward"></span>
                    </button>
                  </div>
                  <button type="button" class="mt-3 btn btn-sm btn-light">
                    <span class="fa fa-trash-o"></span>
                  </button>
                  <div class="btn-group mt-3 ">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                      <span class="fa fa-tags"></span>
                      <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">add label <span class="badge badge-danger"> Home</span></a>
                      <a class="dropdown-item" href="#">add label <span class="badge badge-info"> Job</span></a>
                      <a class="dropdown-item" href="#">add label <span class="badge badge-success"> Clients</span></a>
                      <a class="dropdown-item" href="#">add label <span class="badge badge-warning"> News</span></a>
                    </div>
                  </div>
                  <div class="btn-group float-right mt-3 d-none d-lg-block">
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-chevron-left"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light">
                      <span class="fa fa-chevron-right"></span>
                    </button>
                  </div>
                </div>
              </div>

               <ul class="mail_list list-group list-unstyled">
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_1">
                          <label for="basic_checkbox_1"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Velit a labore</a>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry. </p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item unread">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_2">
                          <label for="basic_checkbox_2"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Simply dummy text</a>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_3">
                          <label for="basic_checkbox_3"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Velit a labore</a>
                        <span class="badge bg-danger mb-1">Google</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg"> If you are going to use a passage of Lorem Ipsum, you need to be sure</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item unread">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_4">
                          <label for="basic_checkbox_4"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Variations of passages</a>
                        <span class="badge bg-warning mb-1">Themeforest</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">There are many variations of passages of Lorem Ipsum available, but the majority </p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_5">
                          <label for="basic_checkbox_5"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Generators on the Internet</a>
                        <span class="badge bg-danger mb-1">Work</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">LAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_6">
                          <label for="basic_checkbox_6"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Contrary to popular</a>
                        <span class="badge bg-warning mb-1">Themeforest</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_7">
                          <label for="basic_checkbox_7"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Velit a labore</a>
                        <span class="badge bg-success mb-1">Work</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry. </p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_8" checked="">
                          <label for="basic_checkbox_8"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Variations of passages</a>
                        <span class="badge bg-primary mb-1">Themeforest</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">There are many variations of passages of Lorem Ipsum available, but the majority </p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_9">
                          <label for="basic_checkbox_9"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline "></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Generators on the Internet</a>
                        <span class="badge bg-success mb-1">Work</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">LAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="pull-left mt-1">
                      <div class="controls">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_10">
                          <label for="basic_checkbox_10"></label>
                        </div>
                        <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline "></i></a>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">
                        <a href="viewmail.html" class="mr-2">Velit a labore</a>
                        <span class="badge bg-info mb-1">Family</span>
                        <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt ml-2"></i> </small>
                      </div>
                      <p class="msg">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry. </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!--email-app closed-->

        </div>
      </div>
      <!--app-content closed-->
