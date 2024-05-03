<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo sidebar-active">
            <a href="<?= Route('home'); ?>">
                <img src="/bakerykho/src/assets/images/aflogo-sm.png" alt="" />
                <p>BakeryKho</p>
            </a>
        </div>
        <div>
            <i class="hamburger-icon bi bi-list" onclick="handleSidebar()"></i>
        </div>
    </div>

    <div class="sidebar-content">
        <ul class="sidebar-content-list">
            <li class="">
                <a href="<?= Route('/'); ?>"> <i class="icon bi bi-people"></i><span class="sidebar-active sidebar-title">Dashboard</span> </a>
            </li>
            <li class="">
                <a href="<?= Route('products'); ?>"> <i class="icon bi bi-people"></i><span class="sidebar-active sidebar-title">Product</span> </a>
            </li>
        </ul>
        <p onclick="handleModal('#modal-logout')"><i class="icon bi bi-box-arrow-right"></i><span class="sidebar-active sidebar-title">Logout</span></p>
    </div>
</aside>