$(function(){
  
  $('.m-form-control').each(function(){
    changeState($(this));
  });
  
  $('.m-form-control').on('focusout', function(){
    changeState($(this)); 
  });

  /*
  $('.m-snackbar').each(function(){
    Msnackbar($('.m-snackbar'));
  });
  */
  

  $('.m-sb-triggar').on('click', function(){
    Msnackbar($('.m-snackbar')); 
  });
  
  //function changeState()
  function changeState($formControl){
    if($formControl.val().length > 0){
      $formControl.addClass('has-value');
    }
    else{
      $formControl.removeClass('has-value');
    }  
    //end changeSate function()

    
    
    //function wave-effect
    /*
    var buttons = document.getElementsByClassName('waves-effect');

    Array.prototype.forEach.call(buttons, function(b){
      b.addEventListener('click',waveEffect);
    });

    function waveEffect(e){

        var circle = document.createElement('div');
        this.appendChild(circle);
    
        var d = Math.max(this.clientWidth, this.clientHeight);
    
        circle.style.width = circle.style.height = d + 'px';
        
        var rect = this.getBoundingClientRect();
        circle.style.left = e.clientX - rect.left -d/2 + 'px';
        circle.style.top = e.clientY - rect.top - d/2 + 'px';
    
        console.log(this);
    
        circle.classList.add('waves-effect');
    }
    */
    //end wave-effect
  }


  //snackbar
  function Msnackbar($class) {

    $class.addClass("show");
    //after 3 seconds remove the show class
    setTimeout(function(){$class.removeClass("show")}, 3000);

  }//end snackbar


  

});
