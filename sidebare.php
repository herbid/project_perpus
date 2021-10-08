<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"><?php echo $_SESSION['sesi']; ?></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Master</div>
                            <!-- <a class="nav-link collapsed" href="index.php?p=anggota.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"> -->
                            <a class="nav-link" href="anggota.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Data Anggota
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                
                            </div>
                            <a class="nav-link" href="data_buku.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
  
                                Data Buku
                                
                            </a>
                          
                             <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="data_pinjamn.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Pinjaman
                            </a>
                            <a class="nav-link" href="data_pengembalian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Pengembalian
                            </a> 
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>