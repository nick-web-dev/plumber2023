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
    top: 100px !important;
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
          <!--<h4>Our team</h4>-->
        </div>
      </div>
    </div>
    <!-- Row end -->
    <div class="row">
      <div class="col-sm-12">        
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Type of Plumbing</h5><span>
		    <span><button type="button" class="btn btn-success fa fa-plus add_team" data-name="<?php echo @$current_page; ?>" style="margin-left:79%;margin-top: -33px;"> ADD Type of plumbing</button></span>
             </div> 
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
                 <th>Name</th>
                 <th>Status</th> 
                 <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                 <th>S NO</th>
                 <th>Name</th>
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
                          <td><?php echo $counter;?></td>
                            <td><?php echo ucwords($key["name"]);?></td>
                             <td><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                          <td style="white-space: nowrap; width: 14%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button" class="btn btn-primary waves-effect waves-light add_team" data-id="<?php echo $key['id']; ?>" style="float: none;margin: 5px;">
                                       <span class="icofont icofont-ui-edit"></span>
                                       </button>
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
      <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_team" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
   <script>     
  $(document).ready(function () 
  {
    var $modal = $('#add_team');
   // var $modal2 = $('#edit_banners');
    $('.add_team').on('click',function(event){
      var id = $(this).data('id'); 
//alert(id);	  
      event.stopPropagation();
      $modal.load('<?php echo site_url('admin/add_type_of_plumbing');?>', {id: id},
      function(){
      $modal.modal('show');
      });
    }); 
	 });
	   //delete 
        $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
            var table="type_of_plumbing";
             var param="id";
              alertify.confirm("Do you want to delete this type of plumbing?",
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
 