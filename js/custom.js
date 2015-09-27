// Custom JS for the Theme

// Config 
//-------------------------------------------------------------
var $ = jQuery.noConflict();
var companyName = "Car Rental Station"; // Enter your event title


// Initialize Tooltip  
//-------------------------------------------------------------

$('.my-tooltip').tooltip();



// Initialize jQuery Placeholder  
//-------------------------------------------------------------

// $('input, textarea').placeholder();



// Toggle Header / Nav  
//-------------------------------------------------------------

$(document).on("scroll",function(){
  if($(document).scrollTop()>39){
    $("header").removeClass("large").addClass("small");
  }
  else{
    $("header").removeClass("small").addClass("large");
  }
});


//-------------------------------------------------------------------------------
// setup autocomplete - pulling from locations-autocomplete.js
//-------------------------------------------------------------------------------


function validateNotEmpty(data){
  if (data == ''){
    return true;
  }else{
    return false;
  }
}





