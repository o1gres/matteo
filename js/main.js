function check_l_p(){
  
  if ($("input#uname").val() == ""){
      $("input#uname").addClass("border_red");
      return false;
  }
  
  if ($("input#upass").val() == ""){
      $("input#upass").addClass("border_red");
      return false;
  }
}

function remove_red_l(){
  $("input#uname").removeClass("border_red");
}

function remove_red_p(){
  $("input#upass").removeClass("border_red");
}

