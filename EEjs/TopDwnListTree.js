
// This function selects all children in the tree when a parent object is selected.
$(".cptjs-css3-treeview").delegate("label input:checkbox", "change", function() {
	var	checkbox = $(this);
	var	nestedList = checkbox.parent().next().next();
	var	selectNestedListCheckbox = nestedList.find("label:not([for]) input:checkbox");			 
	if(checkbox.is(":checked")) 
	{
		return selectNestedListCheckbox.prop("checked", true);
	}
	selectNestedListCheckbox.prop("checked", false);
});
// console.log("hello");


