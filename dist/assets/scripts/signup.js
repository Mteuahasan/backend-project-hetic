var signup = {

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
    var name  = document.getElementById('input-3'),
        surname  = document.getElementById('input-4'),
        email = document.getElementById('input-1')


    name.addEventListener('keyup', function(){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('name', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'signup/name', data, function(xhr){
          console.log(xhr);
          if(xhr.response === '1'){
            name.style.backgroundColor = '#f5e774';
          } else {
            name.style.backgroundColor = '#c1161e';
          }
        });
      };
    });
    surname.addEventListener('keyup', function(){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('surname', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'signup/surname', data, function(xhr){
          console.log(xhr);
          if(xhr.response === '1'){
            name.style.backgroundColor = '#f5e774';
          } else {
            name.style.backgroundColor = '#c1161e';
          }
        });
      };
    });
    email.addEventListener('keyup', function(){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('email', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'signup/email', data, function(xhr){
          console.log(xhr);
          if(xhr.response === '1'){
            email.style.backgroundColor = '#f5e774';
          } else {
            email.style.backgroundColor = '#c1161e';
          }
        });
      };
    });
  }
}

signup.init();