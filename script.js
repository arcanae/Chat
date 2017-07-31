 document.querySelector("#sub").addEventListener("click", function(e) {
     e.preventDefault();
     ajax = new XMLHttpRequest();
     ajax.open("POST", "log.php", true);
     ajax.send(document.querySelector("#inp").value);
     ajax.addEventListener("readystatechange", function() {
         if (this.readyState === 4 && this.status === 200) {
             document.querySelector("#inp").value = "";
             console.log(ajax.response);
             document.querySelector("#log").innerHTML += '<pre>' + ajax.response + '</pre>'
             document.querySelector("#log").scrollTop = document.querySelector("#log").scrollHeight;
         }
     });
 });