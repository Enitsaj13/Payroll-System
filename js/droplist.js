//   Selecting the department and position, dynamically

// object literal holding data for option elements
var Select_List_Data = {
  position: {
    // name of associated select box

    // names match option values in controlling select box
    IT_Department: {
      text: [
        "Encoder",
        "Programmer",
        "Designer",
        "Project Manager",
        "DB Admin",
      ],
      value: [
        "Encoder",
        "Programmer",
        "Designer",
        "Project Manager",
        "DB Admin",
      ],
    },
    Accountant: {
      text: ["Junior Accountant", "Head Accountant"],
      value: ["Junior Accountant", "Head Accountant"],
    },
    Sales: {
      text: ["Sales Representative", "Sales Manager"],
      value: ["Sales Representative", "Sales Manager"],
    },
    Head_Office: {
      text: ["Department Secretary", "Office Clerk", "Liaison"],
      value: ["Department Secretary", "Office Clerk", "Liaison"],
    },
  },
};

// removes all option elements in select box
// removeGrp (optional) boolean to remove optgroups
function removeAllOptions(sel, removeGrp) {
  var len, groups, par;
  if (removeGrp) {
    groups = sel.getElementsByTagName("optgroup");
    len = groups.length;
    for (var i = len; i; i--) {
      sel.removeChild(groups[i - 1]);
    }
  }

  len = sel.options.length;
  for (var i = len; i; i--) {
    par = sel.options[i - 1].parentNode;
    par.removeChild(sel.options[i - 1]);
  }
}

function appendDataToSelect(sel, obj) {
  var f = document.createDocumentFragment();
  var labels = [],
    group,
    opts;

  function addOptions(obj) {
    var f = document.createDocumentFragment();
    var o;

    for (var i = 0, len = obj.text.length; i < len; i++) {
      o = document.createElement("option");
      o.appendChild(document.createTextNode(obj.text[i]));

      if (obj.value) {
        o.value = obj.value[i];
      }

      f.appendChild(o);
    }
    return f;
  }

  if (obj.text) {
    opts = addOptions(obj);
    f.appendChild(opts);
  } else {
    for (var prop in obj) {
      if (obj.hasOwnProperty(prop)) {
        labels.push(prop);
      }
    }

    for (var i = 0, len = labels.length; i < len; i++) {
      group = document.createElement("optgroup");
      group.label = labels[i];
      f.appendChild(group);
      opts = addOptions(obj[labels[i]]);
      group.appendChild(opts);
    }
  }
  sel.appendChild(f);
}

// anonymous function assigned to onchange event of controlling select box
document.forms["regform"].elements["department"].onchange = function (e) {
  // name of associated select box
  var relName = "position";

  // reference to associated select box
  var relList = this.form.elements[relName];

  // get data from object literal based on selection in controlling select box (this.value)
  var obj = Select_List_Data[relName][this.value];

  // remove current option elements
  removeAllOptions(relList, true);

  // call function to add optgroup/option elements
  // pass reference to associated select box and data for new options
  appendDataToSelect(relList, obj);
};

// populate associated select box as page loads
(function () {
  // immediate function to avoid globals

  var form = document.forms["regform"];

  // reference to controlling select box
  var sel = form.elements["department"];
  sel.selectedIndex = 0;

  // name of associated select box
  var relName = "position";
  // reference to associated select box
  var rel = form.elements[relName];

  // get data for associated select box passing its name
  // and value of selected in controlling select box
  var data = Select_List_Data[relName][sel.value];

  // add options to associated select box
  appendDataToSelect(rel, data);
})();
