function saveForms() {
  $.cookie('savedate', new Date(), {expires: 5*365});
  $("input").each(function() {
    var type = $(this).attr('type');
    var name = $(this).attr('name');
    switch(type) {
      case "text":
        var value = $(this).val();
        break;
      case "checkbox":
        var value = $(this).prop("checked") ? "t" : "f";
        break;
    }
    // Cookie valid for 5 years.
    $.cookie(name, value, {expires: 5*365});
  });
}
function loadForms() {
  if ($.cookie('savedate') == undefined) {
    return;
  }
  $("input").each(function() {
    var type = $(this).attr('type');
    var name = $(this).attr('name');
    var value = $.cookie(name);
    switch(type) {
      case "text":
        $(this).val(value);
        break;
      case "checkbox":
        $(this).prop("checked", value == "t" ? true : false)
        break;
    }
  });
}
$(document).ready(function() {
  loadForms();
  $("#save").click(saveForms);
});