$('#toggleimage').on('click',function(event){
		
       $('#moreimages').slideToggle();
       event.stopPropagation();
       if($(this).text() == 'View more pictures'){
           $(this).text('View less pictures');
       } else {
          $(this).text('View more pictures');
       }
});

$('#show').on('click',function(event){
	event.stopPropagation();
       $('#fileinput').slideToggle();

       if($(this).text() == 'Show less'){
           $(this).text('Add file');
       } else {
           $(this).text('Show less');
       }
});





function textWithSmilies(text) { // Function that change the textarea content in a string including smilies icons
	// Create 2 array: 1 containing the smiley BBCode, the second containing a part of their file name
	var findSmiliesShortcuts = [/:smile:/g, /:sad:/g, /:arrow:/g, /:cool:/g, /:cry:/g, /:grin:/g, /:confused:/g, /:bigeyes:/g, /:evil:/g, /:exclaim:/g, /:geek:/g, /:idea:/g, /:lol:/g, /:mad:/g, /:green:/g, /:neutral:/g, /:question:/g, /:happy:/g, /:redface:/g, /:rolleyes:/g, /:surprised:/g, /:devil:/g, /:wink:/g];
	var replaceSmiliesImg = ['smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink'];
	
	for (i = 0; i < findSmiliesShortcuts.length; i++) {
		text = text.replace(findSmiliesShortcuts[i], '<img src="/images/smilies/icon_' + replaceSmiliesImg[i] + '.gif" alt="" />'); // Replace all smilies BBCode by their image
	}
	text = text.replace(/\n/g, '<br />'); // Replace new lines by <br />
	return text;
}
 
$(function() {
	// This function allow to insert text or smiley in the textarea where the cursor is
	jQuery.fn.extend({
	insertAtCaret: function(myValue) {
	  return this.each(function(i) {
		if (document.selection) {
		  //For browsers like Internet Explorer
		  this.focus();
		  sel = document.selection.createRange();
		  sel.text = myValue;
		  this.focus();
		}
		else if (this.selectionStart || this.selectionStart == '0') {
		  //For browsers like Firefox and Webkit based
		  var startPos = this.selectionStart;
		  var endPos = this.selectionEnd;
		  var scrollTop = this.scrollTop;
		  this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
		  this.focus();
		  this.selectionStart = startPos + myValue.length;
		  this.selectionEnd = startPos + myValue.length;
		  this.scrollTop = scrollTop;
		} else {
		  this.value += myValue;
		  this.focus();
		}
	  })
	}
	});
 
	
	
	
 
	$('img#addSmiley').on('click', function() { // When click on a smiley
		smiley = $(this).attr('alt'); // We take it's attribute alt which contains the unique smiley BBCode choosen
		$('#myTextarea').insertAtCaret(smiley); // Call the function "insertAtCaret" and insert the smiley BBCode in the textarea where the cursor is
		
		var text = textWithSmilies($('#myTextarea').val()); // Call function "textWithSmilies" and change smilies BBCode by their icon
		$('#output').html(text); // Display in div=output markup
				
		return false;
	});
	
	$('#myTextarea').keyup(function(){ // When keyup in the textarea (when you pull up the key)
		var text = textWithSmilies($(this).val()); // Call function "textWithSmilies" and change smilies BBCode by their icon
		$('#myTextarea').html(text); // Display in div=output markup
	});
});

$(document).ready(function() {
  $("#myTextarea").on("keyup",function(){
    var h = $(this).height();

    $(this).css("height","60px");
    var sh = $(this).prop("scrollHeight");
    var minh = $(this).css("min-height").replace("px", "");
    $(this).css("height",Math.max(sh,minh)+"px");  
  });
});



    

