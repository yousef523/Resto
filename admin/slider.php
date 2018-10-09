
<?php
    spl_autoload_register(function($class){
        include "../classes/".$class.".php";
    });
    include "header.php";
    session_start();

    $slides = slide::all();

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
                            <h3 class="box-title">Slider Management</h3>
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Slide</button>
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
                                            <th>head 1</th>
                                            <th>head 2</th>
                                            <th>head 3</th>
                                            <th>image</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($slides as $slide) {
                                            if(isset($slide))
                                            {
                                        ?>    

                                        <tr>
                                            <td class="txt-oflo"><?php echo $slide->head1; ?></td>
                                            <td><?php echo $slide->head2 ;?></td>
                                            <td class="txt-oflo"><?php echo $slide->head3 ;?></td>
                                            <td><span class="text-success"><?php echo $slide->image_url;?></span></td>
                                            <td><button data-toggle="modal" data-target="#edit_model" value="<?php echo $slide->id ;?>" class="edit btn btn-info" style="margin-left:0 !important">Edit</button></td>
                                            <td><a href="<?php echo "data_process.php?deleteslide=".$slide->id ;?>" value="<?php echo $slide->id ;?>"  class="btn btn-danger" style="margin:0 !important">delete</a></td>
                                        </tr>
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table> <a href="#">Check all the sales</a> </div>
                        
                        </div>


                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Slide</h4>

                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                    <form role="form" action="data_process.php" method="POST" id="slide_form" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                <label>Head 1</label>
                                <input class="form-control" name="head1" placeholder="Enter Head 1" type="text">
                                </div>
                                <div class="form-group">
                                <label>Head 2</label>
                                <input class="form-control" name="head2" placeholder="Enter Head 2" type="text">
                                </div>
                                <div class="form-group">
                                <label>Head 3</label>
                                <input class="form-control" name="head3" placeholder="Enter Head 3" type="text">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Choose Image</label>
                                <input id="exampleInputFile" name="image" type="file">

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

                        <!-- Modal Edit-->
                        <div id="edit_model" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
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
                                <label>Head 1</label>
                                <input id="edit_head1" class="form-control" name="head1" placeholder="Enter Head 1" type="text">
                                </div>
                                <div class="form-group">
                                <label>Head 2</label>
                                <input id="edit_head2" class="form-control" name="head2" placeholder="Enter Head 2" type="text">
                                </div>
                                <div class="form-group">
                                <label>Head 3</label>
                                <input id="edit_head3" class="form-control" name="head3" placeholder="Enter Head 3" type="text">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">edit Image</label>
                                <input id="exampleInputFile" name="image_url" type="file">
                                </div>
                            
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit"  name="edit_slide"  class="btn btn-primary">Edit</button>
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

                                                
            <script>
                $(document).ready(function(){
                    $(".edit").click(function(e){
                        var id = e.currentTarget.value;
                        $.ajax({
                            url:"data_process.php",
                            type:"get",
                            dataType:"json",
                            data:{"item_id":id ,"get_slide_id":""}
                        })
                        .done(function(res){
                            $("#edit_head1").val(res["head1"]);
                            $("#edit_head2").val(res["head2"]);
                            $("#edit_head3").val(res["head3"]);         
                        })
                    })
                })
  

            </script>


            <?php
                // unset($_SESSION["slide_added"]);
                // session_destroy();
                include "footer.php";
            ?>