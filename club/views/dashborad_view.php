<?php 
    $dashboard_data = $obj->get_dashboard_data($_REQUEST);

?>
<style>
    .mydiv{
        width: 200px;
        position: absolute;
        right: 38px;
        overflow: hidden;
    }
</style>
<h2><?php echo $obj->__('dashboard',$_SESSION['auth']['default_lang']); ?></h2>


<div class="mydiv">
<form action="" class="form">
    <select name="filterDate" id="filterDate" class="form-control" onchange="window.location.href=this.value">
        <option value="<?php echo '?filter_by=A'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='A')) echo 'selected'  ?>><?php echo $obj->__('all',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=T'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='T')) echo 'selected'  ?>><?php echo $obj->__('today',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=W'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='W')) echo 'selected'  ?>><?php echo $obj->__('this_week',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=M'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='M')) echo 'selected'  ?>><?php echo $obj->__('this_month',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=Y'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='Y')) echo 'selected'  ?>><?php echo $obj->__('this_year',$_SESSION['auth']['default_lang']); ?></option>
    </select>
</form>
</div>




<br> <br> <br>
<div class="row">



<!-- order-card start -->

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-blue order-card">
        <div class="card-block">
            <h6 class="m-b-20"><?php echo $obj->__('orders',$_SESSION['auth']['default_lang']); ?></h6>
            <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span id="totalOrders"><?php echo $dashboard_data['total_orders'] ?></span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20"><?php echo $obj->__('tournaments',$_SESSION['auth']['default_lang']); ?></h6>
            <h2 class="text-right"><i class="ti-wallet f-left"></i><span id="tournaments"><?php echo $dashboard_data['total_tournaments'] ?></span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-green order-card">
        <div class="card-block">
            <h6 class="m-b-20"><?php echo $obj->__('members',$_SESSION['auth']['default_lang']); ?></h6>
            <h2 class="text-right"><i class="ti-tag f-left"></i><span id="totalMembers">2000</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20"><?php echo $obj->__('bookings',$_SESSION['auth']['default_lang']); ?></h6>
            <h2 class="text-right"><i class="ti-wallet f-left"></i><span id="totalBookings"><?php echo $dashboard_data['total_bookings'] ?></span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-yellow order-card">
        <div class="card-block">
            <h6 class="m-b-20"><?php echo $obj->__('points',$_SESSION['auth']['default_lang']); ?></h6>
            <h2 class="text-right"><i class="ti-reload f-left"></i><span id="totalPoints">30000</span></h2>
            <p class="m-b-0"><span class="f-right"></span></p>
        </div>
    </div>
</div>


<!-- order-card end -->


<!-- users visite and profile start -->

<!-- users visite and profile end -->

</div>
</div>

