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
                    <h3 class="box-title">Sponsor Data</h3>

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
                                <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url('/Partner/add_sponsor') ;?>">
                                
                                <div class="form-group">
                                    <label for="input_name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="input_name" placeholder="Sponsor Name" required>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="input_address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="address" class="form-control" id="input_address" placeholder="Address" required>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="input_dob" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="cp" placeholder="Sponsor Contact Person" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input_email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="input_email" placeholder="mail@mail.com" required>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="input_sponsor" class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="desc" class="form-control" id="input_sponsor" placeholder="Sponsor Description" required>
                                        </div>
                                </div>                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name ="submit" class="btn btn-primary" value="Add">
                            </div>
                            </form>
                        </div>
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
                            <th>Address</th>
                            <th>Email</th>                        
                            <th>CP</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($result as $sponsor){
                            if($sponsor->name){$i++; ?>                
                        <tr>
                            <td><center><?php echo $i ?> </center></td>
                            <td><?php echo $sponsor->name ;?></td>           
                            <td><?php echo $sponsor->address ;?></td>           
                            <td><?php echo $sponsor->email ;?></td>           
                            <td><?php echo $sponsor->cp ;?></td>           
                            <td><?php echo $sponsor->desc ;?></td>                                         
                            <td>
                                <a class="btn btn-sm btn-success btn-xs" data-toggle="modal" data-target="#modal-<?php echo $sponsor->id_sponsor?>"><i class="fa fa-pencil"></i> Edit</a> 
                            </td>
                        </tr>
                        <!--Edit Data Partner -->
                        <div class="modal fade" id="modal-<?php echo $sponsor->id_sponsor?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                            
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Data</h4>
                            </div>

                            <div class="modal-body">
                              <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Partner/edit_sponsor"?>">
                        
                              <div class="form-group" style="padding:15px 0">
                                <label for="input_name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" name="name" class="form-control" id="input_name" value="<?php echo $sponsor->name ?>" required>
                                  <input type="hidden" name="id_sponsor" class="form-control" id="input_name" value="<?php echo $sponsor->id_sponsor ?>" required>
                                </div>    
                              </div>

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_address" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                  <input type="text" name="address" class="form-control" id="input_address" value="<?php echo $sponsor->address ?>" required>
                                </div>    
                              </div>      

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="text" name="email" class="form-control" id="input_email" value="<?php echo $sponsor->email ?>" required>
                                </div>    
                              </div>                         

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_cp" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                  <input type="text" name="cp" class="form-control" id="input_cp" value="<?php echo $sponsor->cp ?>" required>
                                </div>    
                              </div>      

                              <div class="form-group" style="padding:15px 0">
                                <label for="input_dob" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                  <input type="text" name="desc" class="form-control" id="input_desc" value="<?php echo $sponsor->desc ?>" required>
                                </div>    
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name ="submit" class="btn btn-primary" value="Save">
                              </div>
                                                        
                              </form>
                            </div>
                          </div>
                          </div>
                        </div>
<!--End of Edit Data Partner -->       
                        <?php }}?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>