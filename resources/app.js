import Vue from 'vue';

const requireContext = require.context('./', true, /\.vue$/);

requireContext.keys()
    .map(file =>
        [file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
    )
    .forEach(([name, component]) => {
        const componentName = name
            .split('/')
            .pop();

        Vue.component(componentName, component.default || component);
    }, {})

window.addEventListener('DOMContentLoaded', () => {
    new Vue({
        el: '#app',
    });
});
