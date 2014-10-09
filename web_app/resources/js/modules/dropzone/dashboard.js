$(document).ready(function()
{
    Dropzone.options.myAwesomeDropzone = {
        maxFilesize: 2, // MB
        maxFiles:1,
        accept: function(file, done) {
            done();
        }
    };
});