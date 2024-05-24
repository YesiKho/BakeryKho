<nav class="navigation-bar w-full h-16 bg-linen pl-2 pr-8 py-2 fixed shadow-lg z-[99]">
    <div class="w-full h-full transition-all ease-in-out duration-500 pl-32 admin-content-active flex justify-between items-center">
        <div class="navigation-bar-title">
            <h1 class="text-xl text-bistre font-semibold capitalize"><?= $_SESSION['auth']['role'] . " - " ?? '' ?><?= $title ?? ''; ?></h1>
        </div>
        <div class="group overflow-hidden">
            <div class="profile-account w-10 border-2 border-sage rounded-full overflow-hidden hover:cursor-pointer">
                <img src="public/images/girl.png" alt="" class="w-full object-cover object-center" />
            </div>
            <div class="w-44 py-3 bg-zinc-100 shadow-md rounded-md overflow-hidden hidden absolute top-[80%] right-10 group-hover:block">
                <ul class="flex flex-col *:*:capitalize *:px-4 *:py-2">
                    <a href="#" class="hover:bg-zinc-300">
                        <li class="">profile</li>
                    </a>
                    <a href="#" class="hover:bg-zinc-300">
                        <li class="">setting</li>
                    </a>
                </ul>
                <div class="w-full h-[1px] bg-black"></div>
                <p onclick="handleModal('#modal-logout')" class="flex items-center gap-4 px-5 py-2 hover:bg-zinc-300 hover:cursor-pointer center-icon">
                    <i class="icon bi bi-box-arrow-right"></i><span class="transition-all ease-in-out duration-500 sidebar-hidden sidebar-title">Logout</span>
                </p>
            </div>
        </div>
    </div>
</nav>