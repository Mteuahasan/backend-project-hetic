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
    var allSearch = document.getElementById('search');
    var search  = document.getElementById('search-content');
    var form = document.getElementById('search-form');

    document.getElementById('search-content').focus();
    search.addEventListener('keyup', function(e){
      var wrapper = document.getElementById('results-container');
      while (wrapper.hasChildNodes()) {
        wrapper.removeChild(wrapper.lastChild);
      }
      if (this.value.length > 3) {
        var data=new FormData();
        data.append('search', this.value);
        data.append('ajax', true);
        self.ajax('POST', 'search', data, function(xhr){
          this.renderSearch(JSON.parse(xhr.response));
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
  },
  renderSearch: function(data){
    var wrapper = document.getElementById('results-container');
    for(var i=0; i<data.length; i++){
      console.log(data[i]);

      var container = document.createElement("a");
      container.setAttribute('href', 'board/'+data[i].id);

      var bandeau = document.createElement('div');
      bandeau.setAttribute('class', 'banner');

      var likes = document.createElement('i');
      likes.setAttribute('class', 'flaticon-label36');
      var likesContent = document.createTextNode('');
      likes.appendChild(likesContent);
      likes.innerHTML = '<span>'+data[i].likes+'</span>';

      bandeau.insertBefore(likes, bandeau.firstChild);

      var comments = document.createElement('i');
      comments.setAttribute('class', 'flaticon-label36');
      var commentsContent = document.createTextNode('');
      comments.appendChild(commentsContent);
      comments.innerHTML = '<span>'+data[i].comments+'</span>';

      bandeau.insertBefore(comments, bandeau.firstChild);

      container.insertBefore(bandeau, container.firstChild);

      var boardHover = document.createElement('div');
      boardHover.setAttribute('class', 'board-hover');

      var imgContentContainer = document.createElement("img");
      imgContentContainer.style.width = "100px";
      imgContentContainer.setAttribute('src', data[i].filepath);
      container.insertBefore(imgContentContainer, container.firstChild);

      var nameContentContainer = document.createElement("h3");
      var nameContent = document.createTextNode(data[i].name);
      nameContentContainer.appendChild(nameContent);
      boardHover.appendChild(nameContentContainer);

      var authorContentContainer = document.createElement("p");
      var authorContent = document.createTextNode(data[i].author);
      authorContentContainer.appendChild(authorContent);
      boardHover.appendChild(authorContentContainer);

      container.insertBefore(boardHover, container.firstChild);



      wrapper.insertBefore(container, wrapper.firstChild);
    }
  }
}

main.init();
