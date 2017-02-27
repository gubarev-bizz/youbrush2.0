
window.addEventListener('load', function () {
    var app = new Vue({
        delimiters: ['${', '}'],
        el: '#app',
        data: {
            themeId: null,
            components: null
        },
        mounted: function () {
            this.themeId = this.$el.getAttribute('data-themeId');
            this.$http.get('/app_dev.php/theme/constructor/' + this.themeId + '/api/load-components/').then(function (response) {
                this.components = response.body.components;
            });
        }
    });
});
