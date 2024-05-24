let sidebar = document.getElementById('sidebar');
let sidebarLogo = document.querySelector('#sidebar-logo');
let sidebarContentList = document.querySelectorAll('.sidebar-content-list > a, .sidebar-content p');
let sidebarHidden = document.querySelectorAll('.sidebar-hidden');
let centerIcon = document.querySelectorAll('.center-icon');
let adminContentActive = document.querySelectorAll('.admin-content-active');
let container = document.querySelector('.container');
let modalLogout = document.querySelector('.modal-logout');
let modalCreate = document.querySelector('#modal-create');
let navigationContent = document.querySelector('.navigation-content');

// form input
let inputs = document.querySelectorAll(`form input[type='text'], form input[type='number'], form input[type='password'], form input[type='email'], form select`);

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
  for (let i = 0; i < sidebarHidden.length; i++) {
    sidebarHidden[i].classList.toggle('hidden');
  }
  for (let i = 0; i < centerIcon.length; i++) {
    centerIcon[i].classList.toggle('justify-center');
  }

  for (let i = 0; i < adminContentActive.length; i++) {
    adminContentActive[i].classList.toggle('admin-content-active');
  }
}
