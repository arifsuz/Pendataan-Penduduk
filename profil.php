<?php
    include('login/login.php');
    $x = new Login();

    $sesi = $x->get_profil();
 ?>
<ul class="nav navbar-nav-custom pull-right">
<!-- Alternative Sidebar Toggle Button -->
<li>
    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');this.blur();">
        <h5><strong><?php echo $_SESSION['level']." ".$_SESSION['userdata']; ?></strong> A.N. <strong><?php echo $sesi['nama']; ?></strong></h5>
    </a>
</li>
<!-- END Alternative Sidebar Toggle Button -->

<!-- User Dropdown -->
<li class="dropdown">
    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../foto/<?php echo $sesi['foto'];?>" alt="avatar">
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li class="dropdown-header">
            <strong>ADMINISTRATOR</strong>
        </li>
        <li>
            <a href="../pilihan.php?menu=7">
                <i class="fa fa-pencil-square fa-fw pull-right"></i>
                Profile
            </a>
        </li>
        <li class="divider"><li>
        <li>
            <a href="../pilihan.php?menu=404" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?');">
                <i class="fa fa-power-off fa-fw pull-right"></i>
                Log out
            </a>
        </li>
    </ul>
</li>
<!-- END User Dropdown -->
</ul>