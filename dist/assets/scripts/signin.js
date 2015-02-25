var signin = {

  init: function(){
    this.listeners();
  },
  ajax: function(verb,url,datas,callback){
    var self=this;
    var xhr = new XMLHttpRequest();
    xhr.open(verb, url, true);
    xhr.onload = function() {
      if(xhr.status === 200){
       callback.call(self,xhr);
      }else{
        console.log(xhr);
      }
    }
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(datas);
  },
  listeners: function(){
    var self = this;
    var name  = document.getElementById('signin-name'),
        email = document.getElementById('signin-email')


    name.addEventListener('keyup', function(){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('name', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'signin/name', data, function(xhr){
          console.log(xhr);
          if(xhr.response === '1'){
            name.style.outlineColor = 'green';
          } else {
            name.style.outlineColor = 'red';
          }
        });
      };
    });
    email.addEventListener('keyup', function(){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('email', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'signin/email', data, function(xhr){
          console.log(xhr);
          if(xhr.response === '1'){
            email.style.outlineColor = 'green';
          } else {
            email.style.outlineColor = 'red';
          }
        });
      };
    });
  }
}

signin.init();