requirejs.config({
    baseUrl: '/vendor',
    paths: {
        jquery: 'jquery/dist/jquery.min',
        list: 'list.js/dist/list',
        app: '/tables/js/app/app'
    },
});
requirejs(['app']);
