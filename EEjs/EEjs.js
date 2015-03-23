window.onload = startForm;


function alertbox() {
    alert("I am an alert box!");
}
// function checkForm1() 
// {
	// if (document.getElementById("item-0-0").checked = false) {
       // alert("You must select at least one product!");
       // return false;
	// }else {
	// return true;
	// }
// }
// document.getElementById("item-0-0").checked = false;
function resetForm1() 
{
   location.reload();
}




function startForm() 
{
   
   

   // document.forms[0].onsubmit = checkForm1;
   document.forms[0].onreset = resetForm1;
}






// if ($("#formID input:checkbox:checked").length > 0)
// {
    // // any one is checked
// }