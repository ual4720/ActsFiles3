//All Chosen-Select class select boxes
$(document).ready(function(){
	$(".select2").select2();
	//PopulateEventsSelect2("DropdownCheckInEvent", events);
	//PopulatePeopleSelect2("DropdownCheckInPerson", people);
	
	//PopulateFamilySelect2("DropdownCurrentFamilies", families);
	//PopulateAddressSelect2("DropdownNewPersonAddress", addresses);
	
	//$('#DropdownCurrentFamilies').val(['2','4']).trigger('change');
});

//Add Select2 Item to dropdown
function AddSelect2Item(selectID, item){
	var newOption = new Option(item.text, item.id, false, false);
	$('#'+selectID).append(newOption);
}

function PopulateSelect2(selectID, data)
{
	for(var i = 0; i < data.length; i++){

		var item = {
			id: data[i][0],
			text: data[i][1]
		}
		
		AddSelect2Item(selectID, item);
		$('#'+selectID).trigger('change');
	}
}