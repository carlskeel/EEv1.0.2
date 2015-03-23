

//Assets commands:
$( ".assetsGroup input" ).on( "click", function() {	
	//$( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
	$( ".assets" ).prop("checked", true );
	console.log(this.value);
});
$('.assets').change(function() {
    if ($(this).attr('checked', false)) {
		$('.assetsGroup input[type="radio"]').each(function(){
			$(this).prop('checked', false); 
		});        
    }    
});
//End assets commands







//$('input[name="optionsRadiosAssets"]')[0].checked = false;
// $( ".assetsGroup radio" ).on("click"function() {
// $( "*" ).removeClass( "hilite" );
// var kids = $(".assets label").text();
// var len = kids.addClass( "hilite" ).length;
// $( "#results label:first" ).text( len );
// $( "#results label:last" ).text( event.target.tagName );
// event.preventDefault();
// });

// $(".addons").on("click"function(){
	
    // var checked = $(".addons input:checked").length > 0;
    // if (!checked){
        // alert("Please check at least one checkbox");
        // return false;
    // }else{
	// $("#form1").submit();
	// }
	
// });

// $( ".assetsGroup radio" ).click(function ( event ) {
// $( "*" ).removeClass( "hilite" );
// var kids = $( event.target ).children();
// var len = kids.addClass( "hilite" ).length;
// $( "#results span:first" ).text( len );
// $( "#results span:last" ).text( event.target.tagName );
// event.preventDefault();
// });

