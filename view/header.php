<!DOCTYPE html>
<html class='no-js' lang='en'>
<head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Budget</title>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="view/assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="view/assets/images/favicon.ico" rel="icon" type="image/ico" />

</head>
<body class='main page'>
<!-- Navbar -->
<div class='navbar navbar-default' id='navbar'>
    <a class='navbar-brand' href='#'>
        <img src="view/images/logo.png" />
    </a>
    <ul class='nav navbar-nav pull-right'>
        <!--
      <li class='dropdown'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
          <i class='icon-envelope'></i>
          Messages
          <span class='badge'>5</span>
          <b class='caret'></b>
        </a>
        <ul class='dropdown-menu'>
          <li>
            <a href='#'>New message</a>
          </li>
          <li>
            <a href='#'>Inbox</a>
          </li>
          <li>
            <a href='#'>Outbox</a>
          </li>
          <li>
            <a href='#'>Trash</a>
          </li>
        </ul>
      </li>
      -->
        <li>
            <a href='#'>
                <i class='icon-cog'></i>
                Settings
            </a>
        </li>
        <li class='dropdown user'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                <i class='icon-user'></i>
                <strong>
                    <?php
                    echo ((isset($fullname)) ? $fullname : "");
                    ?>
                </strong>
                <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
                <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
                <li>
                    <a href='#'>Edit Profile</a>
                </li>
                <li class='divider'></li>
                <li>
                    <a href="index?logout=true">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div id='wrapper'>
    <!-- Sidebar -->
    <section id='sidebar'>
        <i class='icon-align-justify icon-large' id='toggle'></i>
        <ul id='dock'>
            <li class='active launcher'>
                <i class='icon-dashboard'></i>
                <a href="index">Dashboard</a>
            </li>
            <li class='launcher'>
                <i class='icon-table'></i>
                <a href="transaction">Transactions</a>
            </li>
            <!--
            <li class='launcher'>
                <i class='icon-table'></i>
                <a href="/view/tables.htmlramework/view/tables.html">Tables</a>
            </li>
            <li class='launcher dropdown hover'>
                <i class='icon-flag'></i>
                <a href='#'>Reports</a>
                <ul class='dropdown-menu'>
                    <li class='dropdown-header'>Launcher description</li>
                    <li>
                        <a href='#'>Action</a>
                    </li>
                    <li>
                        <a href='#'>Another action</a>
                    </li>
                    <li>
                        <a href='#'>Something else here</a>
                    </li>
                </ul>
            </li>
            <li class='launcher'>
                <i class='icon-bookmark'></i>
                <a href='#'>Bookmarks</a>
            </li>
            <li class='launcher'>
                <i class='icon-cloud'></i>
                <a href='#'>Backup</a>
            </li>
            <li class='launcher'>
                <i class='icon-bug'></i>
                <a href='#'>Feedback</a>
            </li>
            -->
        </ul>

    </section>
    <!-- Tools -->
    <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
            <li class='title'>Dashboard</li>
        </ul>
        <div id='toolbar'>
            <div class='btn-group'>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Building'>
                    <i class='icon-building'></i>
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Laptop'>
                    <i class='icon-laptop'></i>
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Calendar'>
                    <i class='icon-calendar'></i>
                    <span class='badge'>3</span>
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Lemon'>
                    <i class='icon-lemon'></i>
                </a>
            </div>
            <div class='label label-danger'>
                Danger
            </div>
            <div class='label label-info'>
                Info
            </div>
        </div>
    </section>