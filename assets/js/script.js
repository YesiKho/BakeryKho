let sidebar = document.getElementById('sidebar');
let sidebarLogo = document.querySelector('.sidebar-logo');
let sidebarContentList = document.querySelectorAll('.sidebar-content-list > li, .sidebar-content p');
let sidebarActive = document.querySelectorAll('.sidebar-active');
let container = document.querySelector('.container');
let containerModal = document.querySelector('.container-modal');
let navigationContent = document.querySelector('.navigation-content');

function handleSidebar() {
  sidebar.classList.toggle('sidebar-deactivate');
  for (let i = 0; i < sidebarActive.length; i++) {
    sidebarActive[i].classList.toggle('sidebar-content-deactivate');
  }

  let sidebarLogoDeactive = sidebarLogo.classList.contains('sidebar-content-deactivate');

  if (sidebarLogoDeactive) {
    sidebarLogo.style.display = 'none';
    container.style.marginLeft = '5%';
    navigationContent.style.marginLeft = '5%';
    for (let i = 0; i < sidebarContentList.length; i++) {
      sidebarContentList[i].style.justifyContent = 'center';
    }
  } else {
    sidebarLogo.style.display = 'flex';
    container.style.marginLeft = '20%';
    navigationContent.style.marginLeft = '20%';
    for (let i = 0; i < sidebarContentList.length; i++) {
      sidebarContentList[i].style.justifyContent = 'flex-start';
    }
  }
  console.log(sidebarContentList.classList);
}

function handleLogout() {
  containerModal.style.display = 'block';
}
function handleBatalLogout() {
  containerModal.style.display = 'none';
}
