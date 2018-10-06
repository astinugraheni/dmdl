<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
            <img src="<?php echo base_url('/assets/img/icon.jpg') ;?>" alt="" class="profile-user-img img-responsive img-circle">
            <h3 class="profile-username text-center"><?php echo $result[0]->name ;?></h3>
            <p class="text-muted text-center">Volunteer</p>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Volunteer</h3>
            </div>
            <div class="box-body">
                <strong><i class="fa  fa-envelope"></i> Email :</strong>
                <p class="text-muted"><?php echo $result[0]->email ;?></p>
                <hr />

                <strong><i class="fa  fa-phone"></i> Phone :</strong>
                <p class="text-muted"><?php echo $result[0]->cp ;?></p>
                <hr />                

                <strong><i class="fa  fa-calendar"></i> Date of Birth :</strong>
                <p class="text-muted"><?php echo $result[0]->dob ;?></p>
                <hr />     

                <strong><i class="fa  fa-home"></i> Address :</strong>
                <p class="text-muted"><?php echo $result[0]->address ;?></p>
                <hr />                    
            </div>
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Event Joined</h3>
                <button type="button" class="btn btn-info pull-right text-right" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-plus"></i> &nbsp;Add Event</button>
            </div>              

            <!--Body-->
            <div class="box-body">
                <table class="table table-bordered table-striped table-data">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Event</th>
                        <th>Description</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <?php $i=0;
                            foreach($result as $ve){
                                if($ve->id_ve){ $i++;?>
                        <tr>
                        <td><?php echo $i ;?></td>
                        <td><?php echo $ve->event ;?></td>
                        <td><?php echo $ve->desc ;?></td>
                        <td><center>
                            <?php $id_volunteer = $this->uri->segment(3); ?>
                            <a class="btn btn-sm btn-success btn-xs" data-toggle="modal" data-target="#modal-<?php echo $ve->id_ve?>"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-sm btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete-<?php echo $ve->id_ve?>"><i class="fa fa-trash"></i>Delete</a>
                        </center>
                        </td>
                        </tr>

                    <!--Edit Class Modal-->  
                    <div class="modal fade" id="modal-<?php echo $ve->id_ve?>">
                        <div class="modal-dialog">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit Event Data</h4>
                                </div>

                                <div class="modal-body">
                                <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url()."Team/edit_volunteer_event" ?>">
                                
                                <input type="hidden" name="id_ve" class="form-control" id="input_class" value="<?php echo $ve->id_ve ?>" required>
                                
                                    <div class="form-group">
                                        <label for="input_program" class="col-sm-2 control-label">Event</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" data-placeholder="Select Event" style="width: 100%;" name="id_event" required>
                                            <?php foreach($event as $events){ ?>
                                            <option <?php if ($events->id_event == $ve->id_event){echo "selected";} ?> value="<?php echo $events->id_event ?>"><?php echo $events->event?></option>
                                            <?php } ?>
                                        </select>
                                        </div>

                                        <div class="form-group" style="padding:15px 0">
                                            <label for="input_desc" class="col-sm-2 control-label">Desc</label>
                                                <div class="col-sm-10" style="height: 30px">
                                                <input type="text" name="Desc" class="form-control" id="input_desc" value="<?php echo $ve->desc ?>" required>
                                                </div>
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
                        <!--End of Edit Class Modal-->
                        <!--Delete Class Modal-->
                        <div class="modal fade" id="modalDelete-<?php echo $ve->id_ve?>">
                        <div class="modal-dialog">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <div class="modal-body">
                                <form id="form" class="form-horizontal" method="POST" action="<?php echo base_url() ?>Team/delete_volunteer_event/<?php echo $ve->id_ve?>/<?php echo $id_volunteer?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="delete_modal" class="control-label">You are about to delete. Do you want to proceed?</label>
                                                <input type="hidden" name="id_ve" value="<?php echo $ve->id_ve; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                    <input type="submit" name ="submit" class="btn btn-primary" value="Yes">
                                </div>
                                        
                                </form>
                            </div>
                            </div>
                        </div>
                        <!--Delete Class Model-->
                        <?php }} ?>

                    </tbody>
                </table>
            </div>
            <!--End of Body-->
    </div>
    <!--End of Primary-->
    </div>
    <!--End of Class Col 9-->
</div>