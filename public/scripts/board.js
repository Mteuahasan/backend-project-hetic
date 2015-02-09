var board = {

  init: function(){
    this.setupListeners();
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
  likes: function(){

  },
  setupListeners: function(){
    var self = this;
    var plus  = document.getElementsByClassName('plus')[0],
        minus = document.getElementsByClassName('minus')[0],
        submitComment = document.getElementsByClassName('submit-comment')[0];
    var url = document.URL.split('/');
    var board = url[url.length-1];

    plus.addEventListener('click', function(){
      var data=new FormData();
      data.append('like', 1);
      self.ajax('POST', 'board/'+board+'/likes', data, function(xhr){
        console.log(xhr);
        if(xhr.response !== ''){
          document.querySelector('.likes-number').innerHTML=xhr.response;
        } else {
          console.log('Interdit de voter sans être connecté');
        }
      });
    });
    minus.addEventListener('click', function(){
      var data=new FormData();
      data.append('like', -1);
      self.ajax('POST', 'board/'+board+'/likes', data, function(xhr){
        if(xhr.response !== ''){
          document.querySelector('.likes-number').innerHTML=xhr.response;
        } else {
          console.log('Interdit de voter sans être connecté');
        }
      });
    });
    submitComment.addEventListener('click', function(e){
      var data=new FormData(),
          contentComment = document.getElementById('comment-content').value;
      data.append('content',contentComment);
      self.ajax('POST', 'board/'+board+'/new-comment', data, function(xhr){
        var json = JSON.parse(xhr.response);
        console.log(json.content);
      });
    e.preventDefault();
    });
  }
}

board.init();