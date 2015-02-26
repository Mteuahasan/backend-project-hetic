var main = {

  init: function(){
    this.search();
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
  search: function(){
    var self = this;
    var search  = document.getElementById('search-content');
    var form = document.getElementById('search-form');

    search.addEventListener('keyup', function(e){
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('search', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'search', data, function(xhr){
          console.log(JSON.parse(xhr.response));
        });
      };
    });

    form.addEventListener('submit', function(e){
      e.preventDefault();
    });
  },
  nav: function(){
    var menu = document.getElementById('feature-profile-menu');


    menu.addEventListener('mouseover', function(){
      this.classList.add('move');
    });
  }
}

main.init();
