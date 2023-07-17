<section class="panel panel-default" style="height: 100%;overflow: scroll; display:block;">
      
		<script type="text/javascript">
		var select = jQuery.noConflict();
		select(function () {
			
			select("#country_id47").selectbox();
			select("#country_id48").selectbox();
			select("#country_id49").selectbox();
		});
		
		</script>
		<!--selectbox-->
    <?php
      if($src!="")
        $val=$src;
    ?>
      <div class="content_right_part column">
        <div class="chart_bg">
          <div class="reportrgs_container">
              <header class="panel-heading">
              <strong> User Entry</strong>
			   <button onclick="location.href='<?php echo base_url(); ?>index.php/user/add';" class="btn btn-sm btn-default" style="float:right;background-color:#177bbb;color:white !important;padding:3px 22px"><strong>Add User</strong></button>
			   <button onclick="location.href='<?php echo base_url(); ?>index.php/user';" class="btn btn-sm btn-default" style="float:right;background-color:#177bbb;color:white !important;padding:3px 22px"><strong><i class="fa fa-refresh" aria-hidden="true"></i></strong></button>
                </header>
							<section class="panel panel-default">
                
				<?php if($this->input->get('msg')){ ?>
<div class="alert alert-success" id="msg">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fa fa-ok-sign"></i><strong>Well done!</strong> <?php echo $this->input->get('msg'); ?>

</div>
<?php } ?>


          <form name="frmcheckbox" id="frmcheckbox">
            <input type="hidden" id="user_status" name="user_status" <?php if(count($_POST)<=0){?> value=" " <?php } ?> />
            <table class="costomer_detail" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
           <tr>
                         
                        <th>name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Phone</th>
						<th>Status</th>
						<th>Action</th>
                      </tr>
              <?php
              if($custlist > 0) {
				  $i=1;
                foreach($custlist as $row) {
              ?>
              <tr>
                <input type="hidden" id="custid" name="custid" value="<?=$row['id']?>" />
                <td valign="top">
                  <input type="checkbox" align="right" name="s_one[]" id="s_one" class="check_box" value="<?=$row['id']?>" onclick=""  />
                </td>
				 <td valign="top" align="center">
                <?php echo $i; ?>
                </td>
                
                <td valign="top"><?=$row['name']?></td>
                <td valign="top"><?=$row['email']?></td>
                <td valign="top"><?=$row['emp_code']?></td>
                <td valign="top"><?=$row['city']?></td>
                <td valign="top"><?php if($row['status'] == 1) {?>
                    <td>
                          <button  class="btn btn-sm btn-default" onclick="window.location='<?php echo base_url().'index.php/user/edit/'.$user['id']; ?>'">Edit</button>
						  <button  class="btn btn-sm btn-default" href="#myModal_<?php echo $user['id']; ?>"" class="trigger-btn" data-toggle="modal" >Delete</button>
						   
                        </td>
                      </tr>
					  						<!-- Modal HTML -->
						<div id="myModal_<?php echo $user ['id']; ?>" class="modal fade">
							<div class="modal-dialog modal-confirm">
								<div class="modal-content">
									<div class="modal-header">
										<div class="icon-box">
					                   <i class="fa fa-times" aria-hidden="true"></i>
				                          </div>	
                                        										
										<h4 class="modal-title">Are you sure?</h4>	
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										<p>Do you really want to delete these records? This process cannot be undone.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url().'index.php/user/delete/'.$user['id']; ?>'">Delete</button>
									</div>
								</div>
							</div>
						</div>				
              <?php $i++;
			  } }
              else{?>
              <tr>
                <td valign="top" colspan="9"><?php echo "No Records Found";?>
                </td>
              </tr>
              <?php }?>
            </table>
          </form>
          </div>
          <div class="pagination_list">
              <ul id="pagination-digg"><?= $this->pagination->create_links() ?></ul>
         </div>
        </div>
      </div>

<!-- //main container --> 
<!--redio-->


<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<script type="text/javascript">
    function customRadio(radioName){
        var radioButton = $('input[name="'+ radioName +'"]');
        $(radioButton).each(function(){
            $(this).wrap( "<span class='custom-radio'></span>" );
            if($(this).is(':checked')){
                $(this).parent().addClass("selected");
            }
        });
        $(radioButton).click(function(){
            if($(this).is(':checked')){
                $(this).parent().addClass("selected");
            }
            $(radioButton).not(this).each(function(){
                $(this).parent().removeClass("selected");
            });
        });
    }
    $(document).ready(function (){
        customRadio("search");
       
    })
</script>

<!--redio-->

<script>
    $(document).ready(function(){

      $("img.lazy").lazy(); //lazy loading 
     $('#frmcheckbox').bValidator();
        $("#div_msg").fadeOut(4000); 
    });
</script>
<div id="dialog-confirm" style="display:none;"> Do You want to delete Record <span id="delete_id"></span> From <span id="name"></span> ? </div>
