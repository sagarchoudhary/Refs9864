$(document).ready(function(){
   		
      if($("#checkbox").is(':checked')){
    	 $('input[type="submit"]').removeAttr('disabled');}
		  else{
			 $('input[type="submit"]').attr('disabled','disabled');}

   		var $radios = $('input:radio[name=sex]');
    	$radios.filter('[value=female]').prop('checked', true);
  		var x = Math.floor((Math.random() * 10) + 1);
   		$("#c1").text(x);
   		var y = Math.floor((Math.random() * 10) + 1);
   		$("#c2").text(y);
   	 
   		$("#sub").click(function(){
    		var z=($("#ctext").val());
        var a=($("#username").val());
        var b=($("#password").val());
        	if( z==(x+y)){
        	}
        	else{
        		alert("Captcha error");
        	}
          if( a==""||b==""){
          alert("Please Enter valid username or password");
          }
          

        
   		}); 
      $("#username").blur(function(){
          var a=($("#username").val());
          if( a==""){
            $("#username").removeClass("input");
              $("#username").addClass("warning");
          }
          else{
              $("#username").addClass("input");
              $("#username").removeClass("warning");          
          } 
      });
      $("#password").blur(function(){
          var a=($("#password").val());
          if( a==""){
            $("#password").removeClass("input");
              $("#password").addClass("warning");
          }
          else{
              $("#password").addClass("input");
              $("#password").removeClass("warning");          
          } 
      });
    
    	$("#male").click(function(){
    		$("#male").removeClass("male-old");
        $("#male").addClass("male");
    		$("#female").removeClass("female");
        $("#female").addClass("female-old");
    		var $radios = $('input:radio[name=sex]');
        	$radios.filter('[value=male]').prop('checked', true);

    	});
    	$("#female").click(function(){
    		$("#female").addClass("female");
        $("#female").removeClass("female-old");
    		$("#male").removeClass("male");
        $("#male").addClass("male-old");
			var $radios = $('input:radio[name=sex]');
        	$radios.filter('[value=female]').prop('checked', true);    
    	});
    	$("#checkbox").click(function(){
    		if($("#checkbox").is(':checked')){
    			$('input[type="submit"]').removeAttr('disabled');}
			else{
				$('input[type="submit"]').attr('disabled','disabled');}

    	}); 	  
    });