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
  validateEmail: function(email) {
    var re = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    return re.test(email);
  },
  listeners: function(){
    var self = this;
    var name  = document.getElementById('input-3'),
        surname  = document.getElementById('input-4'),
        email = document.getElementById('input-1'),
        password1 = document.getElementById('input-2'),
        password2 = document.getElementById('input-5');

    password2.addEventListener('keyup', function(){
      var value1 = password1.value,
          value2 = this.value;

      if(value1 === value2){
        this.style.backgroundColor = '#00b3c6';
        password1.style.backgroundColor = '#00b3c6';
      } else {
        this.style.backgroundColor = '#ff003f';
        password1.style.backgroundColor = '#ff003f';
      }
      if(value2.length < 5){
        this.style.backgroundColor = '#ff003f';
      }
    });

    password1.addEventListener('keyup',function(){
      value = this.value
      if(value.length < 5){
        password1.style.backgroundColor = '#ff003f';
      }
    });

    name.addEventListener('keyup', function(){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('name', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'signup/name', data, function(xhr){
          if(xhr.response === '1'){
            name.style.backgroundColor = '#00b3c6';
          } else {
            name.style.backgroundColor = '#ff003f';
          }
        });
      } else {
        name.style.backgroundColor = '#fff';
      }
    });
    email.addEventListener('keyup', function(){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('email', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'signup/email', data, function(xhr){
          if(xhr.response === '1' && this.validateEmail(email.value)){
            email.style.backgroundColor = '#00b3c6';
          } else {
            email.style.backgroundColor = '#ff003f';
          }
        });
      } else {
        email.style.backgroundColor = '#fff';
      }
    });
  }
}

signup.init();