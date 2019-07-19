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

function PopulateSelect2(selectID, source, multiSelect = false)
{
	$('#'+selectID).select2
	(
		{
			placeholder: '--- Select Item ---',
			ajax: {
			url: source,
			dataType: 'json',
			multiple: multiSelect,
			delay: 250,
			processResults: function (data) {
				return {
				results: data
				};
			},
			cache: true
			}
		}
	)
	//var dataOptions = new Array();
	//Format into JSON items
	//for(var i = 0; i < data.length; i++)
	//{
	//	var item = {
	//		id: data[i][0],
	//		text: data[i][1]
	//	}

	//	dataOptions.push(item);
	//}

	//alert(data.length);

	/* (function() {
		// init select 2
		$('#'+selectID).select2({
		  data: data,
		  placeholder: 'Select an option...',
		  multiple: multiSelect,
		  // query with pagination
		  query: function(q) {
			var pageSize,
			  results,
			  that = this;
			pageSize = 20; // or whatever pagesize
			results = [];
			if (q.term && q.term !== '') {
			  // HEADS UP; for the _.filter function i use underscore (actually lo-dash) here
			  results = _.filter(that.data, function(e) {
				return e.text.toUpperCase().indexOf(q.term.toUpperCase()) >= 0;
			  });
			} else if (q.term === '') {
			  results = that.data;
			}
			q.callback({
			  results: results.slice((q.page - 1) * pageSize, q.page * pageSize),
			  more: results.length >= q.page * pageSize,
			});
		  },
		});
		$('#'+selectID).trigger('change');
	  })(); */

	  

	//for(var i = 0; i < data.length; i++){

	//	var item = {
	//		id: data[i][0],
	//		text: data[i][1]
	//	}
		
	//	AddSelect2Item(selectID, item);
	//	$('#'+selectID).trigger('change');
}

