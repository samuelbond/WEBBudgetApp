<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Dashboard</title>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="/view/assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/view/assets/images/favicon.ico" rel="icon" type="image/ico" />
    <style>
        @import url("http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic");
        @import url("//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");


        .event-list {
            list-style: none;
            font-family: 'Lato', sans-serif;
            margin: 0px;
            padding: 0px;
        }
        .event-list > li {
            background-color: rgb(255, 255, 255);
            box-shadow: 0px 0px 5px rgb(51, 51, 51);
            box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
            padding: 0px;
            margin: 0px 0px 20px;
        }
        .event-list > li > time {
            display: inline-block;
            width: 100%;
            color: rgb(255, 255, 255);
            background-color: rgb(197, 44, 102);
            padding: 5px;
            text-align: center;
            text-transform: uppercase;
        }
        .event-list > li:nth-child(even) > time {
            background-color: rgb(165, 82, 167);
        }
        .event-list > li > time > span {
            display: none;
        }
        .event-list > li > time > .day {
            display: block;
            font-size: 56pt;
            font-weight: 100;
            line-height: 1;
        }
        .event-list > li time > .month {
            display: block;
            font-size: 24pt;
            font-weight: 900;
            line-height: 1;
        }
        .event-list > li > img {
            width: 100%;
        }
        .event-list > li > .info {
            padding-top: 5px;
            text-align: center;
        }
        .event-list > li > .info > .title {
            font-size: 17pt;
            font-weight: 700;
            margin: 0px;
        }
        .event-list > li > .info > .desc {
            font-size: 13pt;
            font-weight: 300;
            margin: 0px;
        }
        .event-list > li > .info > ul,
        .event-list > li > .social > ul {
            display: table;
            list-style: none;
            margin: 10px 0px 0px;
            padding: 0px;
            width: 100%;
            text-align: center;
        }
        .event-list > li > .social > ul {
            margin: 0px;
        }
        .event-list > li > .info > ul > li,
        .event-list > li > .social > ul > li {
            display: table-cell;
            cursor: pointer;
            color: rgb(30, 30, 30);
            font-size: 11pt;
            font-weight: 300;
            padding: 3px 0px;
        }
        .event-list > li > .info > ul > li > a {
            display: block;
            width: 100%;
            color: rgb(30, 30, 30);
            text-decoration: none;
        }
        .event-list > li > .social > ul > li {
            padding: 0px;
        }
        .event-list > li > .social > ul > li > a {
            padding: 3px 0px;
        }
        .event-list > li > .info > ul > li:hover,
        .event-list > li > .social > ul > li:hover {
            color: rgb(30, 30, 30);
            background-color: rgb(200, 200, 200);
        }
        .facebook a,
        .twitter a,
        .google-plus a {
            display: block;
            width: 100%;
            color: green !important;
        }
        .twitter a {
            color: red !important;
        }
        .google-plus a {
            color: rgb(221, 75, 57) !important;
        }
        .facebook:hover a {
            color: rgb(255, 255, 255) !important;
            background-color: rgb(75, 110, 168) !important;
        }
        .twitter:hover a {
            color: rgb(255, 255, 255) !important;
            background-color: rgb(79, 213, 248) !important;
        }
        .google-plus:hover a {
            color: rgb(255, 255, 255) !important;
            background-color: rgb(221, 75, 57) !important;
        }

        @media (min-width: 768px) {
            .event-list > li {
                position: relative;
                display: block;
                width: 100%;
                height: 120px;
                padding: 0px;
            }
            .event-list > li > time,
            .event-list > li > img  {
                display: inline-block;
            }
            .event-list > li > time,
            .event-list > li > img {
                width: 300px;
                float: left;
            }
            .event-list > li > .info {
                background-color: rgb(245, 245, 245);
                overflow: hidden;
            }
            .event-list > li > time,
            .event-list > li > img {
                width: 200px;
                height: 120px;
                padding: 0px;
                margin: 0px;
            }
            .event-list > li > .info {
                position: relative;
                height: 120px;
                text-align: left;
                padding-right: 40px;
            }
            .event-list > li > .info > .title,
            .event-list > li > .info > .desc {
                padding: 0px 10px;
            }
            .event-list > li > .info > ul {
                position: absolute;
                left: 0px;
                bottom: 0px;
            }
            .event-list > li > .social {
                position: absolute;
                top: 0px;
                right: 0px;
                display: block;
                width: 40px;
            }
            .event-list > li > .social > ul {
                border-left: 1px solid rgb(230, 230, 230);
            }
            .event-list > li > .social > ul > li {
                display: block;
                padding: 0px;
            }
            .event-list > li > .social > ul > li > a {
                display: block;
                width: 40px;
                padding: 10px 0px 9px;
            }
    </style>
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='#'>
          <img src="/view/images/logo.png" />
      </a>
      <ul class='nav navbar-nav pull-right'>
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
            <a href="/view/dashboard.html">Dashboard</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="/view/forms.htmlFramework/view/forms.html">Forms</a>
          </li>
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
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-info-sign icon-large'></i>
           Welcome!
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                  Refresh statics
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
                  <i class='icon-chevron-down'></i>
                </a>
              </div>
            </div>
          </div>
          <div class='panel-body'>
            <div class='page-header'>
              <h4><a><i style="color:green;" class="icon-plus"></i> Add New Account</a></h4>
            </div>
            <div class='row'>
                  <div class="container">
                      <div class="row">
                          <div class="[ col-xs-12 col-sm-offset-2 col-sm-10 ]">
                              <ul class="event-list">
                                  <li>
                                      <time datetime="2014-07-20 0000">
                                          <span class="day">GBP</span>

                                          <span class="month">UK</span>
                                          <!--
                                          <span class="year">2014</span>
                                          <span class="time">12:00 AM</span>
                                          -->
                                      </time>
                                      <div class="info">
                                          <h2 class="title">Samuel Personal</h2>
                                          <p class="desc"><i>30056788</i></p>
                                          <ul>
                                              <li style="width:50%;"><a href="#website"<span class="icon-chevron-left"></span><span class="icon-chevron-left"></span> Last Balance: £300.00</a></li>
                                              <li style="width:60%;"><span class="fa fa-money"></span> Current Balance: £100.00</li>
                                          </ul>
                                      </div>
                                      <div class="social">
                                          <ul>
                                              <li class="facebook" style="width:33%;" data-toggle='tooltip' title='add a new transaction'><a href="#facebook"><span class="icon-plus"></span></a></li>
                                              <li class="twitter" style="width:34%;" data-toggle='tooltip' title='remove account'><a href="#twitter"><span class="icon-minus"></span></a></li>
                                              <li class="google-plus" style="width:33%;" data-toggle='tooltip' title='show all transactions'><a href="#google-plus"><span class="icon-list"></span></a></li>
                                          </ul>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript">
    </script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <script src="/view/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>
