<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 28-May-17
 * Time: 11:30 PM
 */

include_once "db/db.php";

function getMessager($conn){
    $msgSQL="SELECT * FROM messager";
    $msgResult=$conn->query($msgSQL);
    while ($msgRow=$msgResult->fetch_assoc()){
        echo"
     <li>
         <a href='#' class='clearfix'>
            <img src='assets/images/avatars/avatar.png' class='msg-photo' alt='Alex's Avatar' />
                <span class='msg-body'>
	    			<span class='msg-title'>
					<span class='blue'>".$msgRow['userForm'].":</span>
                        ".$msgRow['note']."
					</span>

					<span class='msg-time'>
						<i class='ace-icon fa fa-clock-o'></i>
						<span>".$msgRow['createDate']."</span>
					</span>
				</span>
         </a>
     </li>";
    }
}

function getNoOfMessage($conn){
    $sql="SELECT Count(createDate) As msg FROM messager";
    $msgResult=$conn->query($sql);
    $msgRow=$msgResult->fetch_assoc();

    $NoOfMessage=$msgRow['msg'];

    return $NoOfMessage;
}

function getTaskMsg($conn){
    echo "
    <ul class='dropdown-menu dropdown-navbar'>
                                    <li>
                                        <a href='#'>
                                            <div class='clearfix'>
                                                <span class='pull-left'>Software Update</span>
                                                <span class='pull-right'>65%</span>
                                            </div>

                                            <div class='progress progress-mini'>
                                                <div style='width:65%' class='progress-bar'></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href='#'>
                                            <div class='clearfix'>
                                                <span class='pull-left'>Hardware Upgrade</span>
                                                <span class='pull-right'>35%</span>
                                            </div>

                                            <div class='progress progress-mini'>
                                                <div style='width:35%' class='progress-bar progress-bar-danger'></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href='#'>
                                            <div class='clearfix'>
                                                <span class='pull-left'>Unit Testing</span>
                                                <span class='pull-right'>15%</span>
                                            </div>

                                            <div class='progress progress-mini'>
                                                <div style='width:15%' class='progress-bar progress-bar-warning'></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href='#'>
                                            <div class='clearfix'>
                                                <span class='pull-left'>Bug Fixes</span>
                                                <span class='pull-right'>90%</span>
                                            </div>

                                            <div class='progress progress-mini progress-striped active'>
                                                <div style='width:90%' class='progress-bar progress-bar-success'></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
    ";
}

