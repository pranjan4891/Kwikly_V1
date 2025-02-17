
          <script type="text/javascript">
          	$(document).ready(function(){
          	});
          	function offersopen(){
          			if($('.offer_wrap').hasClass('close')){
          				$('.offer_wrap').removeClass('close');
          				$('.offer_wrap .offer_view .offertigger').css('padding','5px 20px');
          			}else{
          				$('.offer_wrap').addClass('close');
          				$('.offer_wrap .offer_view .offertigger').css('padding','5px 20px');
          			}
          		}
          </script>
          <div class="offer_wrap close">
          	<a href="javascript:void(0)" class="close_offer" onclick="offersopen()"><img src="assets/website/img/icons/close.svg" alt="Close" class="img-fluid"/></a>
          	<div class="offer_view">
          		<div class="offer_section">
          			<div class="logo_wrap_section"><img src="assets/website/img/web-main/white-logo.png" alt="Logo" class="img-fluid"/></div>
          			<?php 
					$coupondetail = $this->Front_model->getDataById($table='coupons',$colname='coupon_id','1'); 
					$coupon_code=$coupondetail[0]->coupon_code;
					$coupon_percent=$coupondetail[0]->coupon_percent;			
					?>
					<div class="offer_text">
          				<div class="offer_title">GET A <?php //echo$coupon_percent?>% BENEFIT</div>
          				<p>Enjoy a <?php //echo$coupon_percent?>% welcome benefit when you make
						<strong>your first purchase.</strong></p>
						<div class="use_code">
							<p>Use Promo Code</p>
							<span class="code_use"><?php //echo$coupon_code?></span>
						</div>
						<p>You will be subscribed to our newsletter for latest launch updates. Don't worry! We send few, meaningful mails.</p>
						<a href="javascript:void(0)" onclick="offersopen()">No thanks, just take me to the site ></a>
          			</div>
          		</div>
          		<div class="offertigger" onclick="offersopen()" style="padding: 5px 20px;">GET A <?php //echo$coupon_percent?>% OFF</div>
          	</div>
          </div>
            <!-- time location -->
            <div class="container-fluid green-bg d-block d-sm-block d-xl-none d-lg-none">
                <div class="search_wrap">
                    <input type="text" name="search" id="searchm_data" value="" placeholder="Search" onkeyup="ajaxMSearch();">
                    <button><img src="assets/website/img/icons/search.svg" alt="search"></button>
                    <div class="suggestions_input">
                        <div id="suggestionsm">
                                <div id="autoSuggestionsListm"></div>
                        </div>
                	</div>
               </div>
    <!--<div class="container">-->
    <!--    <div class="row">-->
             
    <!--        <div class="col-12">-->
    <!--            <div class="change_pincode">-->
                    <!--<div class="change_code" id="change_code"> -->
                    <!--    <a href="#">Change location</a>-->
                    <!--</div>-->
                    
    <!--            </div>-->
                
    <!--        </div>-->
            
       
    <!--            <div class="col-sm-12 col-lg-8 col-md-8 d-none d-lg-block d-xl-block">-->
    <!--                <div class="products_search">-->
    <!--                    <div class="input_group">-->
                        <!--input type="text" name="search_prd"-->
				<!--		<input type="text" name="search_data" id="search_data" value="" placeholder="Search for Products">-->
    <!--                    <button class="search_btn"><img src="assets/website/img/icons/search.svg" alt="search"/></button>-->
    <!--                    </div>-->
				<!--	</div>-->
    <!--            </div>-->
            
            
            
    <!--        <div class="col-sm-6 col-lg-2 col-6">-->
    <!--            <div class="time_view">-->
    <!--                <div class="clock">-->
    <!--                    <div id="Date-m"></div>-->
    <!--                    <ul>-->
    <!--                        <li id="hours-m"></li>-->
    <!--                        <li id="point">:</li>-->
    <!--                        <li id="min-m"></li>-->
    <!--                        <li id="point">:</li>-->
    <!--                        <li id="sec-m"></li> -->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>	-->
</div>
<!-- end time location -->
<!-- banner -->
<div class="banners owl-carousel owl-theme">
     <?php
	    //var_dump($this->session);die;
        if (!empty($banerlist)) {
            $ban_cnt = 0;
            foreach ($banerlist as $ban) {
                $class = "";
                if ($ban_cnt == 0) {
                    $class = " active";
                } $ban_cnt++;
                $mobile_src = "chef_admin/upload_img/home_page_banner/" . $ban['mobilebanner'];
                $desktop_src = "chef_admin/upload_img/home_page_banner/" . $ban['banner'];
                ?>
    <div class="item">
    	<div class="banner desktop d-none d-md-none d-sm-none d-lg-block d-xl-block">
    		<img srcset="<?php echo $desktop_src; ?>" class="img-fluid" />
    	</div>
    	<div class="banner mobile d-block d-md-block d-sm-block d-lg-none d-xl-none">
    		<img src="<?php echo $mobile_src ?>" class="img-fluid" />
    	</div>
        <!-- <img srcset="<?php echo $mobile_src ?> 1023w, <?php echo $desktop_src; ?> 1024w" class="img-fluid" /> -->
    </div>
    <?php
            }
        }
        ?>
</div>
<!-- end banners -->
<div class="added_item_alert" style="display:none;">
    <div class="item_added">
      <img src="/assets/website/img/cart_added.png" alt="Item added to your cart" title="Item added to your cart"/>
    </div>
    <div class="item_info_added">Item added</div>
  </div>
<!-- time location -->
<div class="container-fluid green-bg d-none d-sm-none d-xl-block d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-2 col-6">
                <div class="change_pincode" style="cursor:pointer">
                    <div class="change_code" id="change_code"> <i class="fa fa-map-marker" style="font-size:20px;color:red;" ></i>&nbsp;
                        Change location
                    </div>
                </div>
                
            </div>
            <div class="col-sm-12 col-lg-8 col-md-8 d-none d-lg-block d-xl-block">
                <div class="products_search">
                    <div class="input_group">
                        <!--input type="text" name="search_prd" laptop-->
                            <input type="text" name="search_data" id="search_datapr" value="" placeholder="Search for Products" onkeyup="ajaxSearchprod();">
<button class="search_btn"><img src="assets/website/img/icons/search.svg" alt="search" /></button>

                      </div>
                      <div class="suggestions_input">
                        <div id="suggestions">
                        <div id="autoSuggestionsList">
                        </div>
                    </div>
					</div>
				</div>
	   
					   
            </div>
            <div class="col-sm-6 col-lg-2 col-6">
                <div class="time_view">
                    <div class="clock">
                        <div id="Date"></div>
                        <ul>
                            <li id="hours"></li>
                            <li id="point">:</li>
                            <li id="min"></li>
                            <li id="point">:</li>
                            <li id="sec"></li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</div>
<!-------------------->

<!-- store end section -->

<!-- Store Menu -->
<div class="container food">
    <div class="row">
        <div class="col-lg-12 menu">
            <div class="menu_title menu_hero">What do you want to shop today?</div>
        </div>
        <?php if ($adminCategory->num_rows() > 0): ?>
            <?php foreach ($adminCategory->result() as $category): ?>
                <?php
                // Determine the image path
                $defaultImage =  'upload_img/category/others.png';
                $categoryImage = !empty($category->a_cat_image) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $category->a_cat_image)
                    ?  $category->a_cat_image
                    : $defaultImage;

                // Determine the link
                $pincode = checkPincode();
                $categoryLink = $pincode 
                    ?  'user/fetchstores/' . $category->a_cat_id . '/' . $pincode
                    : '#';
                $linkClass = $pincode ? '' : 'trigger-location';
                ?>
                <div class="col-lg-2 col-md-4 col-3 mobile-remove-pad">
                    <div class="menu_store">
                        <a href="<?php //echo $categoryLink ?>" class="<?php //echo $linkClass ?>">
                            <div class="menu_icon">
                                <img src="<?php //echo $categoryImage ?>" class="img-fluid" 
                                     alt="<?php //echo htmlspecialchars($category->a_cat_name) ?>" 
                                     title="<?php //echo htmlspecialchars($category->a_cat_name) ?>" />
                            </div>
                            <div class="menu_title_inside menu_hero">
                                <?php //echo ucwords($category->a_cat_name) ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<!--End Category------------------------------------------------->



<?php 
        $pin_code =  checkPincode();
        if ($pin_code != '0' && !empty($pin_code) && $pin_code!='') { 
                $vendorID = array();
                $arr = array();
                $this->db->where('v_postal_code_reg',$pin_code);
                $qty = $this->db->get('vendor_reg');
                if($qty ->num_rows() >0)
                {
                    foreach($qty ->result() as $rows)
                    {
                        $vendorID[] = $rows->v_id;
                    }
                }
                if(count($vendorID) >0)
                {
                    $arr = array_unique($vendorID);
                }
                /*Code for Best Selling Products starts here*/
                $this->db->select('*');
                $this->db->where('best_offers','0');
                $this->db->where('v_product_status','0');
                if(count($arr) >0)
                {
                    $this->db->where_in('v_id',$arr);
                }
                //$this->db->where('product_type','vendor');
                $this->db->from('vendor_product');
                $this->db->order_by('v_product_id','desc');
                $this->db->limit('10');
                $qrywe = $this->db->get();
                //echo $this->db->last_query();
                if($qrywe->num_rows() > 0)
                {
        ?>
        
        <div class="ad-container">
  <div class="custom-store-menu">
    <div class="custom-row">
        <?php 
            if(!empty($papulerDeals)){
            foreach($papulerDeals as $ad){?>
              <div class="custom-col-6 ad">
                  <a href="<?php //echo($ad->deal_link!=0 && $ad->deal_link!='')?$ad->deal_link:'#'?>">
                <img src="<?php //echo $ad->deal_img?>" style="width: 100%;" alt="<?php //echo $ad->deal_name?>">
                </a>
              </div>
            <?php } } 
            ?>
    </div>
  </div>
</div>

   



        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu_title menu_hero">Trending Offers</div>
                </div>
                <div class="offers_section owl-carousel owl-theme d-no d-lg-block d-xl-block">
              <?php 
                   foreach($qrywe -> result() as $rowwe)
                   {
                      $productid = $rowwe->v_product_id;
                      $pvid = $rowwe->v_id;
                      $pname = $rowwe->v_product_name;
                      $mrp = $rowwe->v_product_cost;
                      $sellingprice = $rowwe->v_product_selling_price;
                      $pricesavepercent = $rowwe->v_product_save_percent;
                      $weight = $rowwe->v_product_quantity.' '.$rowwe->v_product_weight;
                      $prodimage = $rowwe->v_product_image;
                      if($prodimage!='')
                      {
                        $prodimgpath = $_SERVER['DOCUMENT_ROOT'].'/'.$prodimage;
                        if(file_exists($prodimgpath))
                        {
                          $imagepath  = '/'.$prodimage;
                        }
                        else
                        {
                          $imagepath = '/assets/website/img/no-product-image-mnm.jpg';
                        }
                      }
                      else
                      {
                        $imagepath = '/assets/website/img/no-product-image-mnm.jpg';
                     }
                      $productslug = $this->Front_model->getproductslug($productid);
                      $inventory_a = $this->Front_model->getInventorybyProductid($productid);
                      $pid= $this->Front_model->getDataById($table = 'product_master', $colname = 'slug', $productslug);
                      $masterpid = $pid[0]->id;
                      //var_dump($)
                      ?>
                    <!--item start -->
                    <div class="item">
                        <div class="product_item">
                            <div class="product_short">
                                <img src="<?php echo $imagepath ?>" alt="Jonsons Baby" title="Jonsons baby">
                                    <?php 
                                    if($inventory_a >0)
                                    {?>
                        <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                <div class="addprodcut_btn">
                    <?php if(!empty($masterpid)) {
                        $xa=0;$xb=0;$xc=0;
                        $mov_pp1='';
                        //customize variant
                        $this->db->select("*");
                        $this->db->from("vendor_product_variant");
                        $this->db->where("v_product_id", $rowwe->v_product_id);
                        $vr1 = $this->db->get();
                        //$this->db->last_query();
                        //$pq=array();
                        if ($vr1->num_rows()>0){
                          foreach ($vr1->result() as $rowv1){
                                                     //echo "inside";
                                $pq1[] = $rowv1->v_product_quantity.$rowv1->v_product_weight;
                              $pw1[] = $rowv1->v_product_weight;
                              $pp1[] = $rowv1->v_product_selling_price;
                              $vpid1[] = $rowv1->vr_id;
                              //print_r($pw1);
                              //print_r($pp1);
                              }
                                   $mov_pq1 = implode(",", $pq1);
                                   $mov_pw1 = implode(",", $pw1);
                                 $mov_pp1 = implode(",", $pp1);
                                 $mov_vrid1 = implode(",", $vpid1);
                                 if($mov_pp1==$sellingprice){
                                   //echo "inside";
                                  $xa=0; 
                                 }else{
                                   $xa=1;
                                 }
                            }
                          /*custom size*/
                        $this->db->select("*");
                        $this->db->from("vendor_variant_size");
                        $this->db->where("v_product_id", $rowwe->v_product_id);
                        $vs = $this->db->get();
                        //echo $this->db->last_query();
                        //$pq=array();
                        if ($vs->num_rows()>0){
                          foreach ($vs->result() as $rowsz){
                                                     //echo "inside cz";
                                                    $szi[] = $rowsz->s_id;                       
                                $szs[] = $rowsz->v_product_size;
                              $szp[] = $rowsz->v_product_sprice;
                              $szv[] = $rowsz->v_product_serve;
                        }
                        }
                          $this->db->select("*");
                        $this->db->from("vendor_variant_extra");
                        $this->db->where("v_product_id", $rowwe->v_product_id);
                        $vr = $this->db->get();
                        //echo $this->db->last_query();
                        //$pq=array();
                        if ($vr->num_rows()>0){
                          foreach ($vr->result() as $rowv){
                                                     //echo "inside custom size"; 
                                                    $xb=1;                       
                                $expn[] = $rowv->v_product_exname;
                              $expp[] = $rowv->v_product_exprice;
                              $exid[] = $rowv->ex_id;
                              }
                                 $cst_pn = implode(",", $expn);
                                 $cst_pp = implode(",", $expp);
                                 $cst_id = implode(",", $exid);
                                 $cst_si = implode(",", $szi);
                                 $cst_ss = implode(",", $szs);
                                 $cst_sp = implode(",", $szp);
                                 $cst_sv = implode(",", $szv);
                        }
                        if($xa==1){
                        ?>  
                        <a class="cus Customizable" href="javascript:void(0)" data-id="<?php //echo$masterpid?>" data-pqq[]="<?php echo '["' . implode('", "', $pq1) . '"]'; ?>" data-vrpid="<?php //echo$mov_vrid1?>" data-pq="<?php //echo$mov_pq1?>" data-pw="<?php //echo$mov_pw1?>" data-pp="<?php //echo$mov_pp1?>" data-desc="<?php echo $desc; ?>" data-wt="<?php echo $weight; ?>" data-imagepath="<?php //echo$imagepath?>" data-pid="<?php //echo$rowwe->v_product_id?>" data-pname="<?php //echo$rowwe->v_product_name?>" data-mrp="<?php echo number_format($mrp,2); ?>" data-sprc="<?php echo number_format($sellingprice,2); ?>" data-userid="<?php echo $userid  ?>" data-vid="<?php echo $rowwe->v_id  ?>" data-ptype="<?php echo $rowwe->product_type  ?>" data-pslug="<?php echo $productslug; ?>" data-actualurl="<?php echo $actual_link; ?>" data-returnurl="store" data-cated="<?php echo $this->uri->segment('3');?>" onclick="customize_process(this)"><i class="fa fa-plus"></i></a>
                            <?php }elseif($xb==1){?>
                        <a class="Customizable cus" href="javascript:void(0)" data-csi="<?php //echo$cst_si?>" data-id="<?php //echo$masterpid?>" data-exid="<?php //echo$cst_id?>" data-pn="<?php //echo$cst_pn?>" data-ss="<?php //echo$cst_ss?>" data-pp="<?php //echo$cst_pp?>" data-sp="<?php //echo$cst_sp?>" data-sv="<?php //echo$cst_sv?>"  data-desc="<?php echo $desc; ?>" data-wt="<?php echo $weight; ?>" data-imagepath="<?php //echo$imagepath?>" data-pid="<?php //echo$rowwe->v_product_id?>" data-pname="<?php //echo$rowwe->v_product_name?>" data-mrp="<?php echo number_format($mrp,2); ?>" data-sprc="<?php echo number_format($sellingprice,2); ?>" data-userid="<?php echo $userid  ?>" data-vid="<?php echo $rowwe->v_id  ?>" data-ptype="<?php echo $rowwe->product_type  ?>" data-pslug="<?php echo $productslug; ?>" data-actualurl="<?php echo $actual_link; ?>" data-returnurl="store" data-cated="<?php echo $this->uri->segment('3');?>" onclick="opencus(this)"><i class="fa fa-plus" style="color: #f15a24;"></i></a>  
                        <?php } elseif($xb==0 && $xa==0){?>
                        <button class="add_cart" data-pid="<?php echo $rowwe->v_product_id  ?>" data-pname="<?php echo $rowwe->v_product_name  ?>" data-pprice="<?php echo $rowwe->v_product_selling_price  ?>" data-userid="<?php echo $userid  ?>" data-vid="<?php echo $rowwe->v_id  ?>" data-ptype="<?php echo $rowwe->product_type  ?>" data-pslug="<?php echo $productslug; ?>" data-actualurl="<?php echo $actual_link; ?>" data-qty="1" data-returnurl="store" data-cated="0"><i class="fa fa-plus"></i></button>
                        <?php }
                        // $pq1[] = '';
                        // $pw1[] = '';
                        // $pp1[] = '';
                        // $vpid1[] = ''; 
                      }
                      ?>
                      </div>
                                 <?php } else {?>
                                  <div class="outofstock">
                                    <p>Out of Stock</p>
                                  </div>
        					<!-- <div class="addprodcut_btn">
                                        <a href="javascript:void(0)" class="outstock" alt="Out of Stock" title="Out of Stock"><i class="fa fa-plus"></i></a>
                                    </div> -->
                            <?php }?>					
                                </div>
                            <div class="price_of_products">
                                <div class="original_price"><?php echo number_format($mrp,2); ?></div>
                                <div class="selling_price"><?php echo number_format($sellingprice,2); ?></div>
                            </div>
                            <div class="products_title"><?php echo $pname; ?></div>
                            <div class="qnty"><?php echo $weight; ?></div>
                            <!-- <div class="product_decscribe">A Taste of Thai Rice Noodles Straight Cut</div> -->
                            <!--div class="Customizable"><span class="cus">Customizable</span></div-->
                        </div>
                    </div>
                    <!--end item start -->
                    <?php
                       }
                    }
                    /*Code for Best Selling Products ends here*/
                    ?>
                </div>
            </div>
        </div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="menu_title menu_hero">Top Selling Products</div>
        </div>
        <div class="offers_section owl-carousel owl-theme d-no d-lg-block d-xl-block">
            <?php 
                /*Code for Top Selling products starts here*/
                $this->db->select('*');
                $this->db->where('top_selling','0');
                $this->db->where('v_product_status','0');
                if(count($arr) >0)
                {
                    $this->db->where_in('v_id',$arr);
                }
                //$this->db->where('product_type','vendor');
                $this->db->from('vendor_product');
                $this->db->order_by('v_product_id','desc');
                $this->db->limit('10');
                $qrywef = $this->db->get();
                //echo $this->db->last_query();
                if($qrywef->num_rows() > 0)
                {
                   foreach($qrywef -> result() as $rowwef)
                   {
                      $productid = $rowwef->v_product_id;
                      $pvid = $rowwef->v_id;
                      $pname = $rowwef->v_product_name;
                      $mrp = $rowwef->v_product_cost;
                      $sellingprice = $rowwef->v_product_selling_price;
                      $pricesavepercent = $rowwef->v_product_save_percent;
                      $weight = $rowwef->v_product_quantity.' '.$rowwef->v_product_weight;
                      $prodimage = $rowwef->v_product_image;
                      if($prodimage!='')
                      {
                        $prodimgpath = $_SERVER['DOCUMENT_ROOT'].'/'.$prodimage;
                        
                        if(file_exists($prodimgpath))
                        {
                          $imagepath  = '/'.$prodimage;
                        }
                        else
                        {
                          $imagepath = '/assets/website/img/no-product-image-mnm.jpg';
                        }
                      }
                      else
                      {
                        $imagepath = '/assets/website/img/no-product-image-mnm.jpg';
                      }
                      $productslug = $this->Front_model->getproductslug($productid);
                      $inventory = $this->Front_model->getInventorybyProductid($rowwef->v_product_id);
                      ?>
            <!--item start -->
            <div class="item">
                <div class="product_item">
                    <div class="product_short">
                        <img src="<?php echo $imagepath ?>" alt="Jonsons Baby" title="Jonsons baby">
                      
                            <!-- <a href="#"><i class="fa fa-plus"></i></a> -->                            
                            <?php 
                            if($inventory_a >0)
                            {?>
                        
                <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
             
        <div class="addprodcut_btn">
            <?php if(!empty($masterpid)) {
                $xa=0;$xb=0;$xc=0;
                $mov_pp1='';
                //customize variant
                $this->db->select("*");
                $this->db->from("vendor_product_variant");
                $this->db->where("v_product_id", $rowwe->v_product_id);
                $vr1 = $this->db->get();
                //$this->db->last_query();
                //$pq=array();
                if ($vr1->num_rows()>0){
                  foreach ($vr1->result() as $rowv1){
                                             //echo "inside";
                                                                   
                        $pq1[] = $rowv1->v_product_quantity.$rowv1->v_product_weight;
                      $pw1[] = $rowv1->v_product_weight;
                      $pp1[] = $rowv1->v_product_selling_price;
                      $vpid1[] = $rowv1->vr_id;
                      //print_r($pw1);
                      //print_r($pp1);
                      }
                           $mov_pq1 = implode(",", $pq1);
                           $mov_pw1 = implode(",", $pw1);
                         $mov_pp1 = implode(",", $pp1);
                         $mov_vrid1 = implode(",", $vpid1);
                         if($mov_pp1==$sellingprice){
                           //echo "inside";
                          $xa=0; 
                         }else{
                           $xa=1;
                         }
                    }
                  /*custom size*/
                $this->db->select("*");
                $this->db->from("vendor_variant_size");
                $this->db->where("v_product_id", $rowwe->v_product_id);
                $vs = $this->db->get();
                //echo $this->db->last_query();
                //$pq=array();
                if ($vs->num_rows()>0){
                  foreach ($vs->result() as $rowsz){
                                             //echo "inside cz";
                       
                                            $szi[] = $rowsz->s_id;                       
                        $szs[] = $rowsz->v_product_size;
                      $szp[] = $rowsz->v_product_sprice;
                      $szv[] = $rowsz->v_product_serve;
                }
                }
              
                 $this->db->select("*");
                $this->db->from("vendor_variant_extra");
                $this->db->where("v_product_id", $rowwe->v_product_id);
                $vr = $this->db->get();
                //echo $this->db->last_query();
                //$pq=array();
                if ($vr->num_rows()>0){
                  foreach ($vr->result() as $rowv){
                                             //echo "inside custom size"; 
                                            $xb=1;                       
                        $expn[] = $rowv->v_product_exname;
                      $expp[] = $rowv->v_product_exprice;
                      $exid[] = $rowv->ex_id;
                      }
                         $cst_pn = implode(",", $expn);
                         $cst_pp = implode(",", $expp);
                         $cst_id = implode(",", $exid);
                         $cst_si = implode(",", $szi);
                         $cst_ss = implode(",", $szs);
                         $cst_sp = implode(",", $szp);
                         $cst_sv = implode(",", $szv);
                }
                if($xa==1){
                ?>  
                <a class="cus Customizable" href="javascript:void(0)" data-id="<?php //echo$masterpid?>" data-pqq[]="<?php echo '["' . implode('", "', $pq1) . '"]'; ?>" data-vrpid="<?php //echo$mov_vrid1?>" data-pq="<?php //echo$mov_pq1?>" data-pw="<?php //echo$mov_pw1?>" data-pp="<?php //echo$mov_pp1?>" data-desc="<?php echo $desc; ?>" data-wt="<?php echo $weight; ?>" data-imagepath="<?php //echo$imagepath?>" data-pid="<?php //echo$rowwe->v_product_id?>" data-pname="<?php //echo$rowwe->v_product_name?>" data-mrp="<?php echo number_format($mrp,2); ?>" data-sprc="<?php echo number_format($sellingprice,2); ?>" data-userid="<?php echo $userid  ?>" data-vid="<?php echo $rowwe->v_id  ?>" data-ptype="<?php echo $rowwe->product_type  ?>" data-pslug="<?php echo $productslug; ?>" data-actualurl="<?php echo $actual_link; ?>" data-returnurl="store" data-cated="<?php echo $this->uri->segment('3');?>" onclick="customize_process(this)"><i class="fa fa-plus"></i></a>
                    <?php }elseif($xb==1){?>
                <a class="Customizable cus" href="javascript:void(0)" data-csi="<?php //echo$cst_si?>" data-id="<?php //echo$masterpid?>" data-exid="<?php //echo$cst_id?>" data-pn="<?php //echo$cst_pn?>" data-ss="<?php //echo$cst_ss?>" data-pp="<?php //echo$cst_pp?>" data-sp="<?php //echo$cst_sp?>" data-sv="<?php //echo$cst_sv?>"  data-desc="<?php echo $desc; ?>" data-wt="<?php echo $weight; ?>" data-imagepath="<?php //echo$imagepath?>" data-pid="<?php //echo$rowwe->v_product_id?>" data-pname="<?php //echo$rowwe->v_product_name?>" data-mrp="<?php echo number_format($mrp,2); ?>" data-sprc="<?php echo number_format($sellingprice,2); ?>" data-userid="<?php echo $userid  ?>" data-vid="<?php echo $rowwe->v_id  ?>" data-ptype="<?php echo $rowwe->product_type  ?>" data-pslug="<?php echo $productslug; ?>" data-actualurl="<?php echo $actual_link; ?>" data-returnurl="store" data-cated="<?php echo $this->uri->segment('3');?>" onclick="opencus(this)"><i class="fa fa-plus" style="color: #f15a24;"></i></a>  
                <?php } elseif($xb==0 && $xa==0){?>
                <button class="add_cart" data-pid="<?php echo $rowwe->v_product_id  ?>" data-pname="<?php echo $rowwe->v_product_name  ?>" data-pprice="<?php echo $rowwe->v_product_selling_price  ?>" data-userid="<?php echo $userid  ?>" data-vid="<?php echo $rowwe->v_id  ?>" data-ptype="<?php echo $rowwe->product_type  ?>" data-pslug="<?php echo $productslug; ?>" data-actualurl="<?php echo $actual_link; ?>" data-qty="1" data-returnurl="store" data-cated="0"><i class="fa fa-plus"></i></button>
                <?php }
                // $pq1[] = '';
                // $pw1[] = '';
                // $pp1[] = '';
                // $vpid1[] = ''; 
              }
              ?>
              </div>
                         
                         <?php } else {?>
                          <div class="outofstock">
                            <p>Out of Stock</p>
                          </div>
				  <!-- <div class="addprodcut_btn">
				  <a href="javascript:void(0)" class="outstock" alt="Out of Stock" title="Out of Stock"><i class="fa fa-plus"></i></a>
				  </div> -->
				  <?php }?>
                        </div>
                    <div class="price_of_products">
                        <div class="original_price"><?php echo number_format($sellingprice,2); ?></div>
                        <div class="selling_price"><?php echo number_format($mrp,2); ?></div>
                    </div>
                    <div class="products_title"><?php echo $pname; ?></div>
                    <div class="qnty"><?php echo $weight; ?></div>
                    <!--div class="product_decscribe">A Taste of Thai Rice Noodles Straight Cut</div-->
                    
                </div>
            </div>
            <!--end item start -->
            <?php
               }
            }
            /*Code top-selling products ends here*/
            ?>
        </div>
        
        
        
    </div>
</div>
<?php } ?>
 
 
 
 
 
<!-- end store menu -->
<style>
/*ul#ui-id-1 {*/
/*	position: fixed !important;*/
/*	top: 49.5% !important;*/
/*	left: 33.7% !important;*/
/*	z-index: 999999999 !important;*/
/*	background: #fff;*/
/*	margin: 0;*/
/*	padding: 0;*/
/*	width: auto !important;*/
/*	max-width: 400px;*/
/*	border: solid 1px #eaeaea;*/
/*}*/
/*ul#ui-id-1 li {*/
/*	list-style: none;*/
/*	padding: 5px 30px;*/
/*	border-bottom: solid 1px #eaeaea;*/
/*	color: #222;*/
/*	cursor: pointer;*/
/*	font-size: 13px;*/
/*	position: relative;*/
/*}*/
/*ul#ui-id-1 li div::before {*/
/*	content: '\f041';*/
/*	position: absolute;*/
/*	left: 11px;*/
/*	color: #28a745;*/
/*	font-family: fontAwesome;*/
/*	font-size: 16px;*/
/*	top: 2px;*/
/*	height: 100%;*/
/*}*/
/*@media (max-width: 530px){*/
/*	ul#ui-id-1 {*/
/*	left: 12.8% !important;*/
/*}*/
/*}*/
</style>
<script>
    function ajaxSearchprod() {
    var input_data = $('#search_datapr').val();
    if (input_data.length === 0) {
      $('#suggestions').hide();
    } else {
      $.ajax({
        type: "POST",
        url: "website/user/autocomplete",
        data: {
          search_data: input_data
        },
        success: function(data) {
          // return success
          //console.log(data);
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
  
$(document).ready(function () {
  $("#search_data").keyup(function () {
    var input_data = $("#search_data").val().trim();
    // Check if input is empty
    if (input_data === "") {
      $("#suggestions").hide();
    } else {
      $.ajax({
        type: "POST",
        url: "website/user/autocomplete",
        data: { search_data: input_data },
        dataType: "html",
        success: function (data) {
          console.log("Response Data:", data); // Debugging
          if (data.trim().length > 0) {
            $("#suggestions").show();
            $("#autoSuggestionsList").html(data);
          } else {
            $("#suggestions").hide();
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", error); // Debugging
          console.log("Status:", status);
          console.log("XHR Response:", xhr.responseText);
        },
      });
    }
  });

  // Hide suggestions on click outside
  $(document).on("click", function (e) {
    if (!$(e.target).closest(".products_search").length) {
      $("#suggestions").hide();
    }
  });

    


        //   $("#search_data").keyup(function () {
        //         var input_data = $('#search_data').val().trim();
        //         if (input_data === '') {
        //             $('#suggestions').hide();
        //         } else {
        //             $.ajax({
        //                 type: "POST",
        //                 url: "website/user/autocomplete",
        //                 data: { search_data: input_data },
        //                 dataType: "html",
        //                 success: function (data) {
        //                     // Handle the response
        //                     if (data.trim().length > 0) {
        //                         $('#suggestions').show();
        //                         $('#autoSuggestionsList').html(data); 
        //                         $('#autoSuggestionsList').addClass('auto_list'); 
        //                     } else {
        //                         $('#suggestions').hide();
        //                     }
        //                 },
        //                 error: function (xhr, status, error) {
        //                     console.error("AJAX Error:", error); 
        //                 }
        //             });
        //         }
        //     });
			   /*mobile search*/
			   $("#searchm_data").keyup(function(){
                    var input_data = $('#searchm_data').val();
                    if (input_data.length === 0) {
                        $('#suggestionsm').hide();
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "website/user/autocomplete",
                            data:{search_data:input_data},
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
			   });   
         });
		/*function ajaxMSearch() {
            var input_data = $('#searchm_data').val();
            if (input_data.length === 0) {
                $('#suggestionsm').hide();
            } else {
                //var post_data = { 'search_data': input_data, }; 
				//console.log(post_data);
                $.ajax({
                    type: "POST",
                    url: "<?php //echobase_url(); ?>user/autocomplete",
                    data:{search_data:input_data},
                    success: function(data) {
                        // return success
						//console.log(data);
                        if (data.length > 0) {
                            $('#suggestionsm').show();
                             $('#autoSuggestionsListm').addClass('auto_list');
                            $('#autoSuggestionsListm').html(data); 					
							//$( "#autoSuggestionsList" ).append(data); 
                        }
                    }
                });
            }
        }*/
        $(document).ready(function(){
        $('.add_cart').click(function(){
            var pid    = $(this).data("pid");
            var pname  = $(this).data("pname");
            var pprice = $(this).data("pprice");
            var userid = $(this).data("userid");
            var vid    = $(this).data("vid");
            var ptype  = $(this).data("ptype");
            var pslug  = $(this).data("pslug");
            var actualurl  = $(this).data("actualurl");
            var type  = 'type';
            // var qty    = $(this).data("qty");
            var qty    = 1;
            var returnurl  = $(this).data("returnurl");
            var cated  = $(this).data("cated");
            //alert("pid:"+pid+"pname:"+pname+"pprice:"+pprice+"userid:"+userid+"vid:"+vid+"ptype:"+ptype+"pslug:"+pslug+"actualurl:"+actualurl+"qty:"+qty+"returnurl:"+returnurl+"cated:"+cated);
            //var quantity      = $('#' + product_id).val();
            $.ajax({
                url : "website/user/addtocart",
                method : "POST",
                data : {pid: pid, pname: pname, pprice: pprice, qty: qty, userid: userid, vid: vid, ptype: ptype, pslug: pslug, actualurl: actualurl, returnurl: returnurl, cated: cated,ptype:type},
                success: function(data){
                $('#valuecart').load("user/cart_cnt");
                $('#detail_cart').load("user/load_cart");
                $('#valuecartm').load("user/cart_cntm");
                //$('#detail_cartm').load("user/load_cart");
                $('#detail_cartm').load("user/load_cartm");
                //$('.item_added').show();
                //$(".added_item_alert").show(); 
                $(".added_item_alert").fadeIn(1000,function(){
                $(".added_item_alert").fadeOut();
                 });        
                }
            });
        });
        //$('#detail_cart').load("user/index");
    // $('.products_search_view').hide();    
    // $('.search_section .search').attr('onclick','opensearch_ash()');
    });
</script>

<script>
       $(document).on('click', '.trigger-location', function (e) {
        e.preventDefault(); 
        $('.ask_location').addClass('showlocation').show();
    });
</script>