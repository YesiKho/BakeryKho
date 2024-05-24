<aside class="top-0 left-0 w-[20%] h-screen fixed flex flex-col items-center gap-10 overflow-hidden bg-linen transition-all ease-in-out duration-500 z-[99] shadow-[10px_0px_30px_-15px_rgba(0,0,0,0.3)]" id="sidebar">

  <div class="w-full mt-6 relative flex justify-around transition-all ease-in-out">
    <div class="flex flex-col justify-center items-center gap-4 transition-all ease-in-out duration-500 sidebar-hidden" id="sidebar-logo">
      <img src="public/images/aflogo-sm.png" alt="" class="w-28" />
      <p class="font-semibold leading-loose tracking-wide">BakeryKho</p>
    </div>
    <div class="-translate-y-2">
      <i class="hamburger-icon bi bi-list text-3xl hover:cursor-pointer" onclick="handleSidebar()"></i>
    </div>
  </div>

  <div class="h-[75%] w-full flex flex-col justify-between text-center text-xl">
    <ul class="w-full flex flex-col justify-around font-medium capitalize">
      <?php foreach ($_SESSION['auth']['role'] == 'SUPER_ADMIN' ? $superAdminSidebarMenu : $adminSidebarMenu as $sidebarmenu) : ?>
        <a href="<?= route($sidebarmenu['url']); ?>" class="px-10 py-4 hover:bg-sage/50">
          <li class="flex gap-4 center-icon">
            <i class="icon bi bi-people"></i><span class="transition-all ease-in-out duration-500 sidebar-hidden sidebar-title"><?= $sidebarmenu['title']; ?></span>
          </li>
        </a>
      <?php endforeach; ?>
    </ul>
    <p onclick="handleModal('#modal-logout')" class="flex gap-4 px-10 py-4 hover:bg-sage/50 hover:cursor-pointer center-icon">
      <i class="icon bi bi-box-arrow-right"></i><span class="transition-all ease-in-out duration-500 sidebar-hidden sidebar-title">Logout</span>
    </p>
  </div>
</aside>