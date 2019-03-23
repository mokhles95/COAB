(function(){
var 
	form = $('#pdf'),
	cache_width = form.width(),
	a4  =[ 595.28,  841.89];  // for a4 size paper width and height

$('#create_pdf').on('click',function(){
	$('.aaa').hide();
	$('body').scrollTop(0);
	createPDF();
	 setTimeout(function(){ location.reload(); }, 3000);
	
});
//create pdf
function createPDF(){
	getCanvas().then(function(canvas){
		var 
		img = canvas.toDataURL("../../img/"),
		doc = new jsPDF({
          unit:'px', 
          format:'a4'
        });     
        doc.addImage(img, 'JPEG', 20, 20);
        doc.save('profil.pdf');
        form.width(cache_width);
	});
	
}

// create canvas object
function getCanvas(){
	form.width((a4[0]*1.33333) -80).css('max-width','none');
	return html2canvas(form,{
    	imageTimeout:2000,
    	removeContainer:true
    });	
}

}());