<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-striped border-end shadow-sm" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link text-dark" href="<?= base_url('dashboardstaf')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-dark"><i class="fas fa-columns"></i></div>
                                Pendaftaran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-dark" href="<?= base_url('pendaftaranstaf')?>">Data Pendaftaran</a>
                                    <a class="nav-link text-dark" href="<?= base_url('jamaahstaf')?>">Data Jamaah</a>
                                </nav>
                            </div>
                            
                            <a class="nav-link text-dark" href="<?= base_url('pembayaranstaf')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Pembayaran
                            </a>
                            <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon text-dark"><i class="fas fa-book-open"></i></div>
                                Paket Umroh
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-dark" href="<?= base_url('paketumrohstaf')?>">Daftar Paket Umroh</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>