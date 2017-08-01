let x = 1;
document.querySelector("#sub").addEventListener("click", function(e) {
    e.preventDefault();
    ajax = new XMLHttpRequest();
    ajax.open("POST", "log.php", true);
    ajax.send(document.querySelector("#text").value);
    ajax.addEventListener("readystatechange", function() {
        if (this.readyState === 4 && this.status === 200) {
            document.querySelector("#text").value = "";
            console.log(ajax.response);
            document.querySelector("#log").innerHTML += '<p id="p' + x + '">' + ajax.response + '</p>'
            document.querySelector("#log").scrollTop = document.querySelector("#log").scrollHeight;
            if (x % 2 === 1) {
                document.querySelector("#p" + x).style.backgroundColor = "rgba(0,0,0,0.7)";
                document.querySelector("#p" + x).style.color = "white";
            } else {
                document.querySelector("#p" + x).style.backgroundColor = "rgba(177,177,177,0.7)";
            }
            x++
        }
    });
});