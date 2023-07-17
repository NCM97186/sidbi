<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  User Entry
				 		
                </header>
			
                <div class="panel-body" style="height: 100%;overflow: scroll;">
<script type="text/javascript">
		var select = jQuery.noConflict();
		select(function () {
			
			select("#country_id44").selectbox();
			select("#country_id45").selectbox();
			select("#country_id49").selectbox();
			
			
		});
		
		</script>
    <?php isset($profile) ? $loadcontroller='update_user' : $loadcontroller='insert_user';
        $path = "user/".$loadcontroller;
       isset( $profile[0]['id']) ? $path = "user/".$loadcontroller.'/'.$profile[0]['id']: $path = "user/".$loadcontroller; ?>
<!--selectbox-->
    <form enctype="multipart/form-data" name="addcust" id="addcust" class="form-horizontal" method="post"  action="<?=$this->config->item('base_url')?><?=$path?>" >
      
      <div class="content_right_part column">
        <div class="chart_bg">
          <section class="signin_container">
		 
            <div class="toptitle">
              <label class="col-sm-2 control-label">User</label>
              <?php if(isset($msg)) {?>
                   <div class="col-sm-4"> 
                  <h2> <label style="color:#F00;"><?= urldecode($msg)?>
                    </label> 
                  </h2> 
                </div>
                <?php }?>
               <div class="form-group">
                <div class="page-button-left-box">
                    <button type="button" style="margin-top:-2%" class="adduser_btn2" id="back" name="add-variation">Back</button>
                </div> 
              </div>
            </div>
			   <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      
                     
                       
					    <input type="hidden" name="pathtype" value="<?php echo $pathtype;?>" />
                      </div>
                    </div>
					
            <div class="signin_contetninner">
              <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group">
                     
                     <label class="col-sm-2 control-label">Full Name<span>*</span></label>
                    
                     <div class="col-sm-4">
                      <input type="hidden" name="id" id="uid" value="<?=isset($profile) ? $profile[0]['id']:''?>" />
                      <input type="hidden" name="pid" id="pid" value="" />
					  <input type="text"  class="form-control" data-bvalidator-msg="Please enter alphabetic characters only." name="name" id="name" value="<?=isset($profile) ? $profile[0]['name'] : ''?>" />
                    </div>
                  </div>
					
				    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Email<span>*</span></label>
                     
                    <div class="col-sm-4">
                      <!-- <input type="text"  name="Name" class="emailbox"> -->
                      <input type="text" id="email" name="email" class="form-control" data-bvalidator="required,email" data-bvalidator-msg="Please enter valid email address." value="<?=isset($profile) ? $profile[0]['email'] : ''?>" onblur="<?=isset($profile)?'return geteditemail()':'return getemail();'?>">
                    </div>
                  </div> 
		
				 <?php
                if(!isset($profile)) 
                {
                ?>
                     
                 <div class="form-group">
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                      <label class="col-sm-2 control-label">Password</label> <span>*</span></label>
                    
                    <div class="col-sm-4">
                       <!-- <input type="text"  name="Password" class="emailbox"> -->
                       <input type="password" data-bvalidator="minlength[6],required" data-bvalidator-msg="Please enter minimum 6 characters." name="password" id="password" <?=isset($profile)?'readonly=readonly':''?> class="form-control" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                      <label class="col-sm-2 control-label">Confirm Password</label>  <span>*</span></label>
                     
                      <div class="col-sm-4">
                      <!-- <input type="text"  name="Confirm Password" class="emailbox"> -->
                      <input type="password" data-bvalidator="equalto[password],minlength[6],required" name="cpassword" id="cpassword" data-bvalidator-msg="Confirm password value did not match" <?=isset($profile)?'readonly=readonly':''?> value="" class="form-control" />
                    </div>
                  </div>
              <?php
                }
                else
                {
                    
                   $admin_session = $this->session->userdata('admin_session');
                   if($admin_session['id']==$profile[0]['id'])
                   {
                    ?>
                  
                     <div class="form-group">
						<div class="line line-dashed b-b line-lg pull-in"></div>
                      <label class="col-sm-2 control-label">For Change Password <span>*</span></label>
                    
						<div class="col-sm-4">
                       <input type="checkbox" style="margin-top:3%; margin-left:2%" onclick="showtd(this.id)"  name="cngpassword" id="cngpassword"  value="" />
						</div>
					 </div>
					<div class="form-group" style="display:none">>
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                      <label>Old Password <span>*</span></label>
                     
                    <div class="col-sm-4">
                      <!-- <input type="text"  name="Confirm Password" class="emailbox"> -->
                      <input type="password"class="form-control" onblur="checkpassword(this.id,this.value);" data-bvalidator="minlength[6],required" name="oldpassword" id="oldpassword"  value="" />
                    </div>
                  </div>
  
					<div class="line line-dashed b-b line-lg pull-in" style="display:none"></div>  
                     <div class="form-group">
                    <label class="col-sm-2 control-label">Password  <span>*</span></label>
                    
                    <div class="col-sm-4">
                       <!-- <input type="text"  name="Password" class="emailbox"> -->
                       <input type="password" class="form-control" data-bvalidator="minlength[6],required" data-bvalidator-msg="Please enter minimum 6 characters." name="password" id="password" value="" />
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in" style="display:none"></div>  
                     <div class="form-group">
                      <label class="col-sm-2 control-label">Confirm Password <span>*</span></label>
                     
                    <div class="col-sm-4">
                      <input type="password" data-bvalidator="equalto[password],minlength[6],required" data-bvalidator-msg="Confirm password value did not match" name="cpassword" id="cpassword"  value="" class="form-control" />
                    </div>
                  </div>
                    <?php    
                   }    
                }   
                ?>
                    
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                     <div class="form-group">
                     <label class="col-sm-2 control-label">Employee Code<span>*</span></label>
                
                    <div class="col-sm-4">
                      <!-- <input type="text"  name="Employee Code" class="emailbox"> -->
                      <input type="text" data-bvalidator="rangelength[4:7],number,required" data-bvalidator-msg="Please enter a valid number and its length must be between 4 and 7."  id="emp_code" name="emp_code" value="<?=isset($profile) ? $profile[0]['emp_code'] : ''?>" class="form-control"onblur="return getcode();" />
                    </div>
                  </div>
			      <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">City <span>*</span></label>
                     
                    <div class="col-sm-4">
                      <!-- <input type="text"  name="City" class="emailbox"> -->
                      <input  type="text" data-bvalidator="alpha,required" data-bvalidator-msg="Please enter alphabetic characters only." class="form-control" id="city" name="city" value="<?=isset($profile) ? $profile[0]['city'] : ''?>" />
                    </div>
                  </div>
                    
                       
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                       <label class="col-sm-2 control-label">Zip code<span>*</span></label>
                    
                   <div class="col-sm-4">
                      <!-- <input type="text"  name="Zip code" class="emailbox"> -->
                      <input type="text" class="form-control" data-bvalidator=",minlength[5],required" maxlength="6" data-bvalidator-msg="Please enter valid zipcode" name="pin" id="pin" value="<?=isset($profile) ? $profile[0]['zipcode'] : ''?>" onkeypress='return isNumberKey(event);'  />
                    </div>
                  </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mobile<span>*</span></label>
                    
                    <div class="col-sm-4">
                      <!-- <input type="text"  name="Mobile" class="emailbox"> -->
                      <input type="text"  name="mobile" id="mobile" class="form-control" data-bvalidator="number,minlength[10],maxlength[14],required" data-bvalidator-msg="Please enter valid phone number" value="<?=isset($profile) ? $profile[0]['mobile'] : ''?>" onkeypress='return isNumberKey(event);'>
                    </div>
                  </div>
					
                   <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Address <span>*</span></label>
                       <div class="col-sm-4">
                      <!-- <textarea  name="Address" class="address"></textarea> -->
                       <textarea name="address" class="form-control" data-bvalidator="required"><?= isset($profile)?$profile[0]['address']:''?>
                      </textarea>
                    </div>
                  </div>
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">State <span>*</span></label>
                 
                   <div class="col-sm-4">
                      <!-- <input type="text"  name="State" class="emailbox"> -->
                      <input type="text" data-bvalidator="alpha,required" class="form-control" id="state" name="state" value="<?=isset($profile) ? $profile[0]['state'] : ''?>"   />
                    </div>
                  </div>
				   <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Phone <span>*</span></label>
                     
                    <div class="col-sm-4">
                      <!-- <input type="text"  name="Phone" class="emailbox"> -->
                      <input type="text" name="phone" class="form-control" id="phone" data-bvalidator="number,minlength[10],maxlength[14],required" data-bvalidator-msg="Please enter valid phone number" value="<?=isset($profile) ? $profile[0]['phone'] : ''?>" onkeypress='return isNumberKey(event);'>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Gender <span>*</span></label>
                    
                    <div class="malefemale">
                      <!-- <input type="radio" value="male" name="gender"> -->
                      <input type="radio" value="male" id="gender" <?php echo isset($profile) ? ($profile[0]['gender'] == 'male') ? 'checked' : '' : '';?> name="gender" data-bvalidator="required"> 
                      <span style="margin-right:7%; margin-left:1%;"> Male</span>
                      <!-- <input type="radio" value="female" name="gender"> -->
                      <input type="radio" value="female" id="gender" <?php echo isset($profile) ? ($profile[0]['gender'] == 'female') ? 'checked' : '' : '';?> name="gender" data-bvalidator="required"> 
                      <span style="margin-left:1%;">Female</span>
                    </div>
                  </div>
				    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="col-sm-4">
                     <label class="col-sm-2 control-label">User Type <span>*</span></label>
                     
                   <div class="col-sm-4">
                      <select   name="utype"   class="form-control-select"  data-bvalidator="required" id="utype">
                <option value="">Select User Type</option>
                <?php
                //$user_group = $user_group;

                foreach($user_group as $row)
                {
                    if(isset($profile))
                    {
                        if($profile[0]['user_group_id'] == $row['id'])
                        {
                        ?>
                         <option <?php if($admin_session['user_group_id']!=$row['id'] && $admin_session['user_group_id']!='1' && $admin_session['user_group_id'] != '4' && $admin_session['user_group_id'] != '6'){ echo "disabled"; } ?> value="<?=$row['id']?>" selected="selected"><?=ucfirst($row['group_type']);?> </option>
                       <?php
                        }
                        else
                        {
                        if($row['group_type'] != 'administrator')
                        {
                        ?>
                        <option  <?php if($admin_session['user_group_id'] !=$row['id'] && $admin_session['user_group_id']!='1' && $admin_session['user_group_id'] != '4' && $admin_session['user_group_id'] != '6'){ echo "disabled"; } ?> value="<?=$row['id']?>"><?=ucfirst($row['group_type']);?></option>
                       <?php
                        }
                        }
                    }
                    else
                    {
                        if($row['group_type'] != 'administrator')
                        {
                        ?>
                        <option value="<?=$row['id']?>"><?=ucfirst($row['group_type']);?></option>
                        <?php
                        }
                    }
                }
                ?>
               </select>
                    </div>
                  </div>
				     <div class="personal_info">
                    <div class="personal_info_left">
                      <label>Profile Image<span>*</span></label>
                    </div>
                    <div class="personal_info_right">
                      <!-- <div class="choosefile">
                        <button type="text"  name=" Choose File" class="choosebtn_btn"/>
                        Choose File
                        </button>
                        <button type="text"  name="No File Choose" class="nochoosebtn_btn"/>
                        No File Choose
                        </button>
                      </div>
                      <span style="margin-top:5px; display:inline-block;">(<a href="#">gif</a> | <a href="#">jpg</a> | <a href="#">png</a> | <a href="">bmp</a> | <a href="#">jpeg</a>)</span> --> 
                      

                            <div class="choosefile">
                              <div class="page-browse-img">
                                <?php $image= isset($profile[0]['profile_img']) ? base_url('uploads/users/thumb').'/'.$profile[0]['profile_img']: $image=base_url('uploads/users/thumb').'/'."NO IMAGE.jpg";?>
                                <img src="<?= $image ?>" height="150" width="150"/>
                              </div>
                              <input type="hidden" name="imgpath"  value="<?= isset($profile[0]['profile_img']) ? $profile[0]['profile_img'] : '' ?>"/>
                                <input type="file" name="custimg" value="<?= isset($profile[0]['profile_img']) ? $profile[0]['profile_img'] : '' ?>" class="multi accept-jpg|jpeg|png|bmp|gif max-1" data-bvalidator="extension[jpg:png:jpeg:bmp:gif]" data-bvalidator-msg="Please enter jpg|jpeg|png|bmp|gif file only" />
                            </div>
                          <?php //}?>
                            <span style="margin-top:5px; display:inline;">
                                ( gif | jpg |  png | bmp | jpeg ) 
                            </span>
                    </div>
                  </div>
				
					 <div class="bottom_btn">
                <div class="btn_inner">
                  <!-- <button type="button"  class="adduser_btn" name="Save"/>Save</button> -->
                  <input type="submit"  class="adduser_btn" value="Save" id="save" name="type">
                  <!-- <button type="button"  class="adduser_btn" id="back1" name="Back"/>Back</button> -->
                </div>
              </div>
		<br><br><br>
                  </form>
				    
</div>				
</div>
</section>

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
        //customRadio("gender");
        $('#back').bind('click', function () {
          window.location.href = "<?php echo base_url('user') ?>";
        });
       
    })
</script>

<script type="text/javascript">
  $(document).ready(function (){
    $('#addcust').bValidator();
    
    <?php
    if(isset($profile))
    {
    ?>
      var utype = <?=$profile[0]['user_group_id']?>;
      switch(utype)
      {
        case 8:
        case 9:
        case 10:
                //$(".empcode").fadeIn(1000);
                $("#password").attr("data-bvalidator","minlength[6],number,required");
                $("#cpassword").attr("data-bvalidator","equalto[password],minlength[6],number,required");
                break;
        default:
                //$(".empcode").fadeOut(1000);
                $("#password").attr("data-bvalidator","minlength[6],required");
                $("#cpassword").attr("data-bvalidator","equalto[password],minlength[6],required");
      }
    <?php
    }
    ?>
    
    $('#utype').change(function(){
      var utype = $("#utype").val();
      switch(utype)
      {
        case "8":
        case "9":
        case "10":
                //$(".empcode").fadeIn(1000);
                $("#password").attr("data-bvalidator","minlength[6],number,required");
                $("#cpassword").attr("data-bvalidator","equalto[password],minlength[6],number,required");
                break;
        default:
                //$(".empcode").fadeOut(1000);
                $("#password").attr("data-bvalidator","minlength[6],required");
                $("#cpassword").attr("data-bvalidator","equalto[password],minlength[6],required");
      }
    });
  });
  
  var dateToday = new Date();
  ///////////////////   for date picker ///////////////
  $(function() {
          var dates = jQuery( "#dob" ).datepicker({
                          defaultDate: "+1w",
                          yearRange: "-100:+0",
                          changeMonth: true,
                          changeYear: true,
                          //maxDate: dateToday,
                          maxDate: '-18Y -1D',
                          numberOfMonths: 1,
                          dateFormat: 'mm-dd-yy',
          });   
  });
  
  function isNumberKey(evt)
  {
  //        var charCode = (evt.which) ? evt.which : evt.keyCode
  //        if(charCode > 31 && (charCode < 48 || charCode > 57))
  //            return false;
  //
  //        return true;
  }
  function showtd(id)
        { 
         
           var change = document.getElementById(id).checked; 
           if(change == true)
              $(".opass").show();
           else
               {
                $(".opass").css('display', 'none');
                $(".opass1").css('display', 'none');
                $("#emailexist").val('');
                $("#save").removeAttr("disabled");
               } 
              
               
        }
        function checkpassword(id,value)
        {
            
            var id = $("#uid").val();
            if(!!value)
           {     
            $.ajax({
                type: "post",
                data: {'pass':value,'uid':id
                },
                url: '<?=$this->config->item('base_url')?>user/checkemail/'+id, 
                success: function(msg1) 
                {
                   
                    if(msg1 == 1)
                    {
                        $("#emailexist").val('');
                        $("#pid").val('1');
                        $(".opass1").show();
                        $("#save").removeAttr("disabled");
                        

                    }
                    else
                    {
                        $("#emailexist").val('Password did not match');
                         $("#pid").val('0');
                        $("#oldpassword").val('');
                        $("#oldpassword").focus();
                        $(".opass1").css('display', 'none');
                        $("#save").attr("disabled", "disabled");
                         
                    }
                }
            }); 
          }
        } 
  function getemail()
  {
        var emailid = $("#email").val();
        $.ajax({
            type: "post",
            data: {'email':emailid,
            },
            url: '<?=$this->config->item('base_url')?>/user/getemail', 
            success: function(msg1) 
            {
                if(msg1 != '')
                {
                    $("#emailexist").val(msg1);
                    $("#email").focus();
                    $("#save").attr("disabled", "disabled");
                }
                else
                {
                    $("#emailexist").val(msg1);
                    $("#save").removeAttr("disabled");
                }
            }
        }); 
  return false;
  }
  
  function geteditemail()
  {
           
            var id = $("#uid").val();
            var email = $("#email").val();
            $.ajax({
                type: "post",
                data: {'email':email,'id':id
                },
                url: '<?=$this->config->item('base_url')?>user/geteditemail/'+id, 
                success: function(msg1) 
                {
                   
                    if(msg1 != '')
                    {
                        $("#emailexist").val(msg1);
                        $("#email").focus();
                        $("#save").attr("disabled", "disabled");
                    }
                    else
                    {
                       $("#emailexist").val('');
                        $("#save").removeAttr("disabled");
                    }
                }
            }); 
            return false;
  }
  
  /* Code for checking that rmp code already exists or not by swapnil start */
  function getcode()
  {
    var uid = $("#uid").val();
    var emp_code = $("#emp_code").val();
    $.ajax({
      type: "post",
      data: {'emp_code':emp_code,'uid':uid
      },
      url: '<?=$this->config->item('base_url')?>user/getcode/'+uid, 
      success: function(msg1) 
      {
        if(msg1 != '')
        {
          $("#emailexist").val(msg1);
          $("#emp_code").focus();
          $("#save").attr("disabled", "disabled");
        }
        else
        {
          $("#emailexist").val(msg1);
          $("#save").removeAttr("disabled");
        }
      }
    }); 
    return false;
  }
  
  /* Code for checking that rmp code already exists or not by swapnil start */  
</script>
<script language="javascript">
// this is fetch city,state,country from on key up zip code box 
   /*$('#pin').blur(function(){ 
  
    //load loading image waiting for dilling city and state 
  $("#load").html("<img src='<?=$this->config->item('image_path')?>admin/loading.gif' />");
  $("#load").show();
  
    var sta=$('#pin').val(); 
    //userls = "http://maps.googleapis.com/maps/api/geocode/json?address=36001&sensor=true";
    $.ajax({  
     type: "post",
     url:"<?=$this->config->item('base_url')?>user/getCityStateCountry_Ship/"+sta+"/",    
     dataType:'json',
     success: function(data){
          $('#city').val(data.Address);
          //$('#club_city').val(data.City);
          $('#state').val(data.State);
      $('#country').val(data.Country);
    
        $("#load").hide();
        } 
            });        
    });*/
</script>

