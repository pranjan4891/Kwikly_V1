<?php 
if($this->uri->segment('3')=='')
{
  redirect(base_url().'/user/index');
  $id = '';
}
else
{  
//   $id = base64_decode($this->uri->segment('3'));
  $id = $this->uri->segment('3');
  $vendordetails = $this->Front_model->getDataById($table='vendor_reg',$colname='v_id',$id);
//   dd($vendordetails);
  $storename = $vendordetails[0]->v_display_name;
  $serviceoffered = $vendordetails[0]->v_service_offered;
  $desciption = $vendordetails[0]->v_business_desc;
  //$displayimagea = $vendordetails[0]->v_display_image;
  $displayimagea = $vendordetails[0]->v_business_logo;

  
  if($displayimagea!='')
  {
    $imgpatha = $_SERVER['DOCUMENT_ROOT'].'/'.$displayimagea;
    if(file_exists($imgpatha))
    {
      $imagepatha  = base_url().'/'.$displayimagea;
    }
    else
    {
      $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
    }
  }
  else
  {
    $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
  }

  $otime = $vendordetails[0]->fld_open_time;
  $ctime = $vendordetails[0]->fld_close_time;
}
?>

<style type="text/css">
        	.sticky-located {
        	top: 78px;	
        }
        .sticky-menu {
            position: sticky;
            top: 136px;
            z-index: 99;
            background: #f15a24;
        }
        .sticky-menu .store_menu_wrap li a {
          font-size: 16px;
        }
        .item {
        	margin: 10px 0;
        }
        .container-fluid.store {
          margin-top: -1px;
        }
        .sticky-store {
          top: 139px;
          position: sticky;
          z-index: 9999;
        }
        .sticky-location, .store_profile_pics .online_visible {
          
          z-index: 1 !important;
        }
        @media (max-width: 768px){
          .sticky-store {
          top: 59px;
          position: sticky;
          z-index: 9999;
        }
        	.sticky-located {
        	top: 60px;
        }
        .search_wrap {
          z-index: 9999;
        }
        .sticky-menu, .menu_store_section {
        	top: 68px;
        	background: #39a003;
        }
        }
        @media (max-width: 540px){
          .sticky-location {
          position: sticky;
          top: 88px;
          z-index: 999;
        }
        .search_wrap {
          z-index: 9999;
        }
        .sticky-menu, .menu_store_section {
          top: 68px;
          background: #39a003;
        }
        @media (max-width: 540px){
        .search_wrap {
          z-index: 9999;
        }
        .sticky-menu, .menu_store_section {
          top: 68px;
          background: #39a003;
        }
        @media (max-width: 370px){
          .nearstore .outlet {
          font-size: 18px;
        }
        }
</style>

<?php 
    $this->db->distinct();
    $this->db->select('v_product_name');
    $this->db->where('v_product_status','0'); 
    $this->db->where('v_id',$id);   
    $this->db->from('vendor_product');
    $qryp = $this->db->get();
    //echo $this->db->last_query();
    if($qryp->num_rows()>0)
    {
      $availableproducts = '';
      foreach($qryp->result() as $rowp)
      {
        $availableproducts.='"'.$rowp->v_product_name.'",';
      }
    }
    ?>
    <script>
        $(function(){
        var availableTags=[<?php echo $availableproducts; ?>];
        $("#tags").autocomplete({
          source:availableTags
        });
        });
    </script>
    <script>
        var storeid = '<?php echo base64_encode($id); ?>';
        function searchproduct()
        {
          var searchitem=$("#tags").val();
          window.location.href="<?php echo base_url();?>website/shop/search/"+searchitem+"/"+storeid;
        }
    </script>
    <!-- <div class="container-fluid store_profile">
    	<div class="row">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-12">
    					<div class="welcome stoe">
    						<h1>Welcome to <strong>GONDA, UTTAR PRADESH</strong></h1>
    						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    					</div>
    				</div>
    			</div>
    	</div>
    	</div>
    </div> -->
    
        <div class="container-fluid white-bg sticky-location d-none d-lg-block d-xl-block">
        	<div class="row">
        		<div class="container">
        			<div class="row">
        				<div class="col-lg-6 col-12">
        				<div class="breadcums">
        					<ul>
        						<li><a href="<?php echo base_url() ?>">Home</a><span>/</span></li>
        						<li><a href="<?php echo base_url('User/index') ?>">Store</a></li>
        					</ul>
        				</div>
        			</div>
        			<div class="col-lg-6 col-12">
        				<div class="products_search_view">
        				      <!--div class="input_group">
                                <input type="text" name="search_prd">
        						<input type="text" name="search_data" id="search_data" value="" placeholder="Search for Store" onkeyup="ajaxsearchStore();">
                                <button class="search_btn"><img src="<?php echo base_url() ?>assets/website/img/icons/search.svg" alt="search"/></button>
                              </div-->
                              
        					<div class="form_group">
        						<!--input type="text" id="tags" value="" placeholder="Search for products"-->
        						<input type="text" name="search_data" id="search_data" value="" placeholder="Search for Store" onkeyup="ajaxsearchStore();">
        						<button><img src="<?php echo base_url() ?>assets/website/img/icons/search.svg" alt="search"/></button>
        					</div>
        					<div class="suggestions_input">
                              <div id="suggestions">
                                <div id="autoSuggestionsList"></div>
                              </div>
        					</div>
        				</div>
        			</div>
        			</div>
        		</div>
        	</div>
	    </div>
        <div class="container-fluid store whitebackground">
              <div class="search_wrap" style="display: none;">
                    <input type="text" name="search" id="searchm_data" value="" placeholder="Search for Store" onkeyup="ajaxsearchMStore();">
                    <button><img src="<?php echo base_url() ?>assets/website/img/icons/search.svg" alt="search"></button>
                </div>
        		<div class="suggestions_input">
                              <div id="suggestionsm">
                                <div id="autoSuggestionsListm">
                                </div>
                              </div>
        					  </div>
        			<div class="container">
        			<div class="row">
        				<?php 
                $cat = $this->uri->segment('3');
                $pin_code = $this->uri->segment('4');
                if(($cat!='' && $cat!='0') && $pin_code!='')
              {
        $qrygrc = $this->db->query("SELECT COUNT(*) AS cntgroc FROM vendor_reg WHERE (v_business_cat LIKE '$cat,%' OR v_business_cat LIKE '%,$cat' OR v_business_cat LIKE '$cat' OR v_business_cat LIKE '%,$cat,%') AND v_status = '1' AND v_postal_code_reg = '".$pin_code."' AND is_delete='0'");
        $cntgrc = 0;
        if($qrygrc->num_rows()>0)
        {
           foreach($qrygrc->result() as $rowgrc)
           {
              $cntgrc = $rowgrc->cntgroc;
           }
        }
        else
        {
           $cntgrc=0;
        }
        }elseif($cat=='0'){
        	$qrygrc = $this->db->query("SELECT * FROM vendor_reg WHERE  v_status = '1'  AND v_postal_code_reg = '".$pin_code."' AND is_delete='0'");
        
                //$cntgrc = 0;
                //echo $this->db->query();
                $cntgrc = $qrygrc->num_rows();
        }else{
        	$qrygrc = $this->db->query("SELECT v_display_name,v_business_logo,v_display_image,v_id, fld_open_time,fld_close_time FROM vendor_reg WHERE (v_business_cat LIKE '1,%' OR v_business_cat LIKE '%,1' OR v_business_cat LIKE '1' OR v_business_cat LIKE '%,1,%') AND v_status = '1'  AND v_postal_code_reg = '".$pin_code."' AND is_delete='0'");
        
        $cntgrc = 0;
        if($qrygrc->num_rows()>0)
        {
           foreach($qrygrc->result() as $rowgrc)
           {
              $cntgrc = $rowgrc->cntgroc;
           }
        }
        else
        {
           $cntgrc=0;
        }
        }
        
        $this->db->select('place');
        $this->db->where('pincode',$this->uri->segment('4')); 
        //$this->db->where('v_id',$id);  
        $this->db->limit(1); 
        $this->db->from('pincode_location');
        $qrypl = $this->db->get();
        //echo $this->db->last_query();
        if($qrypl->num_rows()>0)
        {
            $plc  = $qrypl->row();
        	$placeName=$plc->place;
        }
        
        ?>
    				<div class="col-lg-6 col-6">
    					<div class="nearstore">
    						<span class="near_store_pin">Stores near you</span>
    						<span class="outlet"><?=$cntgrc?> outlets</span>
    					</div>
    				</div>
            <div class="col-lg-6 col-6">
              <div class="nearstore" style="text-align: right;">
                <span class="near_store_pin" style="font-size: 16px; font-weight: normal; text-align: right; padding-right: 5px;"><?=$pin_code;?></span>
                <span class="outlet" style="font-size: 16px; font-weight: normal; text-align: right; width: 100%; color:#222222; padding-right: 5px; font-weight: 500;text-transform: capitalize;"><?=$placeName?></span>
              </div>
            </div>
    			</div>
    		</div>
        </div>
	<div class="container">
		<div class="row">
	<?php 
      $html = '';

      if(($cat!='' && $cat!='0') && $pin_code!='')
      {
        $this->db->select('a_cat_name');
        $this->db->where('a_cat_id',$cat);
        $this->db->from('admin_category');
        $qrycatname = $this->db->get();
        if($qrycatname->num_rows() > 0)
        {
          foreach($qrycatname -> result() as $rowcatname)
          {
            $catname = $rowcatname->a_cat_name;
          }
        }
        else
        {
          $catname = '';
        }
        $colmn="v_display_name,v_business_logo,v_business_desc,v_display_image,v_state_province_reg,v_city_reg,v_id, fld_open_time,fld_close_time";
        $qrygrca = $this->db->query("SELECT ".$colmn." FROM vendor_reg WHERE (v_business_cat LIKE '$cat,%' OR v_business_cat LIKE '%,$cat' OR v_business_cat LIKE '$cat' OR v_business_cat LIKE '%,$cat,%') AND v_status = '1' AND v_postal_code_reg = '".$pin_code."' AND is_delete='0'");

// dd($qrygrca->result());

if($qrygrca->num_rows()>0)
{
   foreach($qrygrca->result() as $rowgrca)
   {
      $displaynamea = $rowgrca->v_display_name;
	  $displaystate = $rowgrca->v_state_province_reg;
	  $displaycity = $rowgrca->v_city_reg;
	  $displaydesc = $rowgrca->v_business_desc;
	  
      if($displaynamea==''){ $displaynamea = 'MNM Store'; }
      $displayimagea = $rowgrca->v_display_image;
      $v_business_logo = $rowgrca->v_business_logo;
      
      if($v_business_logo!='')
      {
        $imgpatha = $_SERVER['DOCUMENT_ROOT'].'/'.$v_business_logo;
        if(file_exists($imgpatha))
        {
          $imagepatha  = base_url().$v_business_logo;
        }
        else
        {
          $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
        }
      }
      else
      {
        $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
      }

      $html.='<div class="col-lg-4 col-md-6 col-sm-6 col-6-as col-6">
				<!--item start -->
				<a href="'.base_url().'user/explorestore/'.base64_encode($rowgrca->v_id).'">
			            <div class="items_wrap">
			            	<div class="items_snap"><img src="'.$imagepatha.'" alt="'.$displaynamea.'" class="img-fluid"/></div>
			            	<div class="about_item">
			            		<h4>'.$displaynamea.'</h4>
			            		<span class="location">'.$displaycity.', '.$displaystate.'</span>
			            	</div>
			            </div>
			        </a>
			    <!--end item start --> 
			</div>';	/* <span class="about_stroe">'.((strlen($displaydesc) > 87) ? substr($displaydesc,0,87).'...' : $displaydesc).'</span> */
			}
          }
    
            
      }
      elseif($cat=='0')
      {

    $qrygrca = $this->db->query("SELECT v_display_name,v_business_logo,v_display_image,v_id, fld_open_time,fld_close_time FROM vendor_reg WHERE v_status = '1'  AND v_postal_code_reg = '".$pin_code."' ");
    
    if($qrygrca->num_rows()>0)
    {
       foreach($qrygrca->result() as $rowgrca)
       {
          $displaynamea = $rowgrca->v_display_name;      
          if($displaynamea==''){ $displaynamea = 'MNM Store'; }
          $displayimagea = $rowgrca->v_display_image;
          $v_business_logo = $rowgrca->v_business_logo;
          if($v_business_logo!='')
          {
            $imgpatha = $_SERVER['DOCUMENT_ROOT'].'/'.$v_business_logo;
            if(file_exists($imgpatha))
            {
              $imagepatha  = base_url().$v_business_logo;
            }
            else
            {
              $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
            }
          }
          else
          {
            $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
          }
          
          $html.='<div class="col-lg-4 col-sm-12">
    				<!--item start -->
    				<a href="'.base_url().'user/explorestore/'.base64_encode($rowgrca->v_id).'">
    			            <div class="items_wrap">
    			            	<div class="items_snap"><img src="'.$imagepatha.'" alt="'.$displaynamea.'" class="img-fluid"/></div>
    			            	<div class="about_item">
    			            		<h4>'.$displaynamea.'</h4>
    			            	<!--	<span class="about_stroe">Italian, Pizza, Bakery</span>-->
    			            		<span class="location">'.$rowgrca->v_reg_address1.'</span>
    			            	</div>
    			            </div>
    			        </a>
    			    <!--end item start -->
    			</div>';
       }
    }
   
      }
      else
      {   

$qrygrc = $this->db->query("SELECT v_display_name,v_business_logo,v_display_image,v_id, fld_open_time,fld_close_time FROM vendor_reg WHERE (v_business_cat LIKE '1,%' OR v_business_cat LIKE '%,1' OR v_business_cat LIKE '1' OR v_business_cat LIKE '%,1,%') AND v_status = '1'  AND v_postal_code_reg = '".$pin_code."' ");

$cntgrc = 0;
if($qrygrc->num_rows()>0)
{
   foreach($qrygrc->result() as $rowgrc)
   {
      $cntgrc = $rowgrc->cntgroc;
   }
}
else
{
   $cntgrc=0;
}
   

$qrygrca = $this->db->query("SELECT v_display_name,v_display_image,v_id, fld_open_time,fld_close_time FROM vendor_reg WHERE (v_business_cat LIKE '1,%' OR v_business_cat LIKE '%,1' OR v_business_cat LIKE '1' OR v_business_cat LIKE '%,1,%') AND v_status = '1'  AND v_postal_code_reg = '".$pin_code."' ");
//echo $this->db->last_query();

if($qrygrca->num_rows()>0)
{
   foreach($qrygrca->result() as $rowgrca)
   {
      $displaynamea = $rowgrca->v_display_name;      
      if($displaynamea==''){ $displaynamea = 'MNM Store'; }
      $displayimagea = $rowgrca->v_display_image;
      $v_business_logo = $rowgrca->v_business_logo;
      if($v_business_logo!='')
      {
        $imgpatha = $_SERVER['DOCUMENT_ROOT'].'/'.$v_business_logo;
        if(file_exists($imgpatha))
        {
          $imagepatha  = base_url().$v_business_logo;
        }
        else
        {
          $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
        }
      }
      else
      {
        $imagepatha = base_url().'/assets/website/img/no-product-image-mnm.jpg';
      }
      
      $html.='<div class="col-lg-4 col-sm-12">
				<!--item start -->
				<a href="'.base_url().'user/explorestore/'.base64_encode($rowgrca->v_id).'">
			            <div class="items_wrap">
			            	<div class="items_snap"><img src="'.$imagepatha.'" alt="'.$displaynamea.'" class="img-fluid"/></div>
			            	<div class="about_item">
			            		<h4>'.$displaynamea.'</h4>
			            		<span class="about_stroe">Italian, Pizza, Bakery</span>
			            		<span class="location">Gonda, UP</span>
			            	</div>
			            </div>
			        </a>
			    <!--end item start -->
			</div>';
   }
  }         
    }
      $html.='</div>
   </div>';
      echo $html;
      ?>
			
		</div>
	</div>
	
	<script type="text/javascript">
        function ajaxsearchStore() {
			//alert("store search");
      var input_data = $('#search_data').val();
			var input_cat =<?php echo $cat ?>;
			var input_pin =<?php echo $pin_code ?>;
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {
				
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>website/user/autocompletesearch",
                    data:{search_data:input_data,search_cat:input_cat,search_pin:input_pin},
                    success: function(data) {
                        if (data.length > 0) {
                            $('#suggestions').show();
                             $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data); 					
							//$( "#autoSuggestionsList" ).append(data); 
                        }
                    }
                });

            }
        }
		<!-- -->
		function ajaxsearchMStore() {
			//alert("store search");
            var input_data = $('#searchm_data').val();
			var input_cat =<?php echo $cat ?>;
			var input_pin =<?php echo $pin_code ?>;
            if (input_data.length === 0) {
                $('#suggestionsm').hide();
            } else {
				
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>website/user/autocompletesearch",
                    data:{search_data:input_data,search_cat:input_cat,search_pin:input_pin},
                    success: function(data) {
                        if (data.length > 0) {
                            $('#suggestionsm').show();
                             $('#autoSuggestionsListm').addClass('auto_list');
                             $('#autoSuggestionsListm').html(data); 					
							//$( "#autoSuggestionsList" ).append(data); 
                        }
                    }
                });

            }
        }
</script>