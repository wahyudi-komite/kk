<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <?php if($this->session->userdata('login_kk')==TRUE){ 
                    echo '<li> <a href="'.base_url().'login/logout" class="waves-effect waves-dark"><i class="fa fa-unlock-alt"></i>Logout</a></li>
                    <li> <a href="'.base_url().'login/ganti" class="waves-effect waves-dark"><i class="fa fa-key"></i>Ganti Password</a></li>
                    <li><a href="'.base_url().'add" class="waves-effect waves-dark"><i class="fa fa-address-card-o"></i>Tambah Jamaah</a></li>
                    <li> <a href="'.base_url().'dashboard" class="waves-effect waves-dark"><i class="fa fa-address-book-o"></i>Data Jamaah</a></li>';

                }else{
                    echo '<li> <a href="'.base_url().'login" class="waves-effect waves-dark"><i class="fa fa-lock"></i>Login</a></li>';
                };?>                
                <li><a href="<?=base_url();?>ultah" class="waves-effect waves-dark"><i class="fa fa-glass"></i>Ulang Tahun</a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>