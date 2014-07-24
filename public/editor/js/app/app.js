define(function(require) {
    var $ = require('jquery'),
        editor = null;
    require('pen');

    if($('#pen')) {
        editor = new Pen({
            editor: $('#pen')[0],
            stay: false
        });
    }
});
