$(".edit-table-row").on("click", function() {
  displayEditForm(getRowData(this));
});

function getRowData(elt) {
  var keysRow = $("#table-keys");
  var keysColumns = keysRow.find("th");
  var valuesRow = $(elt).closest("tr");
  var valuesColumns = valuesRow.find("td");
  var data = {};
  for (var i = 0; i < keysColumns.length - 1; i++) {
    data[$(keysColumns[i]).text()]=$(valuesColumns[i]).text();
  }
  return data;
}

function displayEditForm(data) {
  editForm=$("#edit-form");
  formInputs=$("#edit-form .form-inputs").first();
  for (const key in data) {
    formInputs.append("<label>"+key+"</label>");
    input="<input type='text' name=\""+key+"\" value=\""+data[key]+"\"></input>";
    console.log(input);
    formInputs.append(input);
  }
  editForm.css("visibility","visible");
  editForm.css("opacity",1);
}

$(form).on("submit", function() {
  
}


formInputs = $('.form-inputs > input'),
