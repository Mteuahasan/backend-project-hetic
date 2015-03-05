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

      if(input.nextSibling.nodeName == "IMG"){
        var next = input.nextSibling;
        input.parentNode.removeChild(next);
        console.log(input.nextSibling.nodeName);
      }

      reader.addEventListener('load',function(e){
        img.setAttribute('src', e.target.result);
      });
      console.log(input.nextSibling);
      var div = input.parentNode;
      var form = div.parentNode;
      form.insertBefore(img, div);
      var del = document.createElement('i');
      del.setAttribute('class', 'flaticon-bin9');
      input.style.display="none";
      img.parentNode.insertBefore(del, img.nextSibling);

      del.addEventListener('click', function(){
        del.parentNode.removeChild(img);
        del.parentNode.removeChild(del);
        input.style.display="block";
        input.value = "";
      });

      reader.readAsDataURL(input.files[0]);

    }
  }
}

newBoard.init();