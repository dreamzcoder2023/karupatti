<div class="accordion" id="kt_accordion_1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_1">
            <button class="accordion-button fw-semibold fs-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="false" aria-controls="kt_accordion_1_body_1" style="color: red">
                Set User Permission
            </button>
        </h2>
        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1" style="overflow: scroll !important;">
            <div class="accordion-body" style="height: 300px !important;overflow: show;">
	            	<!-- <h3>Role Permissions</h3><br> -->
			<?php 
			foreach ($menu_list as $mlist) 
			{
				$role_per_list=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_details->ROLEID." AND MENU_ID=".$mlist['MENU_ID'])->row();
				// print_r(!isset($role_per_list));exit();
			?>
			<div class="row">
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<div class="form-check">
						 <input type="hidden" id="menuid" name="menuid[]" value="<?php echo $mlist['MENU_ID'];?>">
	                    <input class="form-check-input" type="checkbox" value="<?php echo (isset($role_per_list)>0)?'1':'0';?>" id="<?php echo 'menuid_'.$mlist['MENU_ID'];?>" name="menu_id_edit[<?php echo $mlist['MENU_ID']; ?>]" <?php echo (isset($role_per_list)>0)?'checked':''; ?> onclick="select_permission_edit(this.id);">
	                    <h4><label class="form-check-label" for="flexCheckChecked" style="">
	                        <?php echo $mlist['MENU_NAME'];?>
	                    </label></h4>

	                </div>
				</div>
				<?php 
				if(($mlist['IS_PARENT']==0 && $mlist['PARENT_MENU_ID']==0)||($mlist['VALUE']=="View~Add~Edit~Delete~Verify"))
				{
					$permission=explode('~', $mlist['VALUE']);
					$cnt=count($permission);
					for ($i=0;$i<$cnt;$i++)
					{
						?>
				<div class="col-lg-1 fv-row fv-plugins-icon-container">
					<!-- <input type="hidden" id="permission" name="permission[]" value="<?php echo $mlist['MENU_ID'];?>"> -->
					<input class="form-check-input" type="checkbox" value="<?php echo (isset($role_per_list)>0)?'1':'0';?>" id="<?php echo $mlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $mlist['MENU_ID']; ?>]" <?php echo (isset($role_per_list)>0)?'checked':''; ?>>
	                    <label class="form-check-label" for="flexCheckChecked" >
	                        <?php echo $permission[$i];?>
	                    </label>
				</div>		
				<?php
					}
					}
					else
					{
						$permission=explode('~', $mlist['VALUE']);
						$cnt=count($permission);
						for ($i=0;$i<$cnt;$i++)
						{
						?>

						<div class="col-lg-1 fv-row fv-plugins-icon-container">
					<!-- <input type="hidden" id="permission" name="permission[]" value="<?php echo $mlist['MENU_ID'];?>"> -->
					<input class="form-check-input" type="checkbox" value="<?php echo (isset($role_per_list)>0)?'1':'0';?>" id="<?php echo $mlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $mlist['MENU_ID']; ?>]" <?php echo (isset($role_per_list)>0)?'checked':''; ?> style="display: none;">
	                    <label class="form-check-label" for="flexCheckChecked" style="display: none" >
	                        <?php echo $permission[$i];?>
	                    </label>
				</div>		
					<?php }}
				?>
			</div>
			<br>
			
			<?php 
				$sub_menu_list=$this->db->query("select * from MENU where PARENT_MENU_ID=".$mlist['MENU_ID']." order by MENU_ID asc")->result_array();
				foreach ($sub_menu_list as $smlist) 
				{
					$role_per_list=$this->db->query("SELECT * FROM ROLE_PERMISSION WHERE ROLE_ID=".$role_details->ROLEID." AND MENU_ID=".$smlist['MENU_ID'])->row();
				?>
				<!-- if() -->
				<div class="row">
				<div class="col-lg-3 fv-row fv-plugins-icon-container">
					<input type="hidden" id="menuid" name="menuid[]" value="<?php echo $smlist['MENU_ID'];?>">
					<input class="form-check-input" type="checkbox" value="<?php echo (isset($role_per_list)>0)?'1':'0';?>" id="<?php echo 'menuid_'.$smlist['MENU_ID'];?>" name="menu_id_edit[<?php echo $smlist['MENU_ID']; ?>]" <?php echo (isset($role_per_list)>0)?'checked':''; ?> onclick="select_single_permission(this.id);">
	                    <label class="form-check-label" for="flexCheckChecked"><b>
	                        <?php echo $smlist['MENU_NAME'];?>
	                    </b></label>

				</div>
				<?php 
					$permission=explode('~', $smlist['VALUE']);
					$cnt=count($permission);
					if(isset($role_per_list->VALUE))
					{
					$perm_check_access=explode('~', $role_per_list->VALUE);
					$pcnt=count($perm_check_access);
					}
					// if($cnt==$pcnt)
					// {
						for ($i=0;$i<$cnt;$i++)
						{

						?>
				<div class="col-lg-1 fv-row fv-plugins-icon-container">
					
					<input class="form-check-input" type="checkbox" value="<?php if(isset($role_per_list->VALUE))
					{echo ($perm_check_access[$i]==1)?'1':'0';}else{echo '0';}?>" id="<?php echo $smlist['MENU_ID'].'_'.$permission[$i];?>" name="<?php echo $permission[$i];?>permission[<?php echo $smlist['MENU_ID']; ?>]" <?php  if(isset($role_per_list->VALUE)){echo ($perm_check_access[$i]==1)?'checked':'';}?>>
	                    <label class="form-check-label" for="flexCheckChecked" >
	                        <?php echo $permission[$i];?>
	                    </label>
				</div>		
				<?php
					// }
				}
				?>
				
			</div>
			<br>
				<?php											
				}
				?>

			<?php 
			}
			?>
            </div>
        </div>
    </div>
</div>

