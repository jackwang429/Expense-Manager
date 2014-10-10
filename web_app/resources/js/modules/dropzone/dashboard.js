$(document).ready(function()
{
    Dropzone.options.myAwesomeDropzone =
    {
        maxFilesize: 2, // MB
        maxFiles:1,
        accept: function(file, done)
        {
            if(getFileExtension(file.name)=='db')
                done();
            else
                foundation_alert($('.login-box'),"The File is not a SQLite DB");
        }
    };
});