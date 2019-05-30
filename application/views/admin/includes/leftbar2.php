<aside class="main-sidebar"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- Sidebar user panel -->
  <!--  <div class="user-panel">
     <div class="pull-left image"> <img src="<?php echo admin_assets_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> </div> 

	 <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
    </div>
    -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
     
     
      <li class="<?php if((isset($leftbar_active)) && (($leftbar_active=='universalcategory')||($leftbar_active=='category')||($leftbar_active=='popularcategorylisting')||($leftbar_active=='subcategory')||($leftbar_active=='innercategory'))){echo "active";}?> treeview"> <a href="#"> <i class="fa fa-building"></i> <span>Manage Category</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          
          <li class="<?php if($leftbar_active=='category'){echo 'active';}?>"><a href="<?php echo admin_url().'category'; ?>"><i class="fa fa-circle-o"></i> Category</a></li>
          <li class="<?php if($leftbar_active=='subcategory'){echo 'active';}?>"><a href="<?php echo admin_url().'subcategory'; ?>"><i class="fa fa-circle-o"></i> Subcategory</a></li>
          <li class="<?php if($leftbar_active=='innercategory'){echo 'active';}?>"><a href="<?php echo admin_url().'innercategory'; ?>"><i class="fa fa-circle-o"></i> Innercategory</a></li>
        </ul>
      </li>  
	  
      <li class="<?php if((isset($leftbar_active)) && (($leftbar_active=='products') || ($leftbar_active=='search'))){echo "active";}?> treeview"> <a href="#"> <i class="fa fa-building"></i> <span>Manage Products</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          
          <li class="<?php if($leftbar_active=='products'){echo 'active';}?>"><a href="<?php echo admin_url().'products'; ?>"><i class="fa fa-circle-o"></i> Products</a></li>
          
		  <li class="<?php if($leftbar_active=='search'){ echo 'active'; } ?>"><a href="<?php echo admin_url().'search'; ?>"><i class="fa fa-circle-o"></i> Search Products</a></li>
      
        </ul>
      </li> 

       <li class="<?php if((isset($leftbar_active)) && (($leftbar_active=='pages') || ($leftbar_active=='pages'))){echo "active";}?> treeview"> <a href="#"> <i class="fa fa-building"></i> <span>Manage Pages</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          
          <li class="<?php if($leftbar_active=='pages'){echo 'active';}?>"><a href="<?php echo admin_url().'pages'; ?>"><i class="fa fa-circle-o"></i> All Pages</a></li>
          
		  <li class="<?php if($leftbar_active=='addpage'){ echo 'active'; } ?>"><a href="<?php echo admin_url().'addpage'; ?>"><i class="fa fa-circle-o"></i> Add Page</a></li>
      
        </ul>
      </li> 
	  
	  <li class="<?php if((isset($leftbar_active)) && (($leftbar_active=='uploads'))){echo "active";}?> treeview"> <a href="<?php echo admin_url().'uploads'; ?>"> <i class="fa fa-building"></i> <span>Uploads</span></a></li>  
	</ul>
  </section>
</aside>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$( "ul li .count_orders" ).click(function() {
jQuery.ajax({
	url: "<?php echo base_url(); ?>sabsetting/notification",
	data:{notification_status:0},
	type: "POST",
	success:function(data){
		if(data==1)
		
		{
			 location.href = "<?php echo admin_url().'orders'; ?>"
			$(".order_notify").hide();
			
		}
		
		else{
				$(".order_notify").show();
			}
	
	},
	error:function (){}
	
	}); 

});
</script>
<style>
.order_notify {

  background: orange none repeat scroll 0 0;
  border: 1px solid;
  height: 100px;
  padding: 3%;
  position: relative;
  width: 100px;
}
</style>