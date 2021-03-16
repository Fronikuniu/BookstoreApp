window.onscroll = () => {
  StickyMenu();
};

let nav = document.getElementById('menu');
let sticky = nav.offsetTop;

function StickyMenu() {
  if (window.pageYOffset > sticky) {
    nav.classList.add('sticky');
  } else {
    nav.classList.remove('sticky');
  }
}
