<li>
  <a href="<?php echo base_url('/admin') ;?>">
  <i class="fa fa-dashboard"></i><span>&nbsp; Dashboard</span>
  </a>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-users fa-fw"></i>
    <span>&nbsp;Team</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-down pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo base_url('Team/all_st')?>">
        <i class="fa fa-circle"></i>&nbsp;Supporting Team
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('Team/all_intern')?>">
        <i class="fa fa-circle"></i>&nbsp;Internship
      </a>
    </li>
<!--     <li>
      <a href="<?php echo base_url('Team/all_volunteer')?>">
        <i class="fa fa-circle"></i>&nbsp;Volunteer
      </a>
    </li> -->
  </ul>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-smile-o fa-fw"></i>
    <span>&nbsp;Partner</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-down pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo base_url('Partner/all_influencer')?>">
        <i class="fa fa-circle"></i>&nbsp;Influencer
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('Partner/all_mentor')?>">
        <i class="fa fa-circle"></i>&nbsp;Mentor
      </a>
    </li>    
    <li>
      <a href="<?php echo base_url('Partner/all_medpart')?>">
        <i class="fa fa-circle"></i>&nbsp;Media
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('Partner/all_sponsor')?>">
        <i class="fa fa-circle"></i>&nbsp;Sponsor 
      </a>
    </li>    
  </ul>
</li>
<li>
  <a href="<?php echo base_url('Event')?>">
  <i class="fa fa-calendar fa-fw"></i><span>&nbsp;Event</span>
  </a>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-gittip fa-fw"></i>
    <span>&nbsp;Setting</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-down pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo base_url('Batch')?>">
        <i class="fa fa-circle"></i>&nbsp;Batch
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('Division')?>">
        <i class="fa fa-circle"></i>&nbsp;Division 
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('Region')?>">
        <i class="fa fa-circle"></i><span>&nbsp;Region
      </a>
    </li>    
  </ul>
</li>