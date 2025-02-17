@extends('vendor.dashboard.include.main')
@section('content')

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Pages</a></li>
                    <li class="active">Add Subcategory</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Add Subcategory</h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Add Subcategory</h3></div>
                            <div class="panel-body">
                                <div class=" form">
                                    <form class="cmxform form-horizontal tasi-form" method="post" action="Home/AddSubcategory">
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-2">Category Name *</label>
                                <div class="col-lg-5">
                                    <select class="form-control" name="cat_id" required="">
                                        <option value="">Select Category</option>
                                        <?php if(!empty($cat)){foreach ($cat as $value) { 
                                        echo "<option value='$value->v_cat_id'>$value->v_cat_name</option>" ;
                                    } }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">Subcategory Name *</label>
                                <div class="col-lg-5">
                                    <input class=" form-control" id="cname" name="subcategory_name" type="text" aria-required="true"  required="">
                                    <input class=" form-control" id="v_id" name="v_id" type="hidden" aria-required="true"  value="<?php echo @$v_id ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <button class="btn btn-default" type="button">Cancel</button>
                                </div>
                            </div>
                            </form>
                                </div> <!-- .form -->
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->

                </div> <!-- End row -->
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Subcategory
                            </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>S No.</th>
                                                    <th>Category Id</th>
                                                    <th>Category Name</th>
                                                    <th>Category Image</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($subcat)){ $i=1;  foreach($subcat as $value) { 
                                        $a= $i++;
                                        $Edit = 'vendor_admin/Home/EditSubCat';
                                        $Delete = 'vendor_admin/Home/DeleteSubCat';
                                    echo "<tr>
                                        <td>$a</td>
                                        <td>$value->v_subcat_id</td>
                                        <td>$value->v_cat_name</td>
                                        <td>$value->v_subcat_name</td>
                                        <td>$value->v_subcat_date</td>
                                        <td>
                                        <a href='$Edit?id=$value->v_subcat_id' class='btn btn-default btn-rounded btn-condensed btn-sm' data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                            <span class='fa fa-pencil'></span>
                                        </a> 
                                        <a href='$Delete?id=$value->v_subcat_id' class='btn btn-danger btn-rounded btn-condensed btn-sm' data-placement='top' data-toggle='tooltip' data-original-title='Delete' onClick='return doconfirm();'>
                                            <span class='fa fa-times'></span>
                                        </a>
                                        </td>
                                        
                                    </tr>";}}
                                   ?>
                                   <script>
                                    function doconfirm()
                                    {
                                        job=confirm("Are you sure to delete permanently?");
                                        if(job!=true)
                                        {
                                            return false;
                                        }
                                    }
                                    </script>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                         </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
         @endsection