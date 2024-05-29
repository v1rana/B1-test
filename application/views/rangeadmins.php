<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('supersuperadmin_user_id')) {  ?>

<?php
    // echo "<pre>";
    // print_r($data);
    
?>
    <div id="tabs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">                
                    <div class="tab-content" id="nav-tabContent">
                        <h1>List Of Candidates</h1>
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="table-responsive b1-test-table">
                                <table class="table table-bordered" id="table2" class="table2">								
                                    <thead>
                                        <tr>
                                            <th scope="col">S.NO.</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>                                            
                                            <th scope="col">Belt Number</th>
                                            <th scope="col">Rank</th>
                                            <th scope="col">Unit</th>										
                                            <th scope="col">Date Of Joining</th>
                                            <th scope="col">DOB</th>
                                            <th scope="col">Exam Range</th>
                                            <th scope="col">Created on</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                            <?php
                                    // echo "<pre>";
                                    // print_r($data);

									if($data !== 'NO_USER_FOUND') {
                                            $i = 1;
                                            foreach($data as $val) {
                            ?>
                                                <tr>
                                                    <td><?php if($i) { echo $i; } ?></td>
                                                    <td><?php if($i) { echo $val['firstname']; } ?></td>
                                                    <td><?php if($i) { echo $val['lastname']; } ?></td>                                                    
                                                    <td><?php if($i) { echo $val['beltnumber']; } ?></td>
                                                    <td><?php if($i) { echo $val['rank_name']; } ?></td>
                                                    <td><?php if($i) { echo $val['unit_name']; } ?></td>
                                                    <td><?php if($i) { echo $val['dateofjoining']; } ?></td>
                                                    <td><?php if($i) { echo $val['dob']; } ?></td>
                                                    <td><?php if($i) { echo $val['name']; } ?></td>
                                                    <td><?php if($i) { echo $val['creationdate']; } ?></td>
                                                    <td><a href="">Edit</a></td>
                                                </tr>
                            <?php
                                                $i++;
                                            }
                                        } else {
                            ?>
                                           

                            <?php
                                        }

                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else {
    redirect(base_url() . 'admin/index');
    
}?>