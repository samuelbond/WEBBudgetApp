<?php include_once "header.php" ?>

<!-- Content -->
<div id='content'>
<div class='panel panel-default grid'>
<div class='panel-heading'>
    <i class='icon-table icon-large'></i>
    Transactions
    <div class='panel-tools'>
        <div class='btn-group'>
            <a class='btn' href='#'>
                <i class='icon-wrench'></i>
                Settings
            </a>
            <a class='btn' href='#'>
                <i class='icon-filter'></i>
                Filters
            </a>
            <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Reload'>
                <i class='icon-refresh'></i>
            </a>
        </div>
        <div class='badge'><?php if(isset($transactions))echo count($transactions)." Transaction(s)"; else echo "0 Transactions"; ?></div>
    </div>
</div>
<div class='panel-body filters'>
    <div class='row'>
        <div class='col-md-9'>
            <?php
            if(isset($success))
            {
                echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                    </button>'.$success.'</div>';
            }

            if(isset($error))
            {
                echo '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                    </button>
                        '.$error.'</div>';
            }

            if(isset($info))
            {
                echo '<div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                    </button>
                    '.$info.'</div>';
            }

            ?>
        </div>
        <?php

        if(isset($transactions)) {

        ?>

        <div class='col-md-3'>
            <div class='pull-right'>
      <span style="color:#0088CC;">
                    <b>Last Balance : <?php if(isset($lastBalance)) echo $currency." ".$lastBalance; else echo "0.00"; ?></b>
                </span>
            </div>
        </div>


    </div>
</div>



 <table class='table'>
    <thead>
    <tr>
        <th>Transaction Id</th>
        <th>Transaction Name</th>
        <th>Amount</th>
        <th>Transaction Date</th>
        <th>group</th>
        <th>Type</th>
        <th class='actions'>

        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($transactions as $transaction) {
        echo
            '<tr class="' . (($transaction['transaction_category'] == 'CREDIT') ? 'success' : 'danger') . '">
        <td><b><i>' . $transaction['transaction_id'] . '</i></b></td>
        <td><b>' . $transaction['transaction_name'] . '</b></td>
        <td><b>' . $currency . number_format(($transaction['transaction_amount'] / 100), 2) . '</b></td>
        <td><b>' . $transaction['transaction_date'] . '</b></td>
        <td><b>' . $transaction['transaction_type'] . '</b></td>
        <td><b>' . $transaction['transaction_category'] . '</b></td>
        <td class="action">
            <a class="btn btn-danger" href="#">
                <i class="icon-trash">
                </i>
            </a>
        </td>
        </tr>';
    }


    ?>


    </tbody>
</table>

<div class='panel-footer'>
    <ul class='pagination pagination-sm'>
        <?php if($currentPage > 1){ ?>
        <li>
            <a href='transaction?show=<?php echo $accountId."&page=".($currentPage - 1)?>'>«</a>
        </li>
        <?php }?>
        <?php

        for($i = 1; $i < $totalPages; $i++)
        {
            echo '
                <li class="'.(($currentPage == $i) ? 'active' : '').'">
                    <a href="transaction?show='.$accountId.'&page='.$i.'">'.$i.'</a>
                </li>';
        }

        ?>
        <?php if($currentPage < $totalPages){ ?>
        <li>
            <a href='transaction?show=<?php echo $accountId."&page=".($currentPage + 1)?>'>»</a>
        </li>
        <?php }?>
    </ul>
    <div class='pull-right'>
      <span style="<?php if(isset($currentBalance) && $currentBalance < 0) echo "color:red;"; else echo "color:green;"; ?>">
                    <i><b>Current Balance : <?php if(isset($currentBalance)) echo $currency." ".$currentBalance; else echo "0.00"; ?></b></i>
                </span>
    </div>
</div>
     <?php
     }
    ?>
</div>


</div>
</div>
<!-- Footer -->
<!-- Javascripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript">

</script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
<script src="view/assets/javascripts/application-985b892b.js" type="text/javascript"></script>

<!-- Google Analytics -->
<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>
