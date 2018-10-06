<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
            <img src="<?php echo base_url('/assets/img/icon.jpg') ;?>" alt="" class="profile-user-img img-responsive img-circle">
            <h3 class="profile-username text-center"><?php echo $result[0]->name ;?></h3>
            <p class="text-muted text-center">Supporting Team</p>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Supporting Team</h3>
            </div>
            <div class="box-body">
                <strong><i class="fa  fa-cog"></i> Division :</strong>
                <p class="text-muted"><?php echo $result[0]->division ;?></p>
                <hr />

                <strong><i class="fa fa-star"></i> Status :</strong>
                <p class="text-muted"><?php echo $result[0]->status ;?></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-9">   
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Supporting Team Data Detail</h3>
            </div>  
                <div class="box-body">                    
                    <table class="table table-bordered table-striped table-data">
                        <tr>
                            <th>Email</th>
                            <td><?php echo $result[0]->email ;?></td>
                        </tr>
                        <tr>
                            <th>Contact Person</th>
                            <td><?php echo $result[0]->cp ;?></td>
                        </tr>                        
                        <tr>
                            <th>Date of Birth</th>
                            <td><?php echo $general->convert_date($result[0]->dob)?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $result[0]->address ;?></td>
                        </tr>
                        <tr>
                            <th>Active Date</th>
                            <td><?php echo $general->convert_date($result[0]->active_date)?></td>
                        </tr>                        
                    </table>
                </div>
            </div>
<!-- End of Data Evaluation-->
    </div>
    </div>
</div>

