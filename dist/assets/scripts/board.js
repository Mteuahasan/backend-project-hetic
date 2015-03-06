var board = {

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
    var plus  = document.getElementsByClassName('plus')[0],
        minus = document.getElementsByClassName('minus')[0],
        submitComment = document.getElementsByClassName('submit-comment')[0];
    var url = document.URL.split('/');
    var board = url[url.length-1];
    var textarea = document.getElementById('comment-content');
    var counter = document.getElementById('counter');

    plus.addEventListener('click', function(){
      var data=new FormData();
      data.append('like', 1);
      self.ajax('POST', 'board/'+board+'/likes', data, function(xhr){
        console.log(xhr);
        if(xhr.response !== ''){
          document.querySelector('.likes-number').innerHTML="<i class='flaticon-label36'></i>"+xhr.response;
        } else {
          console.log('It is forbidden to vote without being connected');
        }
      });
    });
    minus.addEventListener('click', function(){
      var data=new FormData();
      data.append('like', -1);
      self.ajax('POST', 'board/'+board+'/likes', data, function(xhr){
        if(xhr.response !== ''){
          document.querySelector('.likes-number').innerHTML="<i class='flaticon-label36'></i>"+xhr.response;
        } else {
          console.log('It is forbidden to vote without being connected');
        }
      });
    });
    submitComment.addEventListener('click', function(e){
      e.preventDefault();
      var data=new FormData(),
          contentComment = document.getElementById('comment-content').value;
      data.append('content',contentComment);
      if(contentComment !== ''){
        self.ajax('POST', 'board/'+board+'/new-comment', data, function(xhr){
          var json = JSON.parse(xhr.response);
          console.log(json.content);

          var container = document.createElement("div");
          var wrapper = document.getElementsByClassName('display-comments')[0];
          var commentContentContainer = document.createElement("div");
          var commentContent = document.createTextNode(json.content);
          var commentDateContainer = document.createElement("div");
          var commentDate = document.createTextNode(json.date);
          var commentAuthorContainer = document.createElement("div");
          var commentAuthor = document.createTextNode(json.author);

          commentContentContainer.appendChild(commentContent);
          commentContentContainer.setAttribute('class', 'content-comment');

          commentDateContainer.appendChild(commentDate);
          commentDateContainer.setAttribute('class', 'date-comment');

          commentAuthorContainer.appendChild(commentAuthor);
          commentAuthorContainer.setAttribute('class', 'author-comment');

          container.appendChild(commentAuthorContainer);
          container.appendChild(commentContentContainer);
          container.appendChild(commentDateContainer);

          container.classList.add('single-comment');

          wrapper.insertBefore(container, wrapper.firstChild);
        });
      } else {
        console.log('Empty comm');
      }
      document.getElementById('comment-content').value = "";
    });

    textarea.addEventListener('keyup', function(){
      counter.innerHTML = 800 - this.value.length;
    });

  }
}

board.init();