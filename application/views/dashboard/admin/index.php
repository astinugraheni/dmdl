<div class="row">
  <div class="col-xs-12">

  <div class="row">
  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo sizeof($intern) ;?></h3>

        <p>Intern Contributed</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-cog"></i>
      </div>
      <a href="<?php echo base_url('Team/all_intern')?>">
      <a href="#"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
    </div>
 </div>

    <!-- small box -->
    <div class="col-lg-3 col-xs-12">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo sizeof($volunteer) ;?></h3>

        <p>Volunteer Joined</p>
      </div>
      <div class="icon">
        <i class="ion ion-happy"></i>
      </div>
      <a href="<?php echo base_url('Team/all_volunteer')?>">
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
	</div>

    <!-- small box -->
    <div class="col-lg-3 col-xs-12">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo sizeof($region) ;?></h3>
        <p>Active Region</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-home"></i>
      </div>
      <a href="<?php echo base_url('Region')?>">
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  	</div>
  	
  </div>