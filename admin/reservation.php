
<?php
    spl_autoload_register(function($class){
        include "../classes/".$class.".php";
    });
    include "header.php";
    $reservations = reservation::all();

?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Blank Page </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Specialties</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Reservation Management</h3>
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add reservation</button>
                            <br>
                            <br>
                            <?php
                                // if(isset($_SESSION["slide_added"])){
                                //     echo "<div class='alert alert-success'>Slide Added Successfuly!</div>";
                                // }
                            ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>people_nums</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>user_name</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>created at</th>
                                            <th>action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($reservations as $reservation) {
                                            if(isset($reservation))
                                            {
                                        ?>    

                                        <tr>
                                            <td class="txt-oflo"><?php echo $reservation->people_nums; ?></td>
                                            <td><?php echo $reservation->date ;?></td>
                                            <td class="txt-ofloreservation"><?php echo $reservation->time ;?></td>
                                            <td class="txt-oflo"><?php echo $reservation->user_name ;?></td>
                                            <td class="txt-oflo"><?php echo $reservation->email ;?></td>
                                            <td class="txt-oflo"><?php echo $reservation->phone ;?></td>
                                            <td class="txt-oflo"><?php echo $reservation->created_at ;?></td>

                                         
                                         <td><button  data-toggle="modal" data-target="#modal_edit" value="<?php echo $event->id ;?>" class="edit btn btn-info" style="margin-left:0 !important">Edit</button></td>                                            
                                            <td><a href="<?php echo "data_process.php?deletereservation=".$reservation->id ;?>" value="<?php echo $slide->id ;?>"  class="btn btn-danger" style="margin:0 !important">Cancel reservation</a></td>
                                        </tr>
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table> <a href="#"></a> </div>
                        
                        </div>


                        <!-- modal_edit -->
                        <div id="modal_edit" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                 <!-- Modal content -->
                                 <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Slide</h4>

                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                      <form role="form" action="data_process.php" method="POST" id="slide_form" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                <label>people_nums</label>
                                <input class="form-control" name="people_nums"  type="text">
                                </div>
                                <div class="form-group">
                                <label>date</label>
                                <input class="form-control" name="date" type="date">
                                </div>
                                <div class="form-group">
                                <label>time</label>
                                <input class="form-control" name="time"  type="time">
                                </div>
                                <div class="form-group">
                                <label>user_name</label>
                                <input class="form-control" name="user_name"  type="text">
                                </div>
                                <div class="form-group">
                                <label>email</label>
                                <input class="form-control" name="email"  type="text">
                                </div>
                                <div class="form-group">
                                <label>phone</label>
                                <input class="form-control" name="phone"  type="number">
                                </div>
                                <label>created_at</label>
                                <input class="form-control" name="created_at"  type="date">
                                </div>
                                <div class="form-group">
                                <!-- <label for="exampleInputFile">Choose Image</label>
                                <input id="exampleInputFile" name="image" type="file"> -->
                                </div>
                            
                            </div>
                       
                           <!-- /.box-body -->

                        <div class="box-footer">
                                <button type="submit"  name="add_slide"  class="btn btn-primary">Add</button>
                            </div>
                    </form>
                                 </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

 
                    </div>
                </div>
            </div>



            <?php
                // unset($_SESSION["slide_added"]);
                // session_destroy();
                include "footer.php";
            ?>