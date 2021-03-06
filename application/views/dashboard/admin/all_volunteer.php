    <div class="row">

<!--Flash Data Warning Data Complete-->
  <div class="col-md-12">
    <?php if($this->session->flashdata('errormsg')){ ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="fa fa-ban"></i> Warning</h4>
      <?php echo $this->session->flashdata('errormsg') ;?>
    </div>
    <?php } ?>
  </div>
<!--End of Flash Data Warning Data Complete-->

<!--Flash Data Success or Failed-->
  <div class="col-md-12">
  <?php
    $this->load->helper('form');
    $error = $this->session->flashdata('error');
    if($error)
    {
  ?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo $this->session->flashdata('error'); ?>                    
   </div>
  <?php } ?>
  <?php  
    $success = $this->session->flashdata('success');
    if($success)
    {
  ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo $this->session->flashdata('success'); ?>
  </div>
  <?php } ?>
    
  <div class="row">
    <div class="col-md-12">
      <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
    </div>
  </div>
</div>
<!--Flash Data Success or Failed-->

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Volunteer Data</h3>

                    <button type="button" class="btn btn-info pull-right text-right" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-plus"></i> &nbsp;Add Data</button>
                </div>

                <!--Add staff-->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Data</h4>
                            </div>

                            <div class="modal-body">
                                <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url('/Team/add_volunteer') ;?>">
                                
                                <div class="form-group">
                                    <label for="input_name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="input_name" placeholder="Full Name" required>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="input_address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="address" class="form-control" id="input_address" placeholder="Address" required>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="input_dob" class="col-sm-2 control-label">DOB</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="dob" placeholder="dd-mm-yyy" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input_email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="input_email" placeholder="mail@mail.com" required>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="input_cp" class="col-sm-2 control-label">Phone</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="cp" class="form-control" id="input_cp" placeholder="+62xxxxxxxxxxx" required>
                                        </div>
                                </div>                                

<!--                                 <div class="form-group">
                                    <label for="input_event" class="col-sm-2 control-label">Event</label>
                                    <div class="col-sm-10">
                                        <select name="id_event" class="form-control required">
                                        <option value="" disabled selected><i>Choose Event</i></option>
                                        <?php foreach ($events as $event) { ?>
                                        <option value="<?php echo $events->event ?>"><?php echo $events->event ?> </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>  -->                               
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name ="submit" class="btn btn-primary" value="Add">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Add Staff-->

                <div class="box-body">
                    <table class="table table-bordered table-striped table-data">
                     <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Contact Person</th>
                            <th>Status</th>                        
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($result as $volunteer){
                            if($volunteer->name){$i++; ?>                
                        <tr>
                            <td><center><?php echo $i ?> </center></td>
                            <td><?php echo $volunteer->name ;?></td>
                            <td><?php echo $volunteer->cp ;?></td>
                            <td>
                                <?php 
                                if($volunteer->status == 'active') echo '<span class="label label-success">Active</span>';
                                else echo '<span class="label label-danger">Inactive</span>';
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('/Team/profile_volunteer/'.$volunteer->id_volunteer) ;?>" class="btn btn-sm btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
                                <a class="btn btn-sm btn-success btn-xs" data-toggle="modal" data-target="#modal-<?php echo $volunteer->id_volunteer?>"><i class="fa fa-pencil"></i> Edit</a>
                                <?php if($volunteer->status == 'active'){ ?>
                                    <a href="<?php echo base_url('Team/status_volunteer/inactive/'.$volunteer->id_volunteer) ;?>" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Deactivate</a>
                                    <?php }else{ ?>
                                    <a href="<?php echo base_url('Team/status_volunteer/active/'.$volunteer->id_volunteer) ;?>" class="btn btn-sm btn-success btn-xs"><i class="fa fa-check"></i> Activate</a>
                                <?php } ?>                            
                            </td>
                        </tr>
                        <!--Edit Data Team -->
                        <div class="modal fade" id="modal-<?php echo $volunteer->id_volunteer?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                            
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Data</h4>
                            </div>

                            <div class="modal-body">
                              <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Team/edit_volunteer"?>">
                        
                              <div class="form-group" style="padding:15px 0">
                                <label for="input_name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" name="name" class="form-control" id="input_name" value="<?php echo $volunteer->name ?>" required>
                                  <input type="hidden" name="id_volunteer" class="form-control" id="input_name" value="<?php echo $volunteer->id_volunteer ?>" required>
                                </div>    
                              </div>

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_address" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                  <input type="text" name="address" class="form-control" id="input_address" value="<?php echo $volunteer->address ?>" required>
                                </div>    
                              </div>      

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_dob" class="col-sm-2 control-label">DOB</label>
                                <div class="col-sm-10">
                                  <input type="date" name="dob" class="form-control" id="input_dob" value="<?php echo $volunteer->dob ?>" required>
                                </div>    
                              </div>                         

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="text" name="email" class="form-control" id="input_email" value="<?php echo $volunteer->email ?>" required>
                                </div>    
                              </div>

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_cp" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                  <input type="text" name="cp" class="form-control" id="input_cp" value="<?php echo $volunteer->cp ?>" required>
                                </div>    
                              </div>      
                                                                                   
<!--                               <div class="form-group" style="padding:15px 0">
                                <label for="input_program" class="col-sm-2 control-label">Event</label>
                                <div class="col-sm-10">
                                  <select class="form-control" data-placeholder="Select Event" style="width: 100%;" name="id_event" required>
                                  <?php foreach($event as $events){ ?>
                                  <option <?php if ($events->id_event == $volunteer->id_event){echo "selected";} ?> value="<?php echo $events->id_event ?>"><?php echo $events->event?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div> -->

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name ="submit" class="btn btn-primary" value="Save">
                              </div>
                                                        
                              </form>
                            </div>
                          </div>
                          </div>
                        </div>
<!--End of Edit Data Team -->       
                        <?php }}?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>