<Style>
.md-input-wrapper {
    margin-bottom: 29px !important;
}
.md-input-wrapper {
    margin-bottom: 0px !important;
}
.md-input-wrapper .md-form-control {
    padding: 5px !important;
}
#advanced-table_filter label {
    top: 76px !important;
}
</style>
<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <!--<h4>Blogs</h4>-->
        </div>
      </div>
    </div>
    <!-- Row end -->
    <div class="row">
      <div class="col-sm-12">        
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Services</h5><span>
          <!--<a href="<?php echo base_url()?>admin/add_services"><button class="btn btn-success fa fa-plus" style="margin-left:83%;margin-top: 7px;">Add Service</button></a></span></div>-->
		    <!--<span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:86%;"> Add blog</button></span>-->
              </div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
                 <th>Image</th>
                 <th>Title</th>
                 <th>Status</th> 
                 <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                 <th>S NO</th>
                 <th>Image</th>
                 <th>Title</th>
                 <th>Status</th> 
                 <th>Actions</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($banners as $key)
                      {   
                          if ($key["status"] == "1")
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
                          <td style="width: 12%;"><?php echo $counter;?></td>
                             <?php if(($key['image'] !='')){?>
						   <td style="width:17%;">
                           <img src="<?php echo base_url().$key['image'];?>" style="width: 78%;background-color:gray;"></td> 
						  <?php }
						 ?>
                            <td style="white-space: break-spaces;"><?php echo ucwords($key["title"]);?></td>
                             <td style="width: 13%;"><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                          <td style="white-space: nowrap; width: 13%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                                   <a href="<?= base_url()?>admin/add_services/<?php echo base64_encode($key['id']);?>"><button type="button" class="btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"> 
                                <span class="icofont icofont-ui-edit"></span>
                              </button></a> 
                              <!--<button type="button" class="btn btn-danger waves-effect waves-light delete_product_category" data-id="<?php echo $key['id']?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>                       -->
                            </div>       
                          </div>
                        </td>
                      </tr>                          
                  <?php  $counter++;
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
      <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
     <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
 
 	 <script>     
 
	   //delete 
       $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
			var table="services";
             var param="id";
              alertify.confirm("Do you want to delete this service?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_image_record",
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