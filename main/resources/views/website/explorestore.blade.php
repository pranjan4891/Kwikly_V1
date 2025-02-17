

<style type="text/css">
  .sticky-located {
    top: 78px;
  }

  .sticky-menu {
    position: sticky;
    top: 136px;
    z-index: 1;
    background: #f15a24;
  }

  .sticky-menu .store_menu_wrap li a {
    font-size: 16px;
  }

  .item {
    margin: 0;
    height: 100%;
  }

  .store_profile_pics .online_visible {

    z-index: 1 !important;
  }

  .sticky-location {

    z-index: 2 !important;
  }

  .added_item_alert {
    max-width: 200px;
    height: auto;
    background: rgba(255, 255, 255, 0.77);
    top: 50%;
    left: 50%;
    z-index: 99999;
    padding: 15px;
    border: solid 2px #f15a245c;
    transform: translate(-50%, -50%);
    position: fixed;
  }

  .added_item_alert .item_added {
    max-width: 150px;
    margin: 0 auto;
    padding: 15px;
  }

  .added_item_alert .item_added img {
    max-width: 100%;
  }

  .added_item_alert .item_info_added {
    font-size: 24px;
    font-weight: bold;
    color: #f15a24;
    text-transform: capitalize;
    text-align: center;
  }

  @media (max-width: 992px) {
    .sticky-located {
      top: 60px;
    }

    .sticky-menu {
      top: 123px;
    }
  }

  @media (max-width: 768px) {
    .sticky-located {
      top: 60px;
    }

    .sticky-menu,
    .menu_store_section {
      top: 116px;
      background: #39a003;
    }

    .item {
      margin: 5px 0;
      height: 100%;
    }

    .breadcums {
      padding: 0;
      height: 56px;
      display: inline-flex;
      align-items: center;
    }
  }
</style>
<?php
if ($this->uri->segment('3') == '') {
  redirect(base_url() . '/user/store');
  $id = '';
} else {
  $id = base64_decode($this->uri->segment('3'));
  $vendordetails = $this->Front_model->getDataById($table = 'vendor_reg', $colname = 'v_id', $id);
  $storetime = $this->Front_model->getDataById($table = 'vendor_store_time', $colname = 'vendor_id', $id);
  //var_dump($vendordetails);
  $storename = $vendordetails[0]->v_display_name;
  $serviceoffered = $vendordetails[0]->v_service_offered;
  $desciption = $vendordetails[0]->v_business_desc;
  $displayimagea = $vendordetails[0]->v_business_logo;

  if ($displayimagea != '') {
    $imgpatha = $_SERVER['DOCUMENT_ROOT'] . '/' . $displayimagea;
    if (file_exists($imgpatha)) {
      $imagepatha  = base_url() . '/' . $displayimagea;
    } else {
      $imagepatha = base_url() . '/assets/website/img/no-product-image-mnm.jpg';
    }
  } else {
    $imagepatha = base_url() . '/assets/website/img/no-product-image-mnm.jpg';
  }

  $otime = $vendordetails[0]->fld_open_time;
  $ctime = $vendordetails[0]->fld_close_time;
}
?>
<div class="container-fluid store_profile">
  <div class="row">
    <!-- <div class="info_wrap"></div> -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-4">
          <div class="store_profile_pics">
            <img src="<?php echo $imagepatha; ?>" alt="<?php echo $storename; ?>" title="Store Logo">
            <div class="online_visible">
              <div class="red_color" style="display: none;"></div>
              <div class="green_color"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-8">
          <div class="row" style="height: 100%;">
            <div class="col-lg-12 col-sm-12 infomation">
              <div class="store_info">
                <div class="store_title"><?php echo $storename; ?></div>
                <div class="store_about"><?php echo $desciption; ?></div>

                <div class="timing-shop">
                  <div class="servies_timing">
                    <?php

                    //var_dump($storetime);
                    $tomorrow = date("l", strtotime("+1 day"));
                    $tomorrowTime = "";
                    $tomorrowMsg = "";
                    //echo $curtime = date('G:i a');
                    //echo date("G:i", strtotime($time));
                    $curtime = strtotime(date("h:i a"));

                    /*08-28-2020*/
                    $tDay = date("l");
                    $storetimen = $this->Front_model->getDataBy2Id($table = 'vendor_store_time', $colname = 'vendor_id', $colname2 = 'day', $id, $tDay);
                    //var_dump($storetimen); 

                    if ($storetimen[0]->day) {
                      foreach ($storetimen as $strtime) {
                        $storeDay = $strtime->day;

                        //$otiming=strtotime(date("h:i a", strtotime($strtime->toTime)));
                        // $ctiming=strtotime(date("h:i a", strtotime($strtime->endTime))); 
                        if (date("l") == $storeDay && $strtime->status == '1' && $otiming < $curtime && $ctiming < $curtime) {
                          //condition apply
                          $otiming = strtotime(date("h:i a", strtotime($strtime->toTime)));
                          $ctiming = strtotime(date("h:i a", strtotime($strtime->endTime)));
                          //echo "Current Time: ".strtotime($curtime)." Opening time: ".strtotime($otiming)." Closing Time: ".strtotime($ctiming);
                          /*if($otiming < $curtime){
										 echo "inside loop";
									 }*/
                          if ($otiming < $curtime && $ctiming > $curtime) {
                            $startTime = $strtime->toTime;
                            //echo date("h:i a", strtotime($startTime));

                            $endTime = ' To ' . $strtime->endTime;
                            $storeOpen = '';
                            //echo $storeDay .' '. $storeOpen. $startTime.$endTime;
                            $Msg = $storeDay . ' ' . $storeOpen . $startTime . $endTime;
                          } else if ($otiming < $curtime && $ctiming < $curtime) {
                            /*
										$startTime =  $strtime->toTime; 
										$endTime = '' ;
										$storeOpen = '<span class="closed_timing">Closed Now</span><br> Opening Tomorrow At ';
										$closTodayFlag =true;
										//echo $storeDay .' '. $storeOpen. $startTime.$endTime;
										//$closTomorrowFlag=false;
										$Msg=$storeDay .' '. $storeOpen. $startTime.$endTime;
										*/
                            //echo "inside tomorrow loop ";
                            //echo $tDay;
                            //echo $storeDay;
                            $add_day = 0;
                            for ($i = 0; $i < 7; $i++) {
                              $add_day++;
                              //echo $tomorrow = date("l", strtotime("+1 day"));
                              $new_date = date("l", strtotime("+$add_day Days"));
                              if ($new_date != $storeDay) {
                                //echo "inside condition ";    

                                $day = date("l", strtotime("+$add_day Days"));
                                $storetimes = $this->Front_model->getDataBy2Id($table = 'vendor_store_time', $colname = 'vendor_id', $colname2 = 'day', $id, $day);
                                if (!empty($storetimes[0]->toTime)) {
                                  //echo "inside tomorrow";
                                  //echo $storetime[$i]->status;
                                  $tomorrowTime = $storetimes[0]->toTime;
                                  $Msg = '<span class="closed_timing">Closed Today</span><br> Opening On ' . $day . ' at ' . $tomorrowTime;
                                  //$closTomorrowFlag=true;
                                  $closTodayFlag = true;
                                  break;
                                } else {
                                  //$add_day++;   
                                }
                              }
                            }
                          } else {

                            $startTime =  $strtime->toTime;
                            $endTime = '';
                            $storeOpen = 'Closed Now</span> <span class="open_timing"> Opening Today At';
                            $closTodayFlag = true;
                            //echo $storeDay .' '. $storeOpen. $startTime.$endTime;
                            //$closTomorrowFlag=false;
                            $Msg = '<span class="closed_timing">' . $storeDay . ' ' . $storeOpen . ' ' . $startTime . ' ' . $endTime . '</span>';
                          }
                        } else {
                          //echo "inside tomorrow loop ";
                          //echo $tDay;
                          //echo $storeDay;
                          $add_day = 0;
                          for ($i = 0; $i < 7; $i++) {
                            $add_day++;
                            //echo $tomorrow = date("l", strtotime("+1 day"));
                            $new_date = date("l", strtotime("+$add_day Days"));
                            if ($new_date != $storeDay) {
                              //echo "inside condition ";    

                              $day = date("l", strtotime("+$add_day Days"));
                              $storetimes = $this->Front_model->getDataBy2Id($table = 'vendor_store_time', $colname = 'vendor_id', $colname2 = 'day', $id, $day);
                              if (!empty($storetimes[0]->toTime)) {
                                //echo "inside tomorrow";
                                //echo $storetime[$i]->status;
                                $tomorrowTime = $storetimes[0]->toTime;
                                $Msg = '<span class="closed_timing">Closed Today</span> <span class="open_timing"> Opening On ' . $day . ' at ' . $tomorrowTime . '</span>';
                                //$closTomorrowFlag=true;
                                $closTodayFlag = true;
                                break;
                              } else {
                                //$add_day++;   
                              }
                            }
                          }
                        }
                        //if($strtime->status=='1')
                        echo $Msg;
                      }
                    } else {
                      echo '9:30 AM to 10:00 PM';
                    } ?>



                  </div>
                  <!-- <div class="servies_offer">Service Offered : <//?php if($serviceoffered=='0'){ echo 'Pickup'; }
                          elseif($serviceoffered=='1'){ echo 'Delivery'; }
                          elseif($serviceoffered=='2'){ echo 'Delivery/ Pickup'; } ?></div> -->
                  <!-- <div class="availabilit_info_timing"></?php 
                    if($otime!='' && $ctime!='')
                    {
                      $slotopendetails = $this->Front_model->getDataById($table='delivery_time_slot',$colname='fld_id',$otime);                      
                      $otiming = $slotopendetails[0]->fld_otime;
                      $slotclosedetails = $this->Front_model->getDataById($table='delivery_time_slot',$colname='fld_id',$ctime);                      
                      $ctiming = $slotclosedetails[0]->fld_ctime;
                      $curtime = date('G');
                      if($otiming < $curtime && $ctiming > $curtime)
                      {
                        $availtype = 'Open Now';
                      }
                      else
                      {
                        $availtype = 'Close Now';
                      }
                    }
                    else
                    {
                      $availtype = 'Not Available';
                    }
                    echo 'Availability : '.$availtype;
                    ?></div> -->
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-sm-12 infomation mobile" style="display: none;">
              <!-- <div class="availabilit_info"></?php 
                    if($otime!='' && $ctime!='')
                    {
                      $slotopendetails = $this->Front_model->getDataById($table='delivery_time_slot',$colname='fld_id',$otime);                      
                      $otiming = $slotopendetails[0]->fld_otime;
                      $slotclosedetails = $this->Front_model->getDataById($table='delivery_time_slot',$colname='fld_id',$ctime);                      
                      $ctiming = $slotclosedetails[0]->fld_ctime;
                      $curtime = date('G');
                      if($otiming < $curtime && $ctiming > $curtime)
                      {
                        $availtype = 'Open Now';
                      }
                      else
                      {
                        $availtype = 'Close Now';
                      }
                    }
                    else
                    {
                      $availtype = 'Not Available';
                    }
                    echo 'Availability : '.$availtype;
                    ?></div>  -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="added_item_alert" style="display:none;">
  <div class="item_added">
    <img src="<?php echo base_url() ?>/assets/website/img/cart_added.png" alt="Item added to your cart" title="Item added to your cart" />
  </div>
  <div class="item_info_added">Item added</div>
</div>
<div class="container-fluid white-bg sticky-location d-block d-lg-block d-xl-block">
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="search_wrap" style="display: none;">
          <!--input type="text" name="search" placeholder="Search for products"-->
          <input type="text" name="search_data" id="search_data" value="" placeholder="Search for a Product" onkeyup="ajaxSearchprod111();">
        </div>
        <div class="col-lg-6 col-12">
          <div class="breadcums d-lg-block">
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a><span>/</span></li>
              <!--li><a href="<?php echo base_url('user/index'); ?>">Store</a><span>/</span></li-->
              <li><a href="<?php echo base_url() . 'user/fetchstores/1/' . $pin_code; ?>">Store</a><span>/</span></li>
              <li><a href="<?php echo base_url() . 'user/explorestore/' . $this->uri->segment('3'); ?>"><?php echo $storename; ?></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="products_search_view d-lg-block">
            <div class="form_group">
              <!--input type="text" name="search"-->
              <input type="text" name="search_data" id="search_datad" placeholder="Search for a Product" onkeyup="ajaxSearchprod();">
              <button><img src="<?php echo base_url() ?>assets/website/img/icons/search.svg" alt="search" /></button>
            </div>
            <div id="suggestions">
              <div id="autoSuggestionsList">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid menu_store_section">
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="owl-carousel owl-theme menu_wrap">
          <?php
          $urls = array();

          $i = 1;
          foreach ($catvsubcat as $value) {

            //echo '<pre>';
            //print_r($value);
            if (isset($value->children)) {
          ?>
              <?php

              foreach ($value->children as $child) {
                //echo 'id='.$value->v_cat_id.'&ptype=vendor&storeid='.$id;
                $urls[] = base64_encode('id=' . $value->v_cat_id . '&ptype=vendor&storeid=' . $id);
              ?>
                <div class="item"><a href="#cat_<?php echo $i ?>"><?php echo $child->v_subcat_name ?></a></div>
                <!-- <li><a class="link-main2" href="<?php echo base_url() ?>user/productlisting/<?php echo $urly; ?>#<?php $myvalue = $child->v_subcat_name;
                                                                                                                      $arr = explode(' ', trim($myvalue));
                                                                                                                      $arr[0];
                                                                                                                      echo $string = preg_replace("/[^a-zA-Z]+/", "", $myvalue); ?>"><?php echo $child->v_subcat_name ?></a></li> -->

              <?php $i++;
              }  ?>

          <?php }
          }  ?>

        </div>

      </div>
      <style type="text/css">
        /*Owl Menu*/
        .owl-nav .owl-prev.disabled,
        .owl-nav .owl-next.disabled {
          opacity: 0;
        }

        .owl-nav .owl-prev {
          float: left;
          margin-left: -50px !important;
        }

        .owl-nav .owl-next {
          float: right;
          margin-right: -50px !important;
        }

        .owl-nav button div img {
          max-width: 100%;
          padding: 4px;
        }

        .owl-nav button div {
          padding: 3px;
          margin-top: -3px;
        }

        .owl-nav button {
          background: transparent !important;
          outline: none;
        }

        .owl-carousel .owl-stage-outer .owl-item .item {
          padding: 0 10px;
          margin: 10px 0;
          display: block;
          text-align: center;
        }

        .owl-carousel .owl-stage-outer .owl-item .item a {
          color: #fff;
          font-size: 15px;
          font-weight: 700;
          letter-spacing: 0px;
        }
         .menu_wrap .item a.active {
             
             border-bottom:2px solid green;
    color: black !important;
    font-weight: bold;
  }

        @media (max-width: 767px) {
          .slider_menu .owl-carousel {
            height: 44px;
          }
        }
      </style>
<script>
  $(document).ready(function() {
    // Initialize Owl Carousel
    $('.menu_wrap').owlCarousel({
      loop: false,
      margin: 10,
      responsiveClass: true,
      autoWidth: true,
      responsive: {
        0: {
          items: 3,
          nav: false
        },
        600: {
          items: 4,
          nav: false
        },
        1000: {
          navText: ["<div class='nav-btn prev-slide'><img src='<?php echo base_url(); ?>/assets/website/img/back.svg' alt='svg'></div>", "<div class='nav-btn next-slide'><img src='<?php echo base_url(); ?>/assets/website/img/next.svg' alt='svg'></div>"],
          items: 6,
          nav: true,
          dots: false,
          autoWidth: true,
          loop: false,
          margin: 10
        }
      }
    });

    // Handle click on items
    $('.menu_wrap .item a').on('click', function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Remove 'active' class from all items
      $('.menu_wrap .item a').removeClass('active');

      // Add 'active' class to the clicked item
      $(this).addClass('active');
    });
  });
</script>
    </div>
    <!--<ul class="store_menu_wrap">
                    <?php
                    $urls = array();

                    $i = 1;
                    foreach ($catvsubcat as $value) {

                      //echo '<pre>';
                      //print_r($value);
                      if (isset($value->children)) {
                    ?>           
                     <?php

                        foreach ($value->children as $child) {
                          //echo 'id='.$value->v_cat_id.'&ptype=vendor&storeid='.$id;
                          $urls[] = base64_encode('id=' . $value->v_cat_id . '&ptype=vendor&storeid=' . $id);
                      ?>
                              <li><a href="#cat_<?php echo $i ?>"><?php echo $child->v_subcat_name ?></a></li>                          
                           <-- <li><a class="link-main2" href="<?php echo base_url() ?>user/productlisting/<?php echo $urly; ?>#<?php $myvalue = $child->v_subcat_name;
                                                                                                                                $arr = explode(' ', trim($myvalue));
                                                                                                                                $arr[0];
                                                                                                                                echo $string = preg_replace("/[^a-zA-Z]+/", "", $myvalue); ?>"><?php echo $child->v_subcat_name ?></a></li> -->

    <!-- <?php $i++;
                        }  ?> 

                    <?php }
                    }  ?> --
                    </ul>-->
  </div>
</div>
</div>
</div>

<?php
$urls = array_unique($urls);

$j = 1;
if (!empty($urls)) {
  foreach ($urls as $url) {
    $uri = base64_decode($url);
    $urie = explode("&", $uri);
    $uriea = explode("=", $urie['0']);
    $catid = $uriea['1'];
    $urieb = explode("=", $urie['1']);
    $ptype = $urieb['1'];
    $uriec = explode("=", $urie['2']);
    $storeid = $uriec['1'];
    $this->db->select('*');
    $this->db->where('v_cat_id', $catid);
    $this->db->from('vendor_subcategory');
    $qrysc = $this->db->get();
    if ($qrysc->num_rows() > 0) {
      foreach ($qrysc->result() as $rowsc) {
?>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="title_products" id="cat_<?php echo $j; ?>"><?php echo $rowsc->v_subcat_name; ?></div>
            </div>
            <?php
            $sellingprice = 0;
            $this->db->select("*");
            $this->db->from("vendor_product");
            $this->db->where("v_cat_id", $catid);
            $this->db->where("v_subcat_id", $rowsc->v_subcat_id);
            $this->db->where("v_product_status", '0');
            $this->db->where("product_type", $ptype);
            $q = $this->db->get();
            //echo $this->db->last_query();
            if ($q->num_rows() > 0) {

              foreach ($q->result() as $rowwe) {

                $pq1 = array();
                $pw1 = array();
                $pp1 = array();
                $vpid1 = array();
                $szi = array();
                $szs = array();
                $szp = array();
                $szv = array();
                $expn = array();
                $expp = array();
                $exid = array();

                //print_r($pq1);
                $productid = $rowwe->v_product_id;
                $pvid = $rowwe->v_id;
                $v_cat_id = $rowwe->v_cat_id;
                $pname = $rowwe->v_product_name;
                $mrp = $rowwe->v_product_cost;
                // $desc = $rowwe->v_product_desc;
                $sellingprice = $rowwe->v_product_selling_price;
                $pricesavepercent = $rowwe->v_product_save_percent;
                $weight = $rowwe->v_product_quantity . ' ' . $rowwe->v_product_weight;
                $prodimage = $rowwe->v_product_image;
                $inventory_a = $this->Front_model->getInventorybyProductid($productid);
                $mov_pq1 = "";
                $cst_pn1 = "";
                if ($prodimage != '') {
                  $prodimgpath = $_SERVER['DOCUMENT_ROOT'] . '/' . $prodimage;
                  if (file_exists($prodimgpath)) {
                    $imagepath  = base_url() . '/' . $prodimage;
                  } else {
                    $imagepath = base_url() . '/assets/website/img/no-product-image-mnm.jpg';
                  }
                } else {
                  $imagepath = base_url() . '/assets/website/img/no-product-image-mnm.jpg';
                }
                $productslug = $this->Front_model->getproductslug($productid);
                /*variant start*/
                $pid = $this->Front_model->getDataById($table = 'product_master', $colname = 'slug', $productslug);
                $masterpid = $pid[0]->id;
            ?> <!--item start -->
                <div class="col-lg-3 col-sm-6 col-md-4 col-6 mobile-remove-pad">
                  <div class="item">
                    <div class="product_item">
                      <div class="product_short">
                        <img src="<?php echo $imagepath; ?>" alt="<?php echo $pname; ?>" title="<?php echo $pname; ?>" class="img-fluid">
                        <?php
                        if ($inventory_a > 0 && $closTodayFlag == false) { ?>

                          <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

                          <div class="addprodcut_btn">
                            <?php if (!empty($masterpid)) {
                              $xa = 0;
                              $xb = 0;
                              $xc = 0;
                              $mov_pp1 = '';
                              //customize variant
                              $this->db->select("*");
                              $this->db->from("vendor_product_variant");
                              $this->db->where("v_product_id", $rowwe->v_product_id);
                              $vr1 = $this->db->get();
                              //$this->db->last_query();
                              //$pq=array();
                              if ($vr1->num_rows() > 0) {
                                foreach ($vr1->result() as $rowv1) {
                                  //echo "inside";

                                  $pq1[] = $rowv1->v_product_quantity . ' ' . $rowv1->v_product_weight;
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
                                if ($mov_pp1 == $sellingprice) {
                                  //echo "inside";
                                  $xa = 0;
                                } else {
                                  $xa = 1;
                                }
                              }
                              /*custom size*/
                              $this->db->select("*");
                              $this->db->from("vendor_variant_size");
                              $this->db->where("v_product_id", $rowwe->v_product_id);
                              $vs = $this->db->get();
                              //echo $this->db->last_query();
                              //$pq=array();
                              if ($vs->num_rows() > 0) {
                                foreach ($vs->result() as $rowsz) {
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
                              if ($vr->num_rows() > 0) {
                                foreach ($vr->result() as $rowv) {
                                  //echo "inside custom size";	
                                  $xb = 1;
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
                              if ($xa == 1 && $closTodayFlag == false) {
                            ?>
                                <a class="cus Customizable" href="javascript:void(0)"
                                  data-id="<?= $masterpid ?>"
                                  data-pqq[]="<?php echo '["' . implode('", "', $pq1) . '"]'; ?>"
                                  data-vrpid="<?= $mov_vrid1 ?>"
                                  data-pq="<?= $mov_pq1 ?>"
                                  data-pw="<?= $mov_pw1 ?>"
                                  data-pp="<?= $mov_pp1 ?>"
                                  data-desc=""
                                  data-wt="<?php echo $weight; ?>"
                                  data-imagepath="<?= $imagepath ?>"
                                  data-pid="<?= $rowwe->v_product_id ?>"
                                  data-pname="<?= $rowwe->v_product_name ?>"
                                  data-mrp="<?php echo number_format($mrp, 2); ?>"
                                  data-sprc="<?php echo number_format($sellingprice, 2); ?>"
                                  data-userid="<?php echo $userid  ?>"
                                  data-vid="<?php echo $rowwe->v_id  ?>"
                                  data-ptype="<?php echo $rowwe->product_type  ?>"
                                  data-pslug="<?php echo $productslug; ?>"
                                  data-actualurl="<?php echo $actual_link; ?>"
                                  data-returnurl="store"
                                  data-cated="<?php echo $this->uri->segment('3'); ?>"
                                  onclick="customize_process(this)"><i class="fa fa-shopping-cart"></i></a>
                              <?php } elseif ($xb == 1 && $closTodayFlag == false) { ?>
                                <a class="Customizable cus" href="javascript:void(0)"
                                  data-csi="<?= $cst_si ?>"
                                  data-id="<?= $masterpid ?>"
                                  data-exid="<?= $cst_id ?>"
                                  data-pn="<?= $cst_pn ?>"
                                  data-ss="<?= $cst_ss ?>"
                                  data-pp="<?= $cst_pp ?>"
                                  data-sp="<?= $cst_sp ?>"
                                  data-sv="<?= $cst_sv ?>"
                                  data-desc=""
                                  data-wt="<?php echo $weight; ?>"
                                  data-imagepath="<?= $imagepath ?>"
                                  data-pid="<?= $rowwe->v_product_id ?>"
                                  data-pname="<?= $rowwe->v_product_name ?>"
                                  data-mrp="<?php echo number_format($mrp, 2); ?>"
                                  data-sprc="<?php echo number_format($sellingprice, 2); ?>"
                                  data-userid="<?php echo $userid  ?>"
                                  data-vid="<?php echo $rowwe->v_id  ?>"
                                  data-ptype="<?php echo $rowwe->product_type  ?>"
                                  data-pslug="<?php echo $productslug; ?>"
                                  data-actualurl="<?php echo $actual_link; ?>"
                                  data-returnurl="store"
                                  data-cated="<?php echo $this->uri->segment('3'); ?>"
                                  onclick="opencus(this)"><i class="fa fa-shopping-cart" style="color: #f15a24;"></i></a>
                              <?php } elseif ($xb == 0 && $xa == 0 && $closTodayFlag == false) { ?>
                                <button class="add_cart"
                                  data-pid="<?php echo $rowwe->v_product_id  ?>"
                                  data-pname="<?php echo $rowwe->v_product_name  ?>"
                                  data-pprice="<?php echo $rowwe->v_product_selling_price  ?>"
                                  data-userid="<?php echo $userid  ?>"
                                  data-vid="<?php echo $rowwe->v_id  ?>"
                                  data-ptype="<?php echo $rowwe->product_type  ?>"
                                  data-pslug="<?php echo $productslug; ?>"
                                  data-actualurl="<?php echo $actual_link; ?>"
                                  data-qty="1" data-returnurl="store" data-cated="0"><i class="fa fa-shopping-cart"></i></button>
                            <?php }
                              // $pq1[] = '';
                              // $pw1[] = '';
                              // $pp1[] = '';
                              // $vpid1[] = '';	
                            }
                            ?>
                          </div>

                        <?php } else { ?>
                          <div class="outofstock <?php if ($closTodayFlag == true) {
                                                    echo "cflag";
                                                  }
                                                  ?>">
                            <p>Out of Stock</p>
                          </div>
                          <!-- <div class="addprodcut_btn">
                                <a href="javascript:void(0)" class="outstock" alt="Out of Stock" title="Out of Stock"><i class="fa fa-plus"></i></a>
                            </div> -->
                        <?php } ?>
                      </div>
                      <div class="price_of_products">
                        <div class="original_price"><?php echo number_format($mrp, 2); ?></div>
                        <div class="selling_price"><?php echo number_format($sellingprice, 2); ?></div>
                      </div>
                      <div class="products_title"><?php echo $pname; ?></div>
                      <div class="qnty"><?php echo $weight; ?></div>
                      <div class="product_decscribe"><?php //echo ((strlen($desc) > 87) ? substr($desc,0,87).'...' : $desc);?></div>
                    </div>
                  </div>
                </div>
                <!--end item start -->
              <?php


              } // foreach end here
            } else { ?>
              <div class="col-lg-12">
                No products found here!.
              </div>
            <?php } ?>
          </div>
        </div>
  <?php
        $j++;
      }
    }
  }
} else {
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="no-products-found">
          <div class="product-not">
            <div class="product_not_img"><img src="<?php echo base_url(); ?>assets/website/img/not-found/pnf.jpg" class="img-fluid"></div>
            <div class="products-not-found">no results found!</div>
            <div class="product_not_pra">Please check the spelling or try searching for something else</div>
          </div>

        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!--script>
function customize_process(identifier){	
          alert("data-id:"+$(identifier).data('id')+", data-pname:"+$(identifier).data('pname'));              
          var codurl="<?php echo base_url('orderprocess/cod') ?>";
		  var onurl="<?php echo base_url('Chef/ccavRequestHandler') ?>";
		  var redirect_url="<?php echo base_url('orderprocess/verifyorder'); ?>";
		  var cancel_url="<?php echo base_url('orderprocess/verifyorder'); ?>";
		  var odrid="<?php echo $odr; ?>"+$(identifier).data('id');
		  var gtotal="<?php echo $grand_total; ?>";
		  var gtcod="<?php echo base64_encode($grand_total); ?>";
		  var billing_name=$(identifier).data('blfname');
		  var email="<?php echo $userdetails[0]->user_email; ?>";
		  var ur_id="<?php echo $_SESSION['user_data']['user_id']; ?>";
		  //alert(email);
	      $('#payment').fadeIn();
          $("#payo").empty();		  
		  var newElement = '<form action="'+onurl+'" method="post"><input type="hidden" name="dadd_id" value="'+$(identifier).data('id')+'"><input type="hidden" name="merchant_id" value="187906"/><input type="hidden" name="wid" value="'+$(identifier).data('id')+'"><input type="hidden" name="order_id" value="'+odrid+'" /><input type="hidden" name="amount" value="'+gtotal+'"/><input type="hidden" name="currency" value="INR"/><input type="hidden" name="redirect_url" value="'+redirect_url+'"/><input type="hidden" name="cancel_url" value="'+cancel_url+'"/><input type="hidden" name="language" value="EN"/><input type="hidden" name="billing_name" value="'+billing_name+'"/><input type="hidden" name="billing_address" value="'+$(identifier).data('addr1')+'"/><input type="hidden" name="billing_city" value="'+$(identifier).data('city')+'"/><input type="hidden" name="billing_state" value="'+$(identifier).data('state')+'"/><input type="hidden" name="billing_zip" value="'+$(identifier).data('zip')+'"/><input type="hidden" name="billing_country" value="India"/><input type="hidden" name="billing_tel" value="'+$(identifier).data('phone')+'"/><input type="hidden" name="billing_email" value="'+email+'"/><input type="hidden" name="delivery_name" value="'+$(identifier).data('dlr')+'"/><input type="hidden" name="delivery_address" value="'+$(identifier).data('addr1')+'"/><input type="hidden" name="delivery_city" value="'+$(identifier).data('city')+'"/><input type="hidden" name="delivery_state" value="'+$(identifier).data('state')+'"/><input type="hidden" name="delivery_zip" value="'+$(identifier).data('zip')+'"/><input type="hidden" name="delivery_country" value="India"/><input type="hidden" name="delivery_tel" value="'+$(identifier).data('phone')+'"/><input type="hidden" name="merchant_param2" value="'+$(identifier).data('id')+'"/><button type="submit" class="cod_payemnt_btn" >Pay Online</button></form>';
          $( "#payo" ).append( $(newElement)); 
		  //cod code
		  var newElementCod = '<form action="'+cod+'" method="post"><input type="hidden" name="wid" value="'+$(identifier).data('id')+'"><input type="hidden" name="uid" value="'+ur_id+'"/><input type="hidden" name="amount" value="'+gtcod+'"><button type="submit" class="cod_payemnt_btn" >Cash On Delivery</button></form>';
          $( "#paycod" ).append( $(newElementCod)); 
		 // $("#payo").remove();
		  
}
</script-->

<script type="text/javascript">
  function ajaxSearchprod() {
    //alert("helllo");
    var input_data = $('#search_datad').val();
    if (input_data.length === 0) {
      $('#suggestions').hide();
    } else {

      /* var post_data = {
            'search_data': input_data,
            }; */
      //console.log(post_data);

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>website/user/autocomplete",
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

  $(document).ready(function() {
    $('.add_cart').click(function() {
      var pid = $(this).data("pid");
      var pname = $(this).data("pname");
      var pprice = $(this).data("pprice");
      var userid = $(this).data("userid");
      var vid = $(this).data("vid");
      var ptype = $(this).data("ptype");
      var pslug = $(this).data("pslug");
      var actualurl = $(this).data("actualurl");
      var qty = $(this).data("qty");
      var returnurl = $(this).data("returnurl");
      var cated = $(this).data("cated");
      //alert(product_id);
      //var quantity      = $('#' + product_id).val();
      $.ajax({
        url: "<?php echo base_url('user/addtocart'); ?>",
        method: "POST",
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          qty: qty,
          userid: userid,
          vid: vid,
          ptype: ptype,
          pslug: pslug,
          actualurl: actualurl,
          returnurl: returnurl,
          cated: cated
        },
        success: function(data) {
          $('#valuecart').load("<?php echo base_url('user/cart_cnt'); ?>");

          //$('#detail_cart').load("<?php echo site_url('user/explorestore/') . $this->uri->segment('3'); ?>");
          /* var totalQuantity = 0;
            $("input[id*='input-quantity-']").each(function() {
                var cart_quantity = qty;
                totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
            });
            $("#crt").text("Cart ( "+cart_count+" )"); */
          $('#detail_cart').load("<?php echo base_url('user/load_cart'); ?>");
          $('#valuecartm').load("<?php echo base_url('user/cart_cntm'); ?>");
          //$('#detail_cartm').load("<?php echo base_url('user/load_cart'); ?>");
          $('#detail_cartm').load("<?php echo base_url('user/load_cartm'); ?>");
          //$('.item_added').show();
          //$(".added_item_alert").show(); 
          $(".added_item_alert").fadeIn(1000, function() {
            $(".added_item_alert").fadeOut();
          });

        }
      });
    });


    //$('#detail_cart').load("<?php echo site_url('user/index'); ?>");
    $('.products_search_view').hide();
    $('.search_section .search').attr('onclick', 'opensearch_ash()');

  });
</script>
<!-- Start scroller script -->
<script>
  $(document).ready(function() {
    $("a[href*='#']").click(function(event) {
      if ($(window).scrollTop()) {
        event.preventDefault();
        $("html, body").animate({
          scrollTop: $($(this).attr("href")).offset().top - 190
        }, 0);
      } else {
        event.preventDefault();
        $("html, body").animate({
          scrollTop: $($(this).attr("href")).offset().top - 270
        }, 0);
      }
    });
  });
</script>

<!-- end scroller script -->