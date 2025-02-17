@extends('vendor.dashboard.include.main')
@section('content')

        <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Pages</a></li>
                    <li class="active">Product List</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <!-- <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Product List</h2>
                </div> -->
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Product List</h3>
                                    <div class="text-right">
                                        <a href="{{ route('vendor.proadd')}}" class="btn btn-m btn-primary">Add Product</a>
                                    </div>
                                </div>
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>S No.</th>
                                                    <th>Product Id</th>
                                                    <th>Category Name</th>
                                                    <th>Subcategory Name</th>
                                                    <th>Product Name</th>
                                                    <th>Product_Price</th>
                                                    <th>Product image</th>
                                                    <th>Inventory</th>
                                                    <th>Status</th>    
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php if(!empty($product)){ $i=1;  foreach($product as $value) { 

                                    $a= $i++;
                                    $pid = base64_encode($value->v_product_id);
                                    $View = 'vendor_admin/Home/ViewProduct';
                                    $duplicateProduct = 'vendor_admin/Home/duplicate_product';
                                    $Inventory = 'vendor_admin/Home/Inventory';
                                    $Edit = 'vendor_admin/Home/EditProduct';
                                    $Delete = 'vendor_admin/Home/DeleteProduct';
                                    $image = '../../';
                                    
                                    if($value->v_product_status == 0)
                                    {
                                        $sts = "Active";
                                    }else { $sts = "In Active";}

                                    echo "<tr>
                                    <td>$a</td>
                                    <td>$value->v_product_id</td>
                                    <td>$value->v_cat_name</td>
                                    <td>$value->v_subcat_name</td>
                                    <td>$value->v_product_name</td>
                                    <td>
                                        Actual-Price :  $value->v_product_cost</br>
                                        Selling-Price :  $value->v_product_selling_price </br>
                                        Offer in Rs. :  $value->v_product_save_in_rs </br>
                                        Offer in % :  $value->v_product_save_percent </br>
                                    </td>
                                    <td><img src='$image/$value->v_product_image' style='width:100px'></td>
                                    <td>
                                        <a href='$Inventory?id=$pid' class='btn btn-primary tooltips' data-placement='top' data-toggle='tooltip' data-original-title='Add Inventory'>
                                            Add Inventory
                                        </a>
                                    </td>
                                    <td>$sts</td>
                                    <td>
                                        <a href='$View?id=$pid' class='btn btn-primary tooltips' data-placement='top' data-toggle='tooltip' data-original-title='view'>
                                            <span class='fa fa-eye'></span>
                                        </a>
                                        <a href='$duplicateProduct?id=$pid' class='btn btn-primary tooltips' data-placement='top' data-toggle='tooltip' data-original-title='Duplicate Product'>
                                            
                                            <i class='fa fa-list-ul'></i>
                                        </a>
                                        <a href='$Edit?id=$pid' class='btn btn-default btn-rounded btn-condensed btn-sm' data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                        <span class='fa fa-pencil'></span>
                                        </a> 
                                        <a href='$Delete?id=$pid' class='btn btn-danger btn-rounded btn-condensed btn-sm' data-placement='top' data-toggle='tooltip' data-original-title='Delete' onClick='return doconfirm();'>
                                        <span class='fa fa-times'></span>
                                        </a>
                                    </td>
                                    </tr>";
                                    } }
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