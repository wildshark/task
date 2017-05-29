<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 28-May-17
 * Time: 8:27 PM
 */

?>

<ul class="nav nav-list">
    <li class="active">
        <a href="page.php?user=dashboard">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li class="">
        <a href="page.php?user=new_task">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> New Task </span>
        </a>

        <b class="arrow"></b>
    </li>

    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text">Task Schedule</span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="">
                <a href="page.php?user=all_task">
                    <i class="menu-icon fa fa-caret-right"></i>
                    All Task
                </a>
                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="page.php?user=achieved_task">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Achieved Task
                </a>
                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="page.php?user=pending_task">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Pending Task
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>

    <li class="">
        <a href="page.php?user=chat">
            <i class="menu-icon fa fa-list"></i>
            <span class="menu-text"> Chat </span>

            <b class="arrow"></b>
        </a>
    </li>

    <li class="">
        <a href="page.php?user=sms_alert">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> SMS Alert </span>

            <b class="arrow"></b>
        </a>
    </li>

    <li class="">
        <a href="page.php?user=profile">
            <i class="menu-icon fa fa-list-alt"></i>
            <span class="menu-text"> Profile </span>
        </a>

        <b class="arrow"></b>
    </li>
</ul>
