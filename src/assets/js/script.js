let sidebar = document.getElementById('sidebar');
let sidebarLogo = document.querySelector('.sidebar-logo');
let sidebarContentList = document.querySelectorAll('.sidebar-content-list > li, .sidebar-content p');
let sidebarActive = document.querySelectorAll('.sidebar-active');
let container = document.querySelector('.container');
let modalLogout = document.querySelector('.modal-logout');
let modalCreate = document.querySelector('#modal-create');
let navigationContent = document.querySelector('.navigation-content');

// form input
let inputs = document.querySelectorAll(`.form input[type='text'], .form input[type='number']`);

const inputChanged = (event) => {
  event.preventDefault();

  let label = document.querySelector(`#label-${event.target.id}`);

  const labelActive = ['-translate-y-4', 'text-sm'];
  const labelDeactive = ['-translate-y-0', 'text-base', 'group-focus-within/input:-translate-y-4', 'group-focus-within/input:text-sm'];

  if (event.target.value.length > 0) {
    label.classList.add(...labelActive);
    label.classList.remove(...labelDeactive);
  } else {
    label.classList.add(...labelDeactive);
    label.classList.remove(...labelActive);
  }
};
const inputActive = (event) => {
  event.preventDefault();

  let label = document.querySelector(`#label-${event.target.id}`);

  const labelActive = ['-translate-y-4', 'text-sm'];
  const labelDeactive = ['-translate-y-0', 'text-base', 'group-focus-within/input:-translate-y-4', 'group-focus-within/input:text-sm'];

  if (event.target.value.length > 0) {
    label.classList.add(...labelActive);
    label.classList.remove(...labelDeactive);
  } else {
    label.classList.add(...labelDeactive);
    label.classList.remove(...labelActive);
  }
};

inputs.forEach((input) => {
  input.addEventListener('change', inputChanged);

  let label = document.querySelector(`#label-${input.id}`);
  const labelActive = ['-translate-y-4', 'text-sm'];
  const labelDeactive = ['-translate-y-0', 'text-base', 'group-focus-within/input:-translate-y-4', 'group-focus-within/input:text-sm'];

  if (input.value.length > 0) {
    label.classList.add(...labelActive);
    label.classList.remove(...labelDeactive);
  }
});

// modal
const handleModal = (modalID) => {
  console.log(modalID);
  let modal = document.querySelector(`${modalID}`);
  console.log(modal);
  modal.classList.toggle('hidden');
};

// sidebar
function handleSidebar() {
  sidebar.classList.toggle('sidebar-deactivate');
  for (let i = 0; i < sidebarActive.length; i++) {
    sidebarActive[i].classList.toggle('sidebar-content-deactivate');
  }

  let sidebarLogoDeactive = sidebarLogo.classList.contains('sidebar-content-deactivate');
  console.log(container.style.paddingLeft);

  if (sidebarLogoDeactive) {
    sidebarLogo.style.display = 'none';
    container.style.paddingLeft = '7%';
    navigationContent.style.paddingLeft = '7%';
    for (let i = 0; i < sidebarContentList.length; i++) {
      sidebarContentList[i].style.justifyContent = 'center';
      sidebarContentList[i].style.padding = '1rem 0rem';
    }
  } else {
    sidebarLogo.style.display = 'flex';
    container.style.paddingLeft = '22%';
    navigationContent.style.paddingLeft = '22%';
    for (let i = 0; i < sidebarContentList.length; i++) {
      sidebarContentList[i].style.justifyContent = 'flex-start';
      sidebarContentList[i].style.padding = '1rem 2rem';
    }
  }
}
