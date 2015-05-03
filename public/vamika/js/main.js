Date.prototype.customFormat = function(formatString){
    var YYYY,YY,MMMM,MMM,MM,M,DDDD,DDD,DD,D,hhh,hh,h,mm,m,ss,s,ampm,AMPM,dMod,th;
    var dateObject = this;
    YY = ((YYYY=dateObject.getFullYear())+"").slice(-2);
    MM = (M=dateObject.getMonth()+1)<10?('0'+M):M;
    MMM = (MMMM=["January","February","March","April","May","June","July","August","September","October","November","December"][M-1]).substring(0,3);
    DD = (D=dateObject.getDate())<10?('0'+D):D;
    DDD = (DDDD=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][dateObject.getDay()]).substring(0,3);
    th=(D>=10&&D<=20)?'th':((dMod=D%10)==1)?'st':(dMod==2)?'nd':(dMod==3)?'rd':'th';
    formatString = formatString.replace("#YYYY#",YYYY).replace("#YY#",YY).replace("#MMMM#",MMMM).replace("#MMM#",MMM).replace("#MM#",MM).replace("#M#",M).replace("#DDDD#",DDDD).replace("#DDD#",DDD).replace("#DD#",DD).replace("#D#",D).replace("#th#",th);

    h=(hhh=dateObject.getHours());
    if (h==0) h=24;
    if (h>12) h-=12;
    hh = h<10?('0'+h):h;
    AMPM=(ampm=hhh<12?'am':'pm').toUpperCase();
    mm=(m=dateObject.getMinutes())<10?('0'+m):m;
    ss=(s=dateObject.getSeconds())<10?('0'+s):s;
    return formatString.replace("#hhh#",hhh).replace("#hh#",hh).replace("#h#",h).replace("#mm#",mm).replace("#m#",m).replace("#ss#",ss).replace("#s#",s).replace("#ampm#",ampm).replace("#AMPM#",AMPM);
}

$( document ).ready(function() {
    $( ".nav-sidebar li.dropdown > a" ).click(function() {
		$( this ).parent().find(" > ul").slideToggle();
	});
	
	$('.sidebar [data-toggle=offcanvas]').click(function() {
		$(this).find('i').toggleClass('fa-chevron-right fa-chevron-left');
		$('.sidebar').find("a").toggleClass('previous');
		$('.sidebar').find("span.a-text").toggleClass('hidden-xs');
		$('.sidebar').toggleClass('col-xs-2 col-xs-12');
		$('.main-col').toggleClass('col-xs-10 col-xs-12');
	});
	$('a#logout').click(function(e) {
		e.preventDefault(); 
	    $('form#logout').submit();
	});
	$('#name, #title').keyup(function(){
		var text = convertToSlug($(this).val());
	    $("#slug").val(text); 
	});
    $('select.search-box').change(function(){
        $(this).closest('form').submit();
    });
    $("input#select-all" ).on( "click", function() {
        if($(this).is(":checked")) {
            $('.id_checkbox').prop('checked', true);
        } else {
            $('.id_checkbox').prop('checked', false);
        }
    });
    $('a.advance-search-link').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $collapse = $this.closest('.collapse-group').find('.collapse');
        $('.advance-search-div').collapse('toggle');
    });
    /*$('input.search-box').blur(function(){
        $(this).closest('form').submit();
    });*/
});
function convertToSlug(Text)
{
	Text = Text.trim();
    return Text
        .toLowerCase()
        .replace(/\./g, ' ')
        .replace(/&/g, 'and')
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
$('a.confirmdelete').click(function(e){
	if (!confirm("Are you sure to delete?")) {
		e.preventDefault(); 
	}
});

$('.ajaxdelete').on('click', 'a.confirmajaxdelete', function (e) {
	if (confirm("Are you sure to delete?")) {
		var div = $(this).closest('.ajaxdelete');
        $.ajax({
            url: $(this).attr("href"),
            type: "delete",
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Accept", "application/json");
                xhr.setRequestHeader("Content-Type", "application/json");
            },
            success: function(smartphone) {
            	div.remove();
            }
        });
        e.preventDefault();
	}
});