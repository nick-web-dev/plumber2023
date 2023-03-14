<style>
/*    #advanced-table_filter label {*/
/*    top: 82px !important;*/
/*}*/
</style>
<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <!--<h1 style="font-size: 31px;">Users</h1>-->
        </div>
      </div>
    </div>
    <!-- Row end -->
    <div class="row">
      <div class="col-sm-12">        
        <div class="card">
          <div class="card-header"><h2 class="card-header-text" style="font-size: 21px;">Need to renewal plumbers</h2><span></div>
           <!--<a href="<?php echo base_url()?>admin/addplumber"><button class="btn btn-success fa fa-plus" style="margin-left:85%;margin-top: -25px;">Add Plumber</button></a></span></div>-->
		    <!--<span><button type="button" class="btn btn-success fa fa-plus add_team" data-name="<?php echo @$current_page; ?>" style="margin-left:65%;"> ADD Sub admin </button></span>-->
              
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
                 <th>Company Name</th>
                 <th>E-mail Address</th>
                 <th>Phone Number</th>
                 <th>Status</th> 
                 <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                 <th>S NO</th>
                 <th>Company Name</th>
                 <th>E-mail Address</th>
                 <th>Phone Number</th>
                 <th>Status</th> 
                 <th>Actions</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($users as $key)
                      {   
                            $now = date('Y-m-d');
        // //$dd = $check_user['created_date'];
        $dd = date("Y-m-d", strtotime("+6 months", strtotime($key['created_date'])));
        if($now >= $dd){ 
                          if ($key["user_status"] == "1")
                          {
                              $status = "tag tag-success" ;
                              $status1='Active';
                          }
                          else
                          {
                               $status = "tag tag-default" ;
                               $status1='InActive';
                          }  
                          ?>
                          <tr id="hide<?php echo $key["id"];?>">
                          <td><?php echo $counter;?></td>
                          <td><?php echo ucwords($key["company_name"]);?></td>
						   <td><?php echo $key["email"];?></td>
						   
						   <td style="white-space: break-spaces;"><?php echo $key["mobile_no"];?></td> 
                            <td> <?php  echo '<span class="'. $status.' changes_ustatus" style="cursor:pointer;" data-id="'.$key['user_id'].'" data-status="'.$key["user_status"].'">'. ucfirst($status1).'</span>'; ?>                
                              </td>
                              <td>
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                              <div class="btn-group btn-group-sm" style="float: none;"> 
                                <a href="<?= base_url()?>admin/viewplumberdetails/<?php echo base64_encode($key['user_id']);?>"><button type="button" class="btn btn-primary waves-effect waves-light"> 
                                <span class="icofont icofont-eye"></span>
                              </button></a>
                              <!--  <a href="<?= base_url()?>admin/addplumber/<?php echo base64_encode($key['user_id']);?>"><button type="button" class="btn btn-primary waves-effect waves-light"> -->
                              <!--  <span class="icofont icofont-ui-edit"></span>-->
                              <!--</button></a>-->
                              <button type="button" class="btn btn-danger waves-effect waves-light delete_product_category" data-id="<?php echo $key['user_id']?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>                       
                            </div>       
                          </div>
                        </td>
					
                      </tr>                          
                  <?php  $counter++;
        }
                      }
                  ?>                            
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- Container-fluid ends -->
        
     </div>
 <!-- CONTENT-WRAPPER-->
  <section>
 <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
   <script>     

            $('.changes_ustatus').on('click',function(event){ 
            var id =$(this).data('id') ;
            var status =$(this).data('status') ;
              alertify.confirm("Do you want to change  this plumber status?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/update_sp_status",
                    type: "POST",
                    data: {id:id,status:status},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){                        
                                                 
                            $("#hide"+id).hide();
                            location.reload();                         
                      }
                 });
               },
          function(){
           // alertify.error('Cancel');
          }); 
             }); 
             
             
            $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
			var table="users";
            var param="user_id";
              alertify.confirm("Do you want to delete this plumber?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_record",
                    type: "POST",
                 data: {id:id,table:table,param:param},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){                        
                                                 
                            $("#hide"+id).hide();
                            location.reload();                         
                      }
                 });
               },
          function(){
           // alertify.error('Cancel');
          }); 
             }); 
	 
    </script>
 