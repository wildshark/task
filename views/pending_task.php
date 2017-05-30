<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-May-17
 * Time: 2:49 AM
 */

?>
<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><?php echo $pageTitle; ?></h3>

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Results for "Latest Registered Domains"
        </div>

        <!-- div.table-responsive -->

        <!-- div.dataTables_borderWrap -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>Date</th>
                    <th>Assign To</th>
                    <th class="hidden-480">Subject</th>

                    <th>
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        Due Date
                    </th>
                    <th class="hidden-480">Priority</th>

                    <th></th>
                </tr>
                </thead>

                <tbody>

                <?php

                $userID=$_SESSION['userID'];
                $sql="SELECT * FROM user_task WHERE statusID='1' AND userID='$userID' ORDER BY taskDate DESC";
                $result=$conn->query($sql);
                while ($row=$result->fetch_assoc()){
                    if ($row['Priority']==1){
                        $warning="label label-sm label-warning";
                        $Priority="High";
                    }elseif ($row['Priority']==2){
                        $warning="label label-sm label-inverse arrowed-in";
                        $Priority="Medium";
                    }else{
                        $warning="label label-sm label-success";
                        $Priority="Low";
                    }

                    echo " <tr>
                    <td class='center'>
                        <label class='pos-rel'>
                            <input type='checkbox' class='ace' />
                            <span class='lbl'></span>
                        </label>
                    </td>

                    <td>
                        <a href='#'>".$row['taskDate']."</a>
                    </td>
                    <td>".$row['Assign_to']."</td>
                    <td class='hidden-480'>".$row['Subject']."</td>
                    <td>".$row['DueDate']."</td>

                    <td class='hidden-480'>
                        <span class='".$warning."'>".$Priority."</span>
                    </td>

                    <td>
                        <div class='hidden-sm hidden-xs action-buttons'>
                            <a class='blue' href='#'>
                                <i class='ace-icon fa fa-search-plus bigger-130'></i>
                            </a>

                            <a class='green' href='#'>
                                <i class='ace-icon fa fa-pencil bigger-130'></i>
                            </a>

                            <a class='red' href='#'>
                                <i class='ace-icon fa fa-trash-o bigger-130'></i>
                            </a>
                        </div>

                        <div class='hidden-md hidden-lg'>
                            <div class='inline pos-rel'>
                                <button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown' data-position='auto'>
                                    <i class='ace-icon fa fa-caret-down icon-only bigger-120'></i>
                                </button>

                                <ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>
                                    <li>
                                        <a href='#' class='tooltip-info' data-rel='tooltip' title='View'>
																				<span class='blue'>
																					<i class='ace-icon fa fa-search-plus bigger-120'></i>
																				</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href='#' class='tooltip-success' data-rel='tooltip' title='Edit'>
																				<span class='green'>
																					<i class='ace-icon fa fa-pencil-square-o bigger-120'></i>
																				</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href='#' class='tooltip-error' data-rel='tooltip' title='Delete'>
																				<span class='red'>
																					<i class='ace-icon fa fa-trash-o bigger-120'></i>
																				</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>";
                }
                ?>



                </tbody>
            </table>
        </div>
    </div>
</div>

