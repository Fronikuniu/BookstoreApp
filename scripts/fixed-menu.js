window.onscroll = () => {
    StickyMenu()
};

    var nav = document.getElementById("menu");
    var sticky = nav.offsetTop;

    function StickyMenu() {
        if (window.pageYOffset > sticky) {
            nav.classList.add("sticky");
        } else {
            nav.classList.remove("sticky");
        }
    }
