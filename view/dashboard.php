<?php include_once "header.php" ?>

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
        color: #ffffff !important;
        background-color: green !important;
    }
    .twitter:hover a {
        color: #ffffff !important;
        background-color: red !important;
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

      <!-- Content -->
      <div id='content'>

          <?php

          if(isset($success))
          {
              echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
          }

         /*
          if(isset($error))
          {
              echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
          }
          */

          if(isset($info))
          {
              echo '<div class="alert alert-info" role="alert">'.$info.'</div>';
          }


          ?>

        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-info-sign icon-large'></i>
           Welcome!
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='index'>
                  <i class='icon-refresh'></i>
                  Refresh
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
                  <i class='icon-chevron-down'></i>
                </a>
              </div>
            </div>
          </div>
          <div class='panel-body'>
            <div class='page-header'>
              <h4><a data-toggle="modal" data-target="#addAccount"><i style="color:green;" class="icon-plus"></i> Add New Account</a></h4>
            </div>

              <?php if(!isset($accounts))echo "<i style='color:#333333;'>No Accounts Found</i>"; ?>

              <?php
              foreach($accounts as $account)
              {
                  echo '<div class="row">
                  <div class="container">
                      <div class="row">
                          <div class="[ col-xs-12 col-sm-offset-2 col-sm-10 ]">
                              <ul class="event-list">
                                  <li>
                                      <time datetime="2014-07-20 0000">
                                          <span class="day">'.$account['currency'].'</span>

                                          <span class="month">'.$account['country'].'</span>
                                          <!--
                                          <span class="year">2014</span>
                                          <span class="time">12:00 AM</span>
                                          -->
                                      </time>
                                      <div class="info">
                                          <h2 class="title">'.$account['account_name'].'</h2>
                                          <p class="desc"><i>'.$account['account_number'].'</i></p>
                                          <ul>
                                              <li style="width:50%;"><a href="#website"<span class="icon-chevron-left"></span><span class="icon-chevron-left"></span> Last Balance: '.$account['currency'].' '.(($account['last_balance'] == 0) ? "0.00" : number_format(($account['last_balance']/100) , 2)).'</a></li>
                                              <li style="width:60%;"><span class="fa fa-money"></span> Current Balance: '.$account['currency'].' '.(($account['balance'] == 0) ? "0.00" : number_format(($account['balance']/100), 2) ).'</li>
                                          </ul>
                                      </div>
                                      <div class="social">
                                          <ul>
                                              <li class="facebook" style="width:33%;" data-toggle="tooltip" title="add a new transaction"><a href="#" data-toggle="modal" data-target="#addTransaction" onclick="assignAccountId('.$account['account_id'].')"><span class="icon-plus"></span></a></li>
                                              <li class="twitter" style="width:34%;" data-toggle="tooltip" title="remove account"><a href="index?remove='.$account['account_id'].'" onclick="return confirm(\'Are you sure, you want to delete this account and all its transactions?\nThis action cannot be undone\')"><span class="icon-minus"></span></a></li>
                                              <li class="google-plus" style="width:33%;" data-toggle="tooltip" title="show all transactions"><a href="transaction?show='.$account['account_id'].'"><span class="icon-list"></span></a></li>
                                          </ul>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>';
              }
              ?>

          </div>
        </div>
      </div>
    </div>


    <!-- Additional -->
    <!-- Modal -->
    <div class="modal fade" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create a new account</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="post" action="index">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Account Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="acc_name"  class="form-control" id="inputEmail3" placeholder="Account Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Account Number</label>
                            <div class="col-sm-6">
                                <input type="text" name="acc_number" class="form-control" id="inputEmail3" placeholder="Account Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="currency">
                                    <option value="GBP">United Kingdom (GBP)</option>
                                    <option value="USD">United States (USD)</option>
                                    <option value="EUR">Euro Zone (EUR)</option>
                                    <option value="HUF">Hungary (HUF)</option>
                                    <option value="PLN"> Poland (PLN)</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Starting Balance</label>
                            <div class="col-sm-6">
                                <input type="text" name="balance" class="form-control" id="inputEmail3" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<!-- new transaction -->
<div class="modal fade" id="addTransaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Create a new Transaction</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="transaction">
                    <input name="account" id="accountIdTrx" value="" type="hidden" />
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Transaction</label>
                        <div class="col-sm-6">
                            <input type="text" name="acc_name" class="form-control" id="inputEmail3" placeholder="Transaction Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Transaction Amount</label>
                        <div class="col-sm-6">
                            <input type="text" name="acc_number" class="form-control" id="inputEmail3" placeholder="Transaction Amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Transaction Type</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="types">
                                <option value="debit">DEBIT</option>
                                <option value="credit">CREDIT</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Transaction Date</label>
                        <div class="col-sm-6">
                            <input type="text" name="balance" class="form-control" id="datepicker" placeholder="2014-01-31">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-lg">Create Transaction</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Action Status</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <?php
                        if(isset($erroralert))echo $erroralert;
                        ?></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript">
    </script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <script src="view/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>

    <?php
    if(isset($erroralert))
    {
        ?>
        <script type="text/javascript">
            $(window).load(function(){
                $('#myModal').modal('show');
            });
        </script>
    <?php
    }
    ?>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<script>function assignAccountId(value) {
        document.getElementById('accountIdTrx').value = value;
    }</script>
  </body>
</html>
