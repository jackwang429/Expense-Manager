function getFileExtension(filename)
{
    var a = filename.split(".");
    if( a.length === 1 || ( a[0] === "" && a.length === 2 ) ) {
        return "";
    }
    return a.pop();
}

function foundation_alert(div,message)
{
    console.log("Alert >> " + message);
    div.append('<div class="custom-alert-box"><hr><div data-alert class="alert-box warning"> '+message+'</div></div>');
    window.setTimeout(
        function()
        {
            $('.custom-alert-box').fadeOut();
        },1000);
}
