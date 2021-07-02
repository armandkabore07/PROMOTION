
  //**************************************************/
  console.log("jequery code");
  var selected_option_text_default = $("#type_id option:selected").text().trim();
  //$("#montantdepense").hide();
  if(selected_option_text_default==='Information' || selected_option_text_default==='Aucun'){ $("#montantdepense").hide();}
  else{$("#montantdepense").show();};

  $("#type_id").change(function(){
      //var selected_option = $("#type_id").val();
      var selected_option_text = $("#type_id option:selected").text().trim();
      //console.log(selected_option_text);

      if(selected_option_text==='Information' || selected_option_text==='Aucun'){
          //console.log("info");
          //$("#montantdepense").prop('disabled', true);
          $("#montantdepense").hide(); 
      }else{
         // console.log("Autre");
         //$("#montantdepense").prop('disabled', false);
         $("#montantdepense").show();
      }

  });

 
/*


$(document).ready(function() {
   
$(".navbar .nav-link").click(function() {
              
    // Select all list items
    var listItems = $(".navbar .nav-link");
      
    // Remove 'active' tag for all list items
    for (let i = 0; i < listItems.length; i++) {
        listItems[i].classList.remove("active");
    }
      
    // Add 'active' tag for currently selected item
    this.classList.add("active");
});
}); */