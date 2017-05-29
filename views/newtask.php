<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-May-17
 * Time: 1:16 AM
 */

?>
<div class='col-sm-6'>
    <h3 class='header smaller lighter red'>New Task</h3>
    <form action='module/new_task.php' method='get' class='form-horizontal' role='form' enctype='application/x-www-form-urlencoded'>

        <div class='form-group'>
            <label  class='col-xs-2 control-label no-padding-right' for='id-date-picker-1'>Date</label>
            <div class='col-xs-8 col-sm-7'>
                <div class='input-group'>
                    <input name='date' class='form-control date-picker' id='id-date-picker-1' type='text' data-date-format='dd-mm-yyyy' placeholder='dd-mm-yyyy' />
                    <span class='input-group-addon'>
								    <i class='fa fa-calendar bigger-110'></i>
								</span>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <label  class='col-sm-2 control-label no-padding-right' for='form-field-1'> Task Subject</label>

            <div class='col-sm-8'>
                <input name='task_subject' type='text' id='form-field-1' placeholder='Task Subject' class='col-xs-10 col-sm-10' />
            </div>
        </div>

        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Assigned to</label>

            <div class='col-sm-8'>
                <input name='assign_to' type='text' id='form-field-select-1' class='col-xs-10 col-sm-10' placeholder='Assigned to'>
            </div>
        </div>


        <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Priority</label>

            <div class='col-sm-8'>
                <select name='priority' type='text' id='form-field-select-1' class='col-xs-10 col-sm-10'>
                    <option value='1'>High</option>
                    <option value='2'>Medium</option>
                    <option value='3'>Low</option>
                </select>
            </div>
        </div>

        <div class='form-group'>
            <label  class='col-xs-2 control-label no-padding-right' for='id-date-picker-1'>Due Date</label>
            <div class='col-xs-8 col-sm-7'>
                <div class='input-group'>
                    <input name='due_date' class='form-control date-picker' id='id-date-picker-1' type='text' data-date-format='dd-mm-yyyy' placeholder='dd-mm-yyyy' />
                    <span class='input-group-addon'>
					    <i class='fa fa-calendar bigger-110'></i>
                    </span>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <label  class='col-sm-2 control-label no-padding-right' for='form-field-1'>Note</label>
            <div class='col-sm-8'>
                <textarea name='note'  type='text' id='form-field-8' class='col-xs-10 col-sm-10' placeholder='Task'></textarea>
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

    <div class='well well-lg'>
        <h4 class='blue'>Large Well</h4>
        Control padding and rounded corners with two optional modifier classes.
    </div>
    <div class='well well-sm'> This is a small well </div>
</div>
