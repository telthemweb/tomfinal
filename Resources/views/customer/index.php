<div class="container">
   <h1>My Account</h1>
   <div class="row my-4">
      <div class="col-md-4">
         <div class="card">
            <div class="card-header">
               Account Balance <b class="float-right"><i class="fa fa-wallet"></i></b>
            </div>
            <div class="card-body">
               <h2>$ <?php echo format_num($countAccount);?></h2>
            </div>
         </div>
      </div>
      <!-- <div class="col-md-4">
         <div class="card">
            <div class="card-header">
               My Last Transaction Amount <b class="float-right"><i class="fa fa-tasks"></i></b>
            </div>
            <div class="card-body">
               <h2>$ <?php // echo $lastTransaction->amount==null?0:$lastTransaction->amount;?></h2>
            </div>
         </div>
      </div> -->
      <div class="col-md-4">
         <div class="card bg-danger text-white">
            <div class="card-header bg-danger text-white">
              Fraud Alerts <b class="float-right"><i class="fa fa-credit-card"></i></b>
            </div>
            <div class="card-body">
               <h2><?php echo $alertscount; ?> <b class="float-right"><i class="fa fa-bug" style="font-size: 32;"></i></b></h2>
            </div>
         </div>
      </div>
   </div>
   <div class="row my-4">
      <div class="col-md-12">
       <div class="row justify-content-center">
         <div class="col-md-9">
          <div class="card">
            <div class="card-header">My Report For my Transactions</div>
            <div class="card-body">
            <canvas id="myChart"></canvas>
            </div>
          </div>
         </div>
       </div>
      </div>
   </div>
</div>