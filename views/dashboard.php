<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-May-17
 * Time: 1:00 AM
 */

include_once "db/db.php";

function getTotalTask($conn){

    $sql="SELECT Count(user_task.taskID) AS TotalTask FROM user_task";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_task = $row['TotalTask'];

    return $total_task;
}

function getTotalAchieved($conn){
    $sql="SELECT Count(taskID) AS TotalAchieved FROM user_task WHERE statusID = 2";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_achieved = $row['TotalAchieved'];
    return $total_achieved;
}

function getTotalPending($conn){
    $sql="SELECT Count(user_task.taskID) AS Total FROM user_task WHERE user_task.statusID = 1";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_pending = $row['Total'];
    return $total_pending;
}

function getTotalTeam($conn){
    $sql="SELECT Count(user_account.userID) AS Total FROM user_account";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_team = $row['Total'];
    return $total_team;
}

function getPersonalAchieved($conn){

    $user_id=$_SESSION['userID'];
    $sql="SELECT Count(user_task.taskID) AS TotalTask FROM user_task WHERE user_task.userID = $user_id";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_task = $row['TotalTask'];

    $sql="SELECT Count(user_task.taskID) AS TotalAchieve FROM user_task WHERE statusID = 2 AND user_task.userID = $user_id";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_achieved = $row['TotalAchieve'];
    if (empty($total_task)){
        $achieve="0.0%";
    }else{
        $Percentage_per_unit=100 / $total_task;
        $Percentage=($Percentage_per_unit * $total_achieved);
        $achieve= number_format($Percentage)."%";
    }

    return $achieve;
}
function getPersonalPending($conn){
    $user_id = $_SESSION['userID'];

    $sql = "SELECT Count(user_task.taskID) AS TotalTask FROM user_task WHERE user_task.userID=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_task = $row['TotalTask'];

    $sql = "SELECT Count(user_task.taskID) AS TotalPending FROM user_task WHERE statusID = 1 And user_task.userID=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $pending = $row['TotalPending'];
    if (empty($total_task)){
        $pending ="0.0%";
    }else{
        $Percentage_per_unit = 100 / $total_task;
        $Percentage = ($Percentage_per_unit * $pending);
        $pending =  number_format($Percentage). "%";
    }

    return $pending;
}
function getDeptAchieved($conn){
    $user_id=$_SESSION['userID'];
    $sql="SELECT Count(user_task.taskID) AS TotalTask FROM user_task";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_task = $row['TotalTask'];

    $sql="SELECT Count(user_task.taskID) AS TotalAchieve FROM user_task WHERE statusID = 2";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_achieved = $row['TotalAchieve'];
    if (empty($total_task)){
        $achieve="0.0%";
    }else{
        $Percentage_per_unit=100 / $total_task;
        $Percentage=($Percentage_per_unit * $total_achieved);
        $achieve= number_format($Percentage)."%";
    }

    return $achieve;
}


function getDeptPending($conn){
    $user_id=$_SESSION['userID'];

    $sql="SELECT Count(user_task.taskID) AS TotalTask FROM user_task";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $total_task = $row['TotalTask'];

    $sql="SELECT Count(user_task.taskID) AS TotalPending FROM user_task WHERE statusID = 1";
    $result=$conn->query($sql);
    $row= $result->fetch_assoc();
    $pending = $row['TotalPending'];
    if(empty($total_task)){
        $pending="0.0%";
    }else{
        $Percentage_per_unit=100 / $total_task;
        $Percentage=($Percentage_per_unit * $pending);
        $pending= number_format($Percentage)."%";
    }

    return $pending;
}


$pageData->totaltask=getTotalTask($conn);
$pageData->totalachieved=getTotalAchieved($conn);
$pageData->totalpending=getTotalPending($conn);
$pageData->totalteam=getTotalTeam($conn);

$pageData->personalachieve=getPersonalAchieved($conn);
$pageData->personalpend=getPersonalPending($conn);

$pageData->deptachieve=getDeptAchieved($conn);
$pageData->deptpend=getDeptPending($conn);
?>
<div class='col-sm-6'>
    <h3 class='header smaller lighter green'>Welcome to Task Management!</h3>
    <p></p>
    <a href='#' class='btn btn-default btn-app radius-4'>
        <i class='ace-icon fa  fa-calendar bigger-250'></i>
        New Task
    </a>
    <a href='#' class='btn btn-default btn-app radius-4'>
        <i class='ace-icon fa fa-users bigger-250'></i>
        View Task
        <span class='badge badge-pink'><?php echo $pageData->totaltask ?></span>
    </a>
    <a href='#' class='btn btn-default btn-app radius-4'>
        <i class='ace-icon fa fa-coffee bigger-250'></i>
        Achieved
        <span class='badge badge-pink'><?php echo $pageData->totalachieved ?></span>
    </a>
    <a href='#' class='btn btn-default btn-app radius-4'>
        <i class='ace-icon fa fa-cogs bigger-250'></i>
        Pending
        <span class='badge badge-pink'><?php echo $pageData->totalpending ?></span>
    </a>
    <a href='#' class='btn btn-default btn-app radius-4'>
        <i class='ace-icon fa fa-users bigger-250'></i>
        teams
        <span class='badge badge-pink'><?php echo $pageData->totalteam ?></span>
    </a>
    <h3 class='header smaller lighter green'>Quick Task</h3>
    <form action='modules/newtask.php' method='get' class='form-horizontal' role='form' enctype='application/x-www-form-urlencoded'>

        <div class='form-group'>
            <label  class='col-xs-2 control-label no-padding-right' for='id-date-picker-1'>Start Date</label>
            <div class='col-xs-8 col-sm-7'>
                <div class='input-group'>
                    <input name='date' class='form-control date-picker' id='id-date-picker-1' type='date' data-date-format='dd-mm-yyyy' />
                    <span class='input-group-addon'>
								    <i class='fa fa-calendar bigger-110'></i>
								</span>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Task Subject</label>

            <div class='col-sm-8'>
                <input name='task_subject' type='text' id='form-field-1' placeholder='Task Subject' class='col-xs-10 col-sm-10' />
            </div>
        </div>

        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'>Task</label>

            <div class='col-sm-8'>
                <textarea name='note' type='text' id='form-field-8' class='col-xs-10 col-sm-10' placeholder='Task'></textarea>
            </div>
        </div>

        <div class='form-group'>
            <label  class='col-xs-2 control-label no-padding-right' for='id-date-picker-1'>End Date</label>
            <div class='col-xs-8 col-sm-7'>
                <div class='input-group'>
                    <input name='due_date' class='form-control date-picker' id='id-date-picker-1' type='due_date' data-date-format='dd-mm-yyyy' />
                    <span class='input-group-addon'>
								    <i class='fa fa-calendar bigger-110'></i>
								</span>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <button type='submit' class='btn btn-sm btn-primary'>
                <i class='ace-icon fa fa-comment-o  align-top bigger-125'></i>
                Submit Task
            </button>

        </div>
    </form>
</div>

<div class='col-sm-6'>
    <h3 class='header smaller lighter red'>Task Wells</h3>

    <div class='well'>
        <h4 class='green smaller lighter'>Normal Well</h4>
        Use the well as a simple effect on an element to give it an inset effect.
    </div>
</div>

<div class='col-sm-6'>
    <div class='row'>
        <h3 class='header smaller lighter green'>Personal Evolution</h3>
        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'>Achieved</label>
            <div class='col-sm-8 progress pos-rel' data-percent='<?php echo $pageData->personalachieve ?>'>
                <div class='progress-bar' style='width:<?php echo $pageData->personalachieve; ?>'></div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'>Pending</label>
            <div class='col-sm-8 progress pos-rel' data-percent='<?php echo $pageData->personalpend ?>'>
                <div class='progress-bar' style='width:<?php echo $pageData->personalpend; ?>'></div>
            </div>
        </div>
    </div>
</div>

<div class='col-sm-6'>
    <div class='row'>
        <h3 class='header smaller lighter green'>Department Evolution</h3>
        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'>Achieved</label>
            <div class='col-sm-8 progress pos-rel' data-percent='<?php echo $pageData->deptachieve ?>'>
                <div class='progress-bar' style='width:<?php echo $pageData->deptachieve; ?>'></div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'>Pending</label>
            <div class='col-sm-8 progress pos-rel' data-percent='<?php echo $pageData->deptpend ?>'>
                <div class='progress-bar' style='width:<?php echo $pageData->deptpend; ?>'></div>
            </div>
        </div>
    </div>
</div>
