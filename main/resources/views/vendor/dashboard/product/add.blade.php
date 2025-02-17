@extends('vendor.dashboard.include.main')
@section('content')

<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Pages</a></li>
                    <li class="active">Add Product</li>
                </ul>
                <!-- END BREADCRUMB -->
                  

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                    <div class="col-sm-12">
                    <div class="panel panel-default">

                    <div class="panel-heading">
                                <h3 class="panel-title">Add Product</h3>
                        <div class="text-right">
                            <a href="{{ route('vendor.prolist')}}" class="btn btn-m btn-primary">Product List</a>
                        </div>
                    </div>       
                <!-- END PAGE TITLE -->              
                            <!-- <div class="panel-heading"><h3 class="panel-title">Enter Product Details</h3></div> -->
                            <div class="panel-body">
                            <form class="form-horizontal" role="form" action="vendor_admin/Home/AddProduct" method="post"  enctype="multipart/form-data">                                    
                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" autocomplete="off" name="product_name" required="">
                                    <input type="hidden" class="form-control" name="v_id" required="" value="<?php //echo $v_id ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="example-email">Category</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="cat_id" required="" onchange="get_subcat(this.value)">
                                        <option value="">Select Category</option>
                                        <?php if(!empty($cat)){ foreach ($cat as $value) { ?>
                                            <option value="<?php echo $value->v_cat_id ?>"><?php echo $value->v_cat_name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="example-email">Subcategory</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="subcat_id" required="" id="subcat_name">
                                        <option value="">Select Subcategory</option>
                                        <?php if(!empty($subcat)){ foreach ($subcat as $value) { ?>
                                            <option value="<?php echo $value->v_subcat_id ?>"><?php echo $value->v_subcat_name ?></option>
                                        <?php } }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Actual Price <span style="color: red">In Rs.</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="prod_act_p" id="prod_act_p" placeholder="Eg : 200" required="" >
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Selling Price <span style="color: red">In Rs.</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="prod_sell_p" id="prod_sell_p" required="" placeholder="Eg : 180">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Price Save <span style="color: red">In Rs.</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="price_rs" id="price_rs" readonly="" placeholder="In Rs.">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-2 control-label">Price Save <span style="color: red">In %</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="price_percent" id="price_percent" readonly="" placeholder="In %">
                                </div>
                            </div>                                
                            <div class="form-group fieldGroup">
                                <label class="col-md-2 control-label">Product Quantity <br><span style="color: red"> Eg : 500g/1L/1Kg/1piece </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="prod_qty[]"  required="">
                                    <span style="color: red">Eg : In gram/kg/litre/ml/per piece </span>
                                </div>
                                <label class="col-md-1 control-label">Price</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="prod_prc[]"  required="">
                                </div>                                
                                <label class="col-md-1 control-label">Product Weight</label>
                                <div class="col-md-2">
                                    <select name="prod_weight[]" id="prod_weight" class="form-control" required="">
                                    <option value="">Select*</option>     
                                    <option value="gram">gram</option>     
                                    <option value="kg">kg</option>     
                                    <option value="liter">litre</option>     
                                    <option value="ml">ml</option>     
                                    <option value="per piece">per piece</option>
                                    </select>
                                </div>
                                <div class="col-md-1"><a href="javascript:void(0);" class="addMore" title="Add field"><img src="assets/vendor/img/add-icon.png"/></a></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Description</label>
                                <div class="col-md-10">
                                    <textarea class="summernote" class="form-control" rows="5" name="prod_desc"></textarea>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Disclaimer</label>
                                <div class="col-md-10">
                                    <textarea class="summernote" class="form-control" rows="5" name="prod_disclaimer"></textarea>
                                </div>
                            </div>                                       
                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Information</label>
                                <div class="col-md-10">
                                    <textarea class="summernote" class="form-control" rows="5" name="prod_info"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">CGST</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" autocomplete="off" value="" name="cgst" id="cgst">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">SGST</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" autocomplete="off" value="" name="sgst" id="sgst" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Select Product Image</label>
                                <div class="col-sm-10">
                                    <select class="select2" data-placeholder="Choose  Product Image..." name="prod_img1">
                                      <option value="">&nbsp;</option>
                                      <?php if(!empty($p_img)){ foreach ($p_img as $key ) { ?>
                                      <option value="<?php echo $key->pimg_i_img ?>"><?php echo $key->pimg_pname ?></option>
                                       <?php } }?>
                                    </select>
                                </div>
                            </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Image</label>
                                        <div class="col-sm-10">
                                        <input type="file" class="form-control" name="prod_img1">
                                        <span style="color: red">Min dimention of images should be 500 * 500 Or in the same ratio</span>
                                        </div>
                                    </div>  
                                    <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Image</label>
                                        <div class="col-sm-10">
                                        <input type="file" class="form-control" name="prod_img2">
                                        </div>
                                    </div>  --> 
                                    <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Image</label>
                                        <div class="col-sm-10">
                                        <input type="file" class="form-control" name="prod_img3">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Image</label>
                                        <div class="col-sm-10">
                                        <input type="file" class="form-control" name="prod_img4">
                                        </div>
                                    </div>   -->
                                    <div class="form-group fieldGroupCopy" style="display: none;">
                                <label class="col-md-2 control-label">Product Quantity <br><span style="color: red"> Eg : 500g/1L/1Kg/1piece </span></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="prod_qty[]">
                                    <span style="color: red">Eg : In gram/kg/litre/ml/per piece </span>
                                </div>
                                <label class="col-md-1 control-label">Price</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="prod_prc[]">
                                </div>                                 
                                <label class="col-md-1 control-label">Product Weight</label>
                                <div class="col-md-2">
                                    <select name="prod_weight[]" id="prod_weight" class="form-control">
                                    <option value="">Select*</option>     
                                    <option value="gram">gram</option>     
                                    <option value="kg">kg</option>     
                                    <option value="liter">litre</option>     
                                    <option value="ml">ml</option>     
                                    <option value="per piece">per piece</option>
                                    </select>
                                </div>
                                <div class="col-md-1"><a href="javascript:void(0);" class="remove"><img src="assets/vendor/img/remove-icon.png"/></a></div>
                            </div>
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-success" id="btnSubmit" type="submit">Save</button>
                                        <button class="btn btn-default" type="button">Cancel</button>
                                    </div>
                
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
            <script>
                    $(document).ready(function() {
                        $('.summernote').summernote({
                            height: 150,
                        });
                    });
                </script>      
            <script type="text/javascript">
                $(function() {
                    $("#prod_act_p, #prod_sell_p").on("keydown keyup", sum);
                    function sum() {
                        //$("#sum").val(Number($("#prod_act_p").val()) + Number($("#prod_sell_p").val()));
                        $("#price_rs").val(Number(($("#prod_act_p").val()) - Number($("#prod_sell_p").val())).toFixed(2));
                        //$("#price_percent").val((Number($("#price_rs").val()) / Number($("#prod_act_p").val()))*100);
                        $("#price_percent").val(((Number($("#price_rs").val()) / Number($("#prod_act_p").val()))*100).toFixed(2));
                    }
                });
            </script>
            <script type="text/javascript">
                function get_subcat(cat_id){
                    //alert(cat)
                    $.ajax({
                    url: 'vendor_admin/Home/get_subcat/' + cat_id ,
                    success: function(response)
                    {
                       //alert(response);
                       jQuery('#subcat_name').html(response);
                    }
                });
                }

    $(document).ready(function(){
    //group add limit
    var maxGroup = 10;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});

            </script>
@endsection