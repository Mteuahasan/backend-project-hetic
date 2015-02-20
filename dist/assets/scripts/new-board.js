var newBoard = {

  init: function(){
    this.listeners();
  },
  listeners: function(){
    var self = this;
    [].forEach.call(document.querySelectorAll('.input-file'), function(el) {
      el.addEventListener('change', function() {
        self.readURL(el);
      })
    })
  },
  readURL: function(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var img = document.createElement('img');
      console.log(input.nextSibling.nodeName);

      if(input.nextSibling.nodeName == "IMG"){
        console.log('ok');
        var next = input.nextSibling;
        input.parentNode.removeChild(next);
        console.log(input.nextSibling.nodeName);
      }

      reader.addEventListener('load',function(e){
        img.setAttribute('src', e.target.result);
      });
      input.parentNode.insertBefore(img, input.nextSibling);
      var del = document.createElement('div');
      del.setAttribute('class', 'delete');
      img.parentNode.insertBefore(del, img.nextSibling);

      del.addEventListener('click', function(){
        del.parentNode.removeChild(img);
        del.parentNode.removeChild(del);
        input.value = "";
      });

      reader.readAsDataURL(input.files[0]);

    }
  }
}

newBoard.init();