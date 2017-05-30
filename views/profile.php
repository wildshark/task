<?php

    include_once "db/db.php";
    $userID = $_SESSION['userID'];

    $user_sql="SELECT * FROM user_account WHERE userID='$userID'";
    $user_result=$conn->query($user_sql);
    $user_row= $user_result->fetch_assoc();

        $deptID=$user_row['Department'];

    function getGroup($conn,$deptID){

        $gpSql="SELECT * FROM user_account WHERE Department='$deptID'";
        $gpResult=$conn->query($gpSql);
       while($gpRow= $gpResult->fetch_assoc()){

           echo "
                <div class='itemdiv memberdiv'>
                            <div class='inline pos-rel'>
                                <div class='user'>
                                    <a href='#'>
                                        <img src='templates/assets/images/avatars/avatar1.png' alt='".$gpRow['FullName']."' />
                                    </a>
                                </div>

                                <div class='body'>
                                    <div class='name'>
                                        <a href='#'>
                                            <span class='user-status status-offline'></span>
                                            ".$gpRow['FullName']."
                                        </a>
                                    </div>
                                </div>                            
                            </div>
                        </div>
        ";
       }
    }

    function getActivityFeed($conn){
        $msgSql="SELECT * FROM messager";
        $msgResult=$conn->query($msgSql);
       while($msgRow= $msgResult->fetch_assoc()){

           echo "
                  <div class='profile-activity clearfix'>
                       <div>
                            <img class='pull-left' alt='".$msgRow['userForm']."' src='templates/templates/assets/images/avatars/avatar5.png' />
                            <a class='user' href='#'> ".$msgRow['userForm']." </a>
                            ".$msgRow['userTitle']."
                            <a href='#'>read now</a>

                            <div class='time'>
                                <i class='ace-icon fa fa-clock-o bigger-110'></i>
                                 ".$msgRow['createDate']."
                            </div>
                       </div>

                       <div class='tools action-buttons'>
                            <a href='#' class='blue'>
                                 <i class='ace-icon fa fa-pencil bigger-125'></i>
                            </a>

                            <a href='#' class='red'>
                                  <i class='ace-icon fa fa-times bigger-125'></i>
                            </a>
                       </div>
                  </div>";

       }
    }
?>
<div class="clearfix">
    <div class="pull-left alert alert-success no-margin alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>

        <i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
        Click on the image below or on profile fields to edit them ...
    </div>

    <div class="pull-right">
        <span class="green middle bolder">Choose profile: &nbsp;</span>

        <div class="btn-toolbar inline middle no-margin">
            <div data-toggle="buttons" class="btn-group no-margin">

                <label class="btn btn-sm btn-yellow">
                    <span class="bigger-110">View</span>

                    <input type="radio" value="2" />
                </label>

                <label class="btn btn-sm btn-yellow">
                    <span class="bigger-110">Edit</span>

                    <input type="radio" value="3" />
                </label>
            </div>
        </div>
    </div>
</div>

<div class="hr dotted"></div>

<div>

    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        Activity Feed
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#group">
                        <i class="blue ace-icon fa fa-users bigger-120"></i>
                        Group
                    </a>
                </li>

            </ul>

            <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 center">
							<span class="profile-picture">
								<img class="editable img-responsive" alt="<?php echo $user_row['FullName'];?>" id="avatar2" src="<?php echo $user_row['Path'];?>" />
							</span>

                            <div class="space space-4"></div>

                            <a href="#" class="btn btn-sm btn-block btn-success">
                                <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                                <span class="bigger-110">Add as a friend</span>
                            </a>

                            <a href="#" class="btn btn-sm btn-block btn-primary">
                                <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                                <span class="bigger-110">Send a message</span>
                            </a>
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-9">
                            <h4 class="blue">
                                <span class="middle"><?php echo $user_row['FullName'];?></span>

                                <span class="label label-purple arrowed-in-right">
									<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
										online
									</span>
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Username </div>

                                    <div class="profile-info-value">
                                        <span><?php echo $user_row['UserName'];?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Department </div>

                                    <div class="profile-info-value">
                                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span><?php echo $user_row['Department'];?></span>

                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Age </div>

                                    <div class="profile-info-value">
                                        <span>38</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Joined </div>

                                    <div class="profile-info-value">
                                        <span><?php echo $user_row['CreatedDate']; ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Last Online </div>

                                    <div class="profile-info-value">
                                        <span>3 hours ago</span>
                                    </div>
                                </div>
                            </div>

                            <div class="hr hr-8 dotted"></div>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Website </div>

                                    <div class="profile-info-value">
                                        <a href="#" target="_blank">www.alexdoe.com</a>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                    </div>

                                    <div class="profile-info-value">
                                        <a href="#">Find me on Facebook</a>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                                    </div>

                                    <div class="profile-info-value">
                                        <a href="#">Follow me on Twitter</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-20"></div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-small">
                                    <h4 class="widget-title smaller">
                                        <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                                        Little About Me
                                    </h4>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <p>
                                            My job is mostly lorem ipsuming and dolor sit ameting as long as consectetur adipiscing elit.
                                        </p>
                                        <p>
                                            Sometimes quisque commodo massa gets in the way and sed ipsum porttitor facilisis.
                                        </p>
                                        <p>
                                            The best thing about my job is that vestibulum id ligula porta felis euismod and nullam quis risus eget urna mollis ornare.
                                        </p>
                                        <p>
                                            Thanks for visiting my profile.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-small header-color-blue2">
                                    <h4 class="widget-title smaller">
                                        <i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
                                        My Skills
                                    </h4>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-16">
                                        <div class="clearfix">
                                            <div class="grid3 center">
                                                <div class="easy-pie-chart percentage" data-percent="45" data-color="#CA5952">
                                                    <span class="percent">45</span>%
                                                </div>

                                                <div class="space-2"></div>
                                                Graphic Design
                                            </div>

                                            <div class="grid3 center">
                                                <div class="center easy-pie-chart percentage" data-percent="90" data-color="#59A84B">
                                                    <span class="percent">90</span>%
                                                </div>

                                                <div class="space-2"></div>
                                                HTML5 & CSS3
                                            </div>

                                            <div class="grid3 center">
                                                <div class="center easy-pie-chart percentage" data-percent="80" data-color="#9585BF">
                                                    <span class="percent">80</span>%
                                                </div>

                                                <div class="space-2"></div>
                                                Javascript/jQuery
                                            </div>
                                        </div>

                                        <div class="hr hr-16"></div>

                                        <div class="profile-skills">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:80%">
                                                    <span class="pull-left">HTML5 & CSS3</span>
                                                    <span class="pull-right">80%</span>
                                                </div>
                                            </div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width:72%">
                                                    <span class="pull-left">Javascript & jQuery</span>

                                                    <span class="pull-right">72%</span>
                                                </div>
                                            </div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-purple" style="width:70%">
                                                    <span class="pull-left">PHP & MySQL</span>

                                                    <span class="pull-right">70%</span>
                                                </div>
                                            </div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" style="width:50%">
                                                    <span class="pull-left">Wordpress</span>

                                                    <span class="pull-right">50%</span>
                                                </div>
                                            </div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" style="width:38%">
                                                    <span class="pull-left">Photoshop</span>

                                                    <span class="pull-right">38%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /#home -->

                <div id="feed" class="tab-pane">
                    <div class="profile-' row">
                        <div class="col-sm-6">
                            <?php echo getActivityFeed($conn); ?>
                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>
                                    published a new blog post.
                                    <a href="#">Read now</a>

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        11 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <img class="pull-left" alt="Alex Doe's avatar" src="templates/templates/assets/images/avatars/avatar5.png" />
                                    <a class="user" href="#"> Alex Doe </a>

                                    upgraded his skills.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        12 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>

                                    logged in.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        12 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>

                                    logged out.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        16 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>

                                    logged in.
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        16 hours ago
                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a href="#" class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-125"></i>
                                    </a>

                                    <a href="#" class="red">
                                        <i class="ace-icon fa fa-times bigger-125"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-12"></div>

                    <div class="center">
                        <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                            <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
                            <span class="bigger-110">View more activities</span>

                            <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div><!-- /#feed -->

                <div id="group" class="tab-pane">
                    <div class="profile-users clearfix">
                       <?php echo getGroup($conn,$deptID);?>
                    </div>

                    <div class="hr hr10 hr-double"></div>

                    <ul class="pager pull-right">
                        <li class="previous disabled">
                            <a href="#">&larr; Prev</a>
                        </li>

                        <li class="next">
                            <a href="#">Next &rarr;</a>
                        </li>
                    </ul>
                </div><!-- /#friends -->
            </div>
        </div>
    </div>
</div>

<div class="hide">
    <div id="user-profile-3" class="user-profile row">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="well well-sm">
                <!-- -
<button type="button" class="close" data-dismiss="alert">&times;</button>
&nbsp; -->
                <div class="inline middle blue bigger-110"> Your profile is 70% complete </div>

                &nbsp; &nbsp; &nbsp;
                <div style="width:200px;" data-percent="70%" class="inline middle no-margin progress progress-striped active pos-rel">
                    <div class="progress-bar progress-bar-success" style="width:70%"></div>
                </div>
            </div><!-- /.well -->

            <div class="space"></div>

            <form class="form-horizontal">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-16">
                        <li class="active">
                            <a data-toggle="tab" href="#edit-basic">
                                <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                                Basic Info
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#edit-settings">
                                <i class="purple ace-icon fa fa-cog bigger-125"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#edit-password">
                                <i class="blue ace-icon fa fa-key bigger-125"></i>
                                Password
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content profile-edit-tab-content">
                        <div id="edit-basic" class="tab-pane in active">
                            <h4 class="header blue bolder smaller">General</h4>

                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <input type="file" />
                                </div>

                                <div class="vspace-12-sm"></div>

                                <div class="col-xs-12 col-sm-8">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Username</label>

                                        <div class="col-sm-8">
                                            <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-first">Name</label>

                                        <div class="col-sm-8">
                                            <input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
                                            <input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-date">Birth Date</label>

                                <div class="col-sm-9">
                                    <div class="input-medium">
                                        <div class="input-group">
                                            <input class="input-medium date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" />
                                            <span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">Gender</label>

                                <div class="col-sm-9">
                                    <label class="inline">
                                        <input name="form-field-radio" type="radio" class="ace" />
                                        <span class="lbl middle"> Male</span>
                                    </label>

                                    <label class="inline">
                                        <input name="form-field-radio" type="radio" class="ace" />
                                        <span class="lbl middle"> Female</span>
                                    </label>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Comment</label>

                                <div class="col-sm-9">
                                    <textarea id="form-field-comment"></textarea>
                                </div>
                            </div>

                            <div class="space"></div>
                            <h4 class="header blue bolder smaller">Contact</h4>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email</label>

                                <div class="col-sm-9">
									<span class="input-icon input-icon-right">
										<input type="email" id="form-field-email" value="alexdoe@gmail.com" />
										<i class="ace-icon fa fa-envelope"></i>
									</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-website">Website</label>

                                <div class="col-sm-9">
									<span class="input-icon input-icon-right">
										<input type="url" id="form-field-website" value="http://www.alexdoe.com/" />
										<i class="ace-icon fa fa-globe"></i>
									</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone</label>

                                <div class="col-sm-9">
									<span class="input-icon input-icon-right">
										<input class="input-medium input-mask-phone" type="text" id="form-field-phone" />
										<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
									</span>
                                </div>
                            </div>

                            <div class="space"></div>
                            <h4 class="header blue bolder smaller">Social</h4>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-facebook">Facebook</label>

                                <div class="col-sm-9">
									<span class="input-icon">
										<input type="text" value="facebook_alexdoe" id="form-field-facebook" />
										<i class="ace-icon fa fa-facebook blue"></i>
									</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-twitter">Twitter</label>

                                <div class="col-sm-9">
									<span class="input-icon">
										<input type="text" value="twitter_alexdoe" id="form-field-twitter" />
										<i class="ace-icon fa fa-twitter light-blue"></i>
									</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Google+</label>

                                <div class="col-sm-9">
									<span class="input-icon">
										<input type="text" value="google_alexdoe" id="form-field-gplus" />
										<i class="ace-icon fa fa-google-plus red"></i>
									</span>
                                </div>
                            </div>
                        </div>

                        <div id="edit-settings" class="tab-pane">
                            <div class="space-10"></div>

                            <div>
                                <label class="inline">
                                    <input type="checkbox" name="form-field-checkbox" class="ace" />
                                    <span class="lbl"> Make my profile public</span>
                                </label>
                            </div>

                            <div class="space-8"></div>

                            <div>
                                <label class="inline">
                                    <input type="checkbox" name="form-field-checkbox" class="ace" />
                                    <span class="lbl"> Email me new updates</span>
                                </label>
                            </div>

                            <div class="space-8"></div>

                            <div>
                                <label>
                                    <input type="checkbox" name="form-field-checkbox" class="ace" />
                                    <span class="lbl"> Keep a history of my conversations</span>
                                </label>

                                <label>
                                    <span class="space-2 block"></span>
                                    for
                                    <input type="text" class="input-mini" maxlength="3" />
                                    days
                                </label>
                            </div>
                        </div>

                        <div id="edit-password" class="tab-pane">
                            <div class="space-10"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password</label>

                                <div class="col-sm-9">
                                    <input type="password" id="form-field-pass1" />
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password</label>

                                <div class="col-sm-9">
                                    <input type="password" id="form-field-pass2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Save
                        </button>

                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div><!-- /.span -->
    </div><!-- /.user-profile -->
</div>