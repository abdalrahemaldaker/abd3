


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Multiple, remote</title>
  <link rel="stylesheet" href="/test/jquery-ui.css">
  <link rel="stylesheet" href="/test/style.css">
  <style>
  .ui-autocomplete-loading {
    background: white url("test/ui-anim_basic_16x16.gif") right center no-repeat;
  }
  </style>
</head>
<body>


<div class="ui-widget">
  <label for="birds">Birds: </label>
  <input id="birds" size="50">
</div>

<script src="/test/jquery-3.6.0.js"></script>
<script src="/test/jquery-ui.js"></script>
<script>
$( function() {
  function split( val ) {
    return val.split( /,\s*/ );
  }
  function extractLast( term ) {
    return split( term ).pop();
  }

  $( "#birds" )
    // don't navigate away from the field on tab when selecting an item
    .on( "keydown", function( event ) {
      if ( event.keyCode === $.ui.keyCode.TAB &&
          $( this ).autocomplete( "instance" ).menu.active ) {
        event.preventDefault();
      }
    })
    .autocomplete({
      source: function( request, response ) {
        $.getJSON( "{{ route('/sclasses.autocomplete-search') }}", {
          term: extractLast( request.term )
        }, response );
      },
      search: function() {
        // custom minLength
        var term = extractLast( this.value );
        if ( term.length < 2 ) {
          return false;
        }
      },
      focus: function() {
        // prevent value inserted on focus
        return false;
      },
      select: function( event, ui ) {
        var terms = split( this.value );
        // remove the current input
        terms.pop();
        // add the selected item
        terms.push( ui.item.value );
        // add placeholder to get the comma-and-space at the end
        terms.push( "" );
        this.value = terms.join( ", " );
        return false;
      }
    });
} );
</script>
</body>
</html>
