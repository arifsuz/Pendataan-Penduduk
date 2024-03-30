 <div id="sidebar">
     <!-- Sidebar Brand -->
     <div id="sidebar-brand" class="themed-background">
         <a href="../pilihan.php" class="sidebar-title">
             <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide"><strong>JAVCO</strong></span>
         </a>
     </div>
     <!-- END Sidebar Brand -->

     <!-- Wrapper for scrolling functionality -->
     <div id="sidebar-scroll">
         <!-- Sidebar Content -->
         <div class="sidebar-content">
             <!-- Sidebar Navigation -->
             <ul class="sidebar-nav">
                 <li>
                     <a href="../pilihan.php" class="<?php if ($_SESSION['aktif'] == 'dashboard') {
                                                            echo "active";
                                                        } ?>"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                 </li>
                 <li class="sidebar-separator">
                     <i class="fa fa-ellipsis-h"></i>
                 </li>
                 <?php
                    $detail = $_SESSION['userdata'];
                    include('../koneksi.php');
                    $tampil = $_mysqli->query("SELECT no_kk FROM penduduk WHERE nik = '$detail'");
                    $tam = mysqli_fetch_array($tampil);
                    ?>
                 <li>
                     <a href="../kk/detail.php?detail=<?php echo $tam['no_kk']; ?>" class="<?php if ($_SESSION['aktif'] == 'penduduk' or $_SESSION['aktif'] == 'kk') {
                                                                                                echo "active";
                                                                                            } ?>"><i class="fa fa-cube sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Kartu Keluarga</span></a>
                 </li>

                 <li class="sidebar-separator">
                     <i class="fa fa-ellipsis-h"></i>
                 </li>

                 <li>
                     <a href="../pilihan.php?menu=6" class="<?php if ($_SESSION['aktif'] == 'chat') {
                                                                echo " active";
                                                            } ?>"><i class="fa fa-share-alt sidebar-nav-icon">
                         </i><span class="sidebar-nav-mini-hide">Chatting an</span>
                     </a>
                 </li>

             </ul>
             <!-- END Sidebar Navigation -->

             <!-- Color Themes -->
             <!-- Preview a theme on a page functionality can be found in assets/js/app.js - colorThemePreview() -->
             <!-- END Color Themes -->
         </div>
         <!-- END Sidebar Content -->
     </div>
     <!-- END Wrapper for scrolling functionality -->

     <!-- Sidebar Extra Info -->
     <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
         <div class="text-center">
            <small><span>2023</span> &copy; <a href="https://fasilkom.mercubuana.ac.id/" target="_blank">FASILKOM.UMB</a></small>
             <small>
                 <p>Repost by <a href="https://linktr.ee/jav.co" title="JAV.CO" target="_blank">JAV.CO</a></p>
             </small>
         </div>
     </div>
     <!-- END Sidebar Extra Info -->
 </div>