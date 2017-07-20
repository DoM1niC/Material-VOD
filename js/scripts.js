  $(document).ready(function(){  
	var bar = $('.determinate');
        var percent = $('.percent');
        var status = $('#status');

        $('#uploadForm').ajaxForm({
            beforeSubmit: function () {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function (event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function (xhr) {
	    $( "#status" ).html("<button class='btn btn-default green left'>Upload erfolgreich</button>&nbsp;&nbsp;<button class='btn btn-default orange'>Convertierung läuft!</button>");
setTimeout(function() {
      // Do something after 5 seconds
      location.reload();//reload page
}, 3000);       }
});
$('#uploadForm').find('input[type=file]').change(function(e){
    var ext = this.value.match(/\.([^\.]+)$/)[1];
    switch(ext)
    {
        case 'mp4':
        case 'mkv': 
        case 'avi': 
            break;
        default:
            this.value='';
    }
});

   $('.parallax').parallax();
   $('.scrollspy').scrollSpy();
   $('.collapsible').collapsible();
   $('.modal').modal();
   $('select').material_select();
   $('ul.tabs').tabs();
   $('#loader').addClass("hide-loader");
   $("html").niceScroll({styler:"fb",cursorcolor:"#303F9F", cursorwidth: '10', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});
   $('.button-collapse').sideNav({
    edge: 'left', // Choose the horizontal origin
    menuWidth: 240
  }
);  
});   
document.addEventListener('submit', function () { document.getElementsByTagName('body')[0].insertAdjacentHTML('beforeend', '<div class="trans"><div class="mloader"></div></div>'); });