//var siteURL = "http://admin.magicneedle.org/";
var siteURL = "http://nobin-pc:7070/magic-needle/";
$(document).ready(function(){
    $('#clickmewow').click(function(){
        $('#radio1003').attr('checked', 'checked');
    });
});

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function isValidPercentage1(evt) {
    var val1;
    console.log(evt);
    if (!(evt.charCode == 46 || (evt.charCode >= 48 && evt.charCode <= 57)))
        return false;
    var parts = evt.srcElement.value.split('.');
    if (parts.length > 2)
        return false;
    if (evt.charCode == 46)
        return (parts.length == 1);
    if (evt.charCode != 46) {
        var currVal = String.fromCharCode(evt.charCode);
        val1 = parseFloat(String(parts[0]) + String(currVal));
        if(parts.length==2)
            val1 = parseFloat(String(parts[0])+ "." + String(currVal));
    }

    if (val1 > 99.99)
        return false;
    if (parts.length == 2 && parts[1].length >= 2) return false;
}

(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  };
}(jQuery));
