<div class="row">
    <div class="col-xs-12">

<!--Flash Data Edit School-->
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
<!-- End of Flash Data Edit Batch-->

<!-- Add Batch Data -->
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Batch Data</h3>

                <button type="button" class="btn btn-info pull-right text-right" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-plus"></i>&nbsp; Add Period</button>
            </div>
            
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Batch Data</h4>
                        </div>

                        <div class="modal-body">
                            <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Batch/add_batch" ?>">
                            
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Batch</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="batch" class="form-control" id="input_batch" placeholder="Batch Period" required>
                                    </div>    
                            </div>
                            <div class="form-group">
                                <label for="input_division" class="col-sm-2 control-label">Date Begin</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date_begin" placeholder="dd-mm-yyy" required>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="input_division" class="col-sm-2 control-label">Date End</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date_end" placeholder="dd-mm-yyy" required>
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
<!-- End of Add Data School-->

<!-- Data Table School-->     
                <div class="box-body">                    
                    <table class="table table-bordered table-striped table-data">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Batch</th>                            
                            <th>Date Begin</th>
                            <th>Date End</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Activation</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            <?php $i=0; foreach($result as $batch){
                                if($batch->batch){$i++; ?>                
                            <tr>
                                <td><?php echo $i ?> </td>
                                <td><?php echo $batch-> batch ;?></td>
                                <td><?php echo $general->convert_date($batch->date_begin)?></td>
                                <td><?php echo $general->convert_date($batch->date_end)?></td>
                                <td>
                                    <?php 
                                    if($batch->status == 'active') echo '<span class="label label-success">Active</span>';
                                    else echo '<span class="label label-danger">Not Active</span>';
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success btn-xs" data-toggle="modal" data-target="#modal-<?php echo $batch->id_batch?>"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('Batch/batch_activation/'.$batch->id_batch) ;?>" class="btn btn-warning btn-xs"><i class="fa fa-check"></i></a>
                                </td>
                            </tr>

<!-- Edit Data School-->
                            <div class="modal fade" id="modal-<?php echo $batch->id_batch?>">
                                <div class="modal-dialog">
                            
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Batch Data</h4>
                                    </div>

                                    <div class="modal-body">
                                    <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Batch/edit_batch" ?>">
                            
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_name" class="col-sm-2 control-label">Batch</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="batch" class="form-control" id="input_batch" value="<?php echo $batch->batch ?>" required>
                                            <input type="hidden" name="id_batch" class="form-control" id="input_batch" value="<?php echo $batch->id_batch ?>" required>
                                            </div>    
                                        </div>
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_division" class="col-sm-2 control-label">Date Begin</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="date_begin" placeholder="dd-mm-yyy" value="<?php echo $batch->date_begin?>" required>
                                            </div>
                                        </div>                                         
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_division" class="col-sm-2 control-label">Date End</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="date_end" placeholder="dd-mm-yyy" value="<?php echo $batch->date_end?>" required>
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
 <!-- End of Edit School-->

                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
<!-- End of Data Table School-->
        </div>
    </div>