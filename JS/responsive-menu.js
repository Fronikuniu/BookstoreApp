const burgerMenu = document.getElementById('burger-menu');
const responsiveMenu = document.querySelector('.responsive-menu');

burgerMenu.onclick = () => {
  changeDisplay();
};

const changeDisplay = () => {
  if (responsiveMenu.style.display == 'none') {
    responsiveMenu.style.display = 'flex';
  } else {
    responsiveMenu.style.display = 'none';
  }
};
