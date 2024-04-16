<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Essencial</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                
                <a class="nav-link" href="order-create.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                    Criar Pedido
                </a>
                <a class="nav-link" href="orders.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Pedidos
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">

                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categorias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="categories-create.php">Criar categoria</a>
                        <a class="nav-link" href="categories.php">Ver categorias</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseProducts"aria-expanded="false" aria-controls="collapseProducts">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Produtos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProducts" aria-labelledby="headingOne"data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="products-create.php">Criar Produtos</a>
                                <a class="nav-link" href="products.php">Ver produtos</a>
                            </nav>
                        </a>
                        <nav class="sb-sidenav-menu-nested nav" aria-labelledby="headingOne"data-bs-parent="#sidenavAccordion">
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            
                        </div> 
                    </nav>
                </div>

                

                <div class="sb-sidenav-menu-heading">Gerenciar usuários</div>

                <a class="nav-link collapsed" href="#" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapseAdmins"
                    aria-expanded="false" aria-controls="collapseAdmins">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Admins / Funcionários
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="admins-create.php">Cadastrar Admin</a>
                        <a class="nav-link" href="admins.php">Visualizar Admin</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseCustomer"aria-expanded="false" aria-controls="collapseCustomer">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Clientes
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCustomer" aria-labelledby="headingOne"data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="customers-create.php">Adicionar Cliente</a>
                                <a class="nav-link" href="customers.php">Ver clientes</a>
                            </nav>
                        </a>
                        <nav class="sb-sidenav-menu-nested nav" aria-labelledby="headingOne"data-bs-parent="#sidenavAccordion">
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            
                        </div> 
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Complemento</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Gráficos
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tabelas
                </a>
            </div>
            <div class="sb-sidenav-footer">
            <div class="small">Logado como:</div>
            Start Bootstrap
        </div>
        </div>
        
    </nav>
</div>