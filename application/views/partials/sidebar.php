    <!-- #Top Bar -->
    <section>
    	<!-- Left Sidebar -->
    	<aside id="leftsidebar" class="sidebar">
    		<!-- User Info -->
    		<div class="user-info">
    			<div class="image">
    				<img src="<?= site_url('assets/images/users/'.$this->session->userdata('foto')) ?>" width="48" height="48" alt="User" />
    			</div>
    			<div class="info-container">
    				<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama_lengkap'); ?></div>
    				<div class="email"><?= $this->session->userdata('nama_akses'); ?></div>
    				<div class="btn-group user-helper-dropdown">
    					<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
    					<ul class="dropdown-menu pull-right">
    						<li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<!-- #User Info -->
    		<!-- Menu -->
    		<div class="menu">
    			<ul class="list">
    				<li class="header">MAIN NAVIGATION</li>

    				<?php 
    				$menu = $this->db->get_where('menus', array('parrent_id' => 0, 'id_group' => $this->session->userdata('id_group')));
    				foreach ($menu->result() as $mn) {
    					$parrent = $this->db->get_where('menus', array('parrent_id' => $mn->id, 'id_group' => $this->session->userdata('id_group')));
    					if ($parrent->num_rows() > 0) { ?>
    						<li>
    							<a href="javascript:void(0);" class="menu-toggle">
    								<i class="material-icons"><?= $mn->icon ?></i>
    								<span><?= $mn->nama_menu ?></span>
    							</a>
    							<ul class="ml-menu">
    								<?php 
    								foreach ($parrent->result() as $sb) {?>
    									<li>
    										<a href="<?= site_url($sb->link) ?>"><?= $sb->nama_menu ?></a>
    									</li>
    								<?php } ?> 	            
    							</ul>
    						</li>
    					<?php }else{ ?>
    						<li class="">
    							<a href="<?= site_url($mn->link) ?>">
    								<i class="material-icons"><?= $mn->icon ?></i>
    								<span><?= $mn->nama_menu ?></span>
    							</a>
    						</li>
    					<?php }           
    				}
    				?>

    			</ul>
    		</div>
    		<!-- #Menu -->
    		<!-- Footer -->
    		<div class="legal">
    			<div class="copyright">
    				&copy; 2021 <a href="javascript:void(0);"><?= APP_NAME ?></a>.
    			</div>
    			<div class="version">
    				<b>Version: </b> 1.0.5
    			</div>
    		</div>
    		<!-- #Footer -->
    	</aside>
    	<!-- #END# Left Sidebar -->

    </section>
