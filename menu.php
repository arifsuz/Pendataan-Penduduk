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

                 <li class="<?php if ($_SESSION['aktif'] == 'klasifikasi' or $_SESSION['aktif'] == 'agama' or $_SESSION['aktif'] == 'dokumen') {
                                echo "active";
                            } ?>">
                     <a href="" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gift sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Master Data</span></a>
                     <ul>
                         <li>
                             <a href='../pilihan.php?menu=1' class="<?php if ($_SESSION['aktif'] == 'agama') {
                                                                        echo " active";
                                                                    } ?>">
                                 <i class="fa fa-list sidebar-nav-icon"></i> Agama
                             </a>
                         </li>
                         <li>
                             <a href='../pilihan.php?menu=2' class="<?php if ($_SESSION['aktif'] == 'dokumen') {
                                                                        echo " active";
                                                                    } ?>">
                                 <i class="fa fa-folder sidebar-nav-icon"></i> Dokumen
                             </a>
                         </li>
                         <li>
                             <a href='../pilihan.php?menu=3' class="<?php if ($_SESSION['aktif'] == 'klasifikasi') {
                                                                        echo " active";
                                                                    } ?>">
                                 <i class="fa fa-child sidebar-nav-icon"></i> Klasifikasi Penduduk
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="<?php if ($_SESSION['aktif'] == 'penduduk' or $_SESSION['aktif'] == 'kk' or $_SESSION['aktif'] == 'laporan') {
                                echo "active";
                            } ?>">
                     <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Penduduk</span></a>
                     <ul>
                         <li>
                             <a href="../pilihan.php?menu=4" class="<?php if ($_SESSION['aktif'] == 'kk') {
                                                                        echo " active";
                                                                    } ?>">
                                 <i class="fa fa-cubes sidebar-nav-icon"></i> Kartu Keluarga
                             </a>
                         </li>

                         <li>
                             <a href="../pilihan.php?menu=5" class="<?php if ($_SESSION['aktif'] == 'penduduk') {
                                                                        echo " active";
                                                                    } ?>">
                                 <i class="fa fa-user sidebar-nav-icon"></i> Data Penduduk
                             </a>
                         </li>
                         <li>
                             <a href="../pilihan.php?menu=8" class="<?php if ($_SESSION['aktif'] == 'laporan') {
                                                                        echo " active";
                                                                    } ?>">
                                 <i class="fa fa-server sidebar-nav-icon"></i> Laporan
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="sidebar-separator">
                     <i class="fa fa-ellipsis-h"></i>
                 </li>

                 <li>
                     <a href="../pilihan.php?menu=6" class="<?php if ($_SESSION['aktif'] == 'chat') {
                                                                echo "active";
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