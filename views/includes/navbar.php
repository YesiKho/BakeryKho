<nav class="navigation-bar bg-white w-full h-16 fixed px-44 py-4 shadow-lg z-[99]">
    <div class="navigation-bar-content flex justify-between items-center gap-10">
        <div class="flex justify-center items-center gap-4">
            <img src="public/images/aflogo-sm.png" alt="bakery kho" class="w-10">
            <p class="font-semibold text-bistre text-pretty">BakeryKho</p>
        </div>
        <div class="flex justify-center items-center gap-10 *:capitalize">
            <a href="#" class="font-medium hover:text-sage">Home</a>
            <a href="#" class="font-medium hover:text-sage">Blog</a>
            <a href="#" class="font-medium hover:text-sage">About us</a>
            <a href="#" class="font-medium hover:text-sage">Contact</a>
        </div>
        <div class="group overflow-hidden">
            <div class="profile-account w-10 border-2 border-sage rounded-full overflow-hidden hover:cursor-pointer">
                <img src="public/images/girl.png" alt="" class="w-full object-cover object-center" />
            </div>
            <div class="w-44 py-3 bg-zinc-100 shadow-md rounded-md overflow-hidden hidden absolute group-hover:block">
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