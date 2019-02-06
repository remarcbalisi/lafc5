
var awsmDialog = (function(){
    function $(selector){
      return document.querySelector(selector);
    }
  
    function create(tag, cl, txt){
      var el = document.createElement('div');
      el.className = cl;
      if(txt){
        var newContent = document.createTextNode(txt);
        el.appendChild(newContent);
      }
      return el;
    }
    
    var dialog = $('.awsm-dialog'),
      okCallback = null,
      cancelCallback = null;
  
    function init(){
      if(dialog) return;
  
      dialog = create('div', 'awsm-dialog');
  
      var divContent = create('div', 'awd-content');
  
      dialog.appendChild(divContent);
  
      var pMessage = create('p', 'awd-message', 'Are you sure?');
  
      divContent.appendChild(pMessage);
  
      var btnOk = create('button', 'btn awd-ok', 'Yes');
  
      divContent.appendChild(btnOk);
  
      var btnCancel = create('button', 'btn awd-cancel', 'No');
  
      divContent.appendChild(btnCancel);
  
      document.querySelector('body').append(dialog);
    }
    
    function open(message){
      init();
      okCallback = null;
      cancelCallback = null;
      $('.awd-message').innerText = message;
      show();
      return this;
    }
    
    function show(){
      dialog.style.display = 'block';
          ok();
          cancel();
    }
    
    function ok(callback){
  
      okCallback = callback;
  
      $('.awd-ok').onclick = function(ev){
  
        hide();
  
        if(okCallback){
  
          okCallback();
  
        }
      };
  
      return this;
    }
  
    function cancel(callback){
  
      cancelCallback = callback;
  
      $('.awd-cancel').onclick = function(ev){
  
        hide();
        
        if(cancelCallback){
  
          cancelCallback();
  
        }
      }
    }
    
    function hide(){
      dialog.className = 'awsm-dialog animated bounceOutDown';
       
      setTimeout(function(){
        dialog.style.display = 'none';
         dialog.className = 'awsm-dialog animated bounceIn';
      }, 1000);
    }
    
    return {
      open,
      ok,
      cancel
    };
    
  })();
  
  var btn = document.querySelector('.btn-dialog');
  
  btn.addEventListener('click', function(ev){
    ev.preventDefault();
    
    awsmDialog.open('Are you sure you want to do this?');
  })
  
  
  // for creating preview screenshot
  
  var btnOk = document.querySelector('.awd-ok');
  
  function demo(){
  
  
      setInterval(function(){
          btn.click()
      }, 1000);
      
      setInterval(function(){
        btnOk.click();
      }, 3000);
  }
  
  if (document.location.pathname.indexOf('fullcpgrid')>-1){
    demo();
  }