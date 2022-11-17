<div class="container">
<?php include('include/header.php')?>
</div>
<div class="col-12 my-5">
            <div class="card top-selling overflow-auto">
                <form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)"
                >

                    <div class="container d-flex">
                        <label class="m-3">Position Name</label>
                        <input class="form-control m-3 " style="max-width:70%; max-height: 50px;" type="text" name="position" /></td>
                       <div class="container text-center m-3">
                       <button class="btn btn-primary " 
                       type="submit" name="Submit" value="Add" >submit</button>
                       </div>
                    </div>

                    <?php include('include/pos.php') ?>
                    <div class="card top-selling overflow-auto">

                        <div class="card-body pb-0">
                        <h5 class="card-title">Manage <span>| Positions</span></h5>

                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Position ID</th>
                                <th scope="col">Position Name</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                            
                            </thead>
                            <tbody>
                            <tr>

                                <?php

                                $inc=1;
                                while ($row=mysqli_fetch_array($result)){
                                echo "<tr>";
                                // echo "<td>" .$inc."</td>";
                                echo "<td>" . $row['position_id']."</td>";
                                echo "<td>" . $row['position_name']."</td>";
                                echo '<td><a class="text-danger" href="positions.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
                                echo "</tr>";
                                $inc++;
                                }

                                mysqli_free_result($result);
                                mysqli_close($con);
                                ?>
                                
                            </tr>
                           
                        </tbody>
                    </table>

                </div>
            </form>
        </div>

