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
<!-- End of Flash Data Edit Event-->

<!-- Add Event Data -->
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Event Data</h3>

                <button type="button" class="btn btn-info pull-right text-right" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-plus"></i>&nbsp; Add Event</button>
            </div>
            
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Event Data</h4>
                        </div>

                        <div class="modal-body">
                            <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Event/add_event" ?>">
                            
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Event</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="event" class="form-control" id="input_event" placeholder="Event Name" required>
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
                            <div class="form-group">
                                <label for="input_division" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="desc" placeholder="Event Description" required>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label for="input_event" class="col-sm-2 control-label">Region</label>
                                <div class="col-sm-10">
                                    <select name="id_region" class="form-control required">
                                    <option value="" disabled selected><i>Choose Region</i></option>
                                    <?php foreach ($region as $regions) { ?>
                                    <option value="<?php echo $regions->id_region ?>"><?php echo $regions->region ?> </option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label for="input_event" class="col-sm-2 control-label">Batch</label>
                                <div class="col-sm-10">
                                    <select name="id_batch" class="form-control required">
                                    <option value="" disabled selected><i>Choose Batch</i></option>
                                    <?php foreach ($batch as $batches) { ?>
                                    <option value="<?php echo $batches->batch ?>"><?php echo $batches->batch ?> </option>
                                    <?php } ?>
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
<!-- End of Add Data School-->

<!-- Data Table School-->     
                <div class="box-body">                    
                    <table class="table table-bordered table-striped table-data">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Event</th>                            
                            <th>Date Begin</th>
                            <th>Date End</th>
                            <th>Desc</th>
                            <th>Region</th>
                            <th>Batch</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            <?php $i=0; foreach($result as $event){
                                if($event->event){$i++; ?>                
                            <tr>
                                <td><?php echo $i ?> </td>
                                <td><?php echo $event-> event ;?></td>
                                <td><?php echo $general->convert_date($event->date_begin)?></td>
                                <td><?php echo $general->convert_date($event->date_end)?></td>
                                <td><?php echo $event-> desc ;?></td>
                                <td><?php echo $event-> region;?></td>
                                <td><?php echo $event-> batch;?></td>
                                <td>
                                    <a class="btn btn-sm btn-success btn-xs" data-toggle="modal" data-target="#modal-<?php echo $event->id_event?>"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>

<!-- Edit Data School-->
                            <div class="modal fade" id="modal-<?php echo $event->id_event?>">
                                <div class="modal-dialog">
                            
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Event Data</h4>
                                    </div>

                                    <div class="modal-body">
                                    <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Event/edit_event" ?>">
                            
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_name" class="col-sm-2 control-label">Event</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="event" class="form-control" id="input_event" value="<?php echo $event->event ?>" required>
                                            <input type="hidden" name="id_event" class="form-control" id="input_event" value="<?php echo $event->id_event ?>" required>
                                            </div>    
                                        </div>
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_division" class="col-sm-2 control-label">Date Begin</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="date_begin" placeholder="dd-mm-yyy" value="<?php echo $event->date_begin?>" required>
                                            </div>
                                        </div>                                         
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_division" class="col-sm-2 control-label">Date End</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="date_end" placeholder="dd-mm-yyy" value="<?php echo $event->date_end?>" required>
                                            </div>
                                        </div>                                         
                                        
                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_division" class="col-sm-2 control-label">Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="desc" placeholder="Event Description" value="<?php echo $event->desc?>" required>
                                            </div>
                                        </div> 

                                        <div class="form-group" style="padding:15px 0">
                                          <label for="input_program" class="col-sm-2 control-label">Region</label>
                                          <div class="col-sm-10">
                                            <select class="form-control" data-placeholder="Select Region" style="width: 100%;" name="id_region" required>
                                            <?php foreach($region as $regions){ ?>
                                            <option <?php if ($regions->id_region == $event->id_region){echo "selected";} ?> value="<?php echo $regions->id_region ?>"><?php echo $regions->region?></option>
                                            <?php } ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group" style="padding:15px 0">
                                          <label for="input_program" class="col-sm-2 control-label">Batch</label>
                                          <div class="col-sm-10">
                                            <select class="form-control" data-placeholder="Select Region" style="width: 100%;" name="id_batch" required>
                                            <?php foreach($batch as $batches){ ?>
                                            <option <?php if ($batches->id_batch == $event->id_batch){echo "selected";} ?> value="<?php echo $batches->id_batch ?>"><?php echo $batches->batch?></option>
                                            <?php } ?>
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