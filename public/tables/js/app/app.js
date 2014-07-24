define(function(require) {
    var $ = require('jquery'),
        List = require('list');

    var listOptions = {
        valueNames: ['Name','Place','City','Age Group','Gender']
    };
    var l = new List('marathon', listOptions);
    $('.js-filter').on('change', function() {
        var field = $(this).attr('data-filter'),
            value = this.value;
        l.filter(function(item) {
            return (item.values()[field] === value)
        });
    });
    $('.js-search').on('input change', function(ev) {
        var field = $(this).attr('data-search');
        l.search(this.value, [field]);
    });
});
