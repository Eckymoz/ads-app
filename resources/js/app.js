import './bootstrap';
import '@tabler/core/src/js/tabler.js';
import 'bootstrap/js/dist/dropdown.js';
import TomSelect from "tom-select";
import hljs      from "highlight.js";
import Quill     from "quill";
import { createApp } from 'vue';
import AdsFilters from "./components/AdsFilters.vue";
import AdsList from "./components/AdsList.vue";
import AdsCard from "./components/AdsList.vue";

window.TomSelect = TomSelect;
window.hljs      = hljs;
window.Quill     = Quill;

createApp({})
    .component('AdsFilters', AdsFilters)
    .component('AdsList',    AdsList)
    .component('AdsCard',    AdsCard)
    .mount('#app')
