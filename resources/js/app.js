import './bootstrap';
import 'flatpickr/dist/flatpickr.min.css';
import 'flowbite';
import Alpine from 'alpinejs';
import flatpickr from "flatpickr";
window.Alpine = Alpine;

Alpine.start();
const dateRangePicker = document.getElementById('dateRangePicker');
flatpickr(dateRangePicker, {});
