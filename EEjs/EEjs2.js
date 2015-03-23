



//Output table commands:
//var textA = $('label[for=item-0-0]').text();
//var or_this = $('#pre-payment').next('label').text();

$( ".assetsGroup input" ).on( "click", function() {	
	$( "#out1name" ).html("Add-on " + $('label[for=item-0-0]').text() + "" );
	$( "#out1item").html("Version: " + $( ".assetsGroup input:checked" ).next('label').text() + " is selected!" );
});

$( ".matrixGroup input" ).on( "click", function() {	
	$( "#out2name" ).html("Add-on " + $('label[for=item-0-1]').text() + "" );
	$( "#out2item").html("Version: " + $( ".matrixGroup input:checked" ).next('label').text() + " is selected!" );
});

$( ".structureGroup input" ).on( "click", function() {	
	$( "#out3name" ).html("Add-on " + $('label[for=item-0-2]').text() + "" );
	$( "#out3item").html("Version: " + $( ".structureGroup input:checked" ).next('label').text() + " is selected!" );
});

$( ".wygwamGroup input" ).on( "click", function() {	
	$( "#out4name" ).html("Add-on " + $('label[for=item-0-3]').text() + "" );
	$( "#out4item").html("Version: " + $( ".wygwamGroup input:checked" ).next('label').text() + " is selected!" );
});
//Output table End//





//Assets commands:
// $( ".assetsGroup input" ).on( "click", function() {	
	// $( "#log1").html("This: " + $( ".assetsGroup input:checked" ).val() + " is checked!" );
	// //$( "#out1item").html("This: " + $( ".assetsGroup input:checked" ).val() + " is checked!" );
	// //console.log(this.value);
// });

$( ".assetsGroup input" ).on( "click", function() {		
	$( ".assets" ).prop("checked", true );
	//console.log(this.value);
});

$('.assets').change(function() {
    if ($(this).attr('checked', false)) {
		$('.assetsGroup input[type="radio"]').each(function(){
			$(this).prop('checked', false); 
		});
		$( "#log1").html( "" );		
		$( "#out1name").html( "" );
		$( "#out1item").html( "" );		
    }    
});
//End assets commands

//Matrix commands:
// $( ".matrixGroup input" ).on( "click", function() {	
	// $( "#log2" ).html("This: " + $( ".matrixGroup input:checked" ).val() + " is checked!" );
	// console.log(this.value);
// });

$( ".matrixGroup input" ).on( "click", function() {	
	$( ".matrix" ).prop("checked", true );
	console.log(this.value);
});

$('.matrix').change(function() {
    if ($(this).attr('checked', false)) {
		$('.matrixGroup input[type="radio"]').each(function(){
			$(this).prop('checked', false); 
		});
		$( "#log2").html( "" );		
		$( "#out2name").html( "" );
		$( "#out2item").html( "" );	
    }    
});
//End matrix commands

//Structure commands:
// $( ".structureGroup input" ).on( "click", function() {	
	// $( "#log3" ).html("This: " + $( ".structureGroup input:checked" ).val() + " is checked!" );
	// console.log(this.value);
// });

$( ".structureGroup input" ).on( "click", function() {	
	$( ".structure" ).prop("checked", true );
	console.log(this.value);
});

$('.structure').change(function() {
    if ($(this).attr('checked', false)) {
		$('.structureGroup input[type="radio"]').each(function(){
			$(this).prop('checked', false); 
		});
		$( "#log3").html( "" );		
		$( "#out3name").html( "" );
		$( "#out3item").html( "" );	
    }    
});
//End Structure commands

//Wygwam commands:
// $( ".wygwamGroup input" ).on( "click", function() {	
	// $( "#log4" ).html("This: " + $( ".wygwamGroup input:checked" ).val() + " is checked!" );
	// console.log(this.value);
// });

$( ".wygwamGroup input" ).on( "click", function() {	
	$( ".wygwam" ).prop("checked", true );
	console.log(this.value);
});

$('.wygwam').change(function() {
    if ($(this).attr('checked', false)) {
		$('.wygwamGroup input[type="radio"]').each(function(){
			$(this).prop('checked', false); 
		});
		$( "#log4").html( "" );		
		$( "#out4name").html( "" );
		$( "#out4item").html( "" );	
    }    
});
//End Wygwam commands




