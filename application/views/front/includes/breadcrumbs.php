<nav aria-label="breadcrumb" class="breadcrumb_wrapr">
    <div class="container-fluid">
        <ol class="p-0 m-0 list-unstyled">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">Home</a>
            </li>
            <?php 
                if(!empty($breadcrumbs)){
                foreach ($breadcrumbs as $key => $value) {
                	if(isset($value['redirect']) && $value['redirect']!=''){?>
    	                <li class="breadcrumb-item">
    		                <a href="<?php echo base_url($value['redirect']);?>"><?php echo $value['title']; ?></a>
    		            </li>
    		        <?php }else{?>    
    					<li class="breadcrumb-item" id="bcd">
    			            <a><?php echo $value['title']; ?></a>
    			        </li>
            <?php } } }?>
        </ol>
  </div>
</nav>
