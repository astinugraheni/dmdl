<div class="row">
    <div class="col-xs-12">

<!--Flash Data Edit-->
        <div class="row">
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
      </div>
<!-- End of Flash Data Edit-->

<!-- Add Data -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Region Data</h3>

                <button type="button" class="btn btn-info pull-right text-right" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-plus"></i>&nbsp; Add Region</button>
            </div>
            
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Region Data</h4>
                        </div>

                        <div class="modal-body">
                            <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Region/add_region" ?>">
                            
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="region" class="form-control" id="input_name" placeholder="Region Name" required>
                                    </div>    
                            </div>
                            <div class="form-group">
                                <label for="input_desc" class="col-sm-2 control-label">Desc</label>
                                    <div class="col-sm-10">
                                    <textarea name="desc" class="form-control" id="input_desc" placeholder="Region Description" required></textarea>
                                    </div>
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
<!-- End of Add Data-->

<!-- Data Table-->     
                <div class="box-body">                    
                    <table class="table table-bordered table-striped table-data">
                        <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Name</center></th>
                            <th><center>Description</center></th>
                            <th><center>Status</center></th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            <?php $i=0; foreach($result as $region){
                                if($region->region){$i++; ?>                
                            <tr>
                                <td><?php echo $i ?> </td>
                                <td><?php echo $region-> region?> </td>
                                <td><?php echo $region-> desc;?></td>
                                <td>
                                    <?php 
                                    if($region->status == 'active') echo '<span class="label label-success">Active</span>';
                                    else echo '<span class="label label-danger">Not Active</span>';
                                    ?>
                                </td>
                                <td>
                                    <center>
                                    <a class="btn btn-sm btn-success btn-xs" data-toggle="modal" data-target="#modal-<?php echo $region->id_region?>"><i class="fa fa-pencil"></i> Edit</a>
                                    </center>
                                </td> 
                            </tr>

<!-- Edit Data-->
                            <div class="modal fade" id="modal-<?php echo $region->id_region?>">
                                <div class="modal-dialog">
                            
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Region Data</h4>
                                    </div>

                                    <div class="modal-body">
                                    <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Region/edit_region" ?>">
                            
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="region" class="form-control" id="input_name" value="<?php echo $region->region ?>" required>
                                            <input type="hidden" name="id_region" class="form-control" id="input_name" value="<?php echo $region->id_region ?>" required>
                                            </div>    
                                        </div>
                            
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_desc" class="col-sm-2 control-label">Desc</label>
                                            <div class="col-sm-10">
                                            <textarea name="desc" class="form-control" id="input_desc" required><?php echo $region->desc;?></textarea>
                                            </div>    
                                        </div>
                            
                                        <div class="form-group" style="padding:50px 0">
                                            <label for="input_cp" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="status" id="input_status" required>
                                                <option value="" disabled selected>Choose Status</option>
                                                <option value="active" <?php if($region->status == "active") {echo "selected=selected";} ?> >Active</option>
                                                <option value="inactive"  <?php if($region->status == "inactive") {echo "selected=selected";} ?> >Inactive</option>
                                            </select>
                                            </div>    
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
 <!-- End of Edit-->

                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
            
<!-- End of Data Table-->
        </div>
    </div>