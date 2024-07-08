import "./bootstrap";

import {createApp} from "vue";

import App from "./components/App.vue";

import ElementPlus from "element-plus";
import "element-plus/dist/index.css";
import "element-plus/theme-chalk/dark/css-vars.css"

const app = createApp(App);

app.use(ElementPlus);
app.mount("#app");
