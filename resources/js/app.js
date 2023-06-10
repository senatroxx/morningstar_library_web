import.meta.glob(["../images/**", "../fonts/**"]);

import Swiper from "swiper";
import "swiper/css";

import flatpickr from "flatpickr";
import "./bootstrap";
import "./plugins/perfect-scrollbar.min";
import "../css/perfect-scrollbar.css";
import "../css/tooltips.css";
import "./perfect-scrollbar";
import "./carousel";
import "./nav-pills";
import "./navbar-collapse";
import "./navbar-sticky";
// import "./sidenav-burger";
import "./tooltips";
// import "./dropdown";

window.flatpickr = flatpickr;
window.Swiper = Swiper;
