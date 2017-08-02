document.querySelector("#login").addEventListener("click", function(e) {
    e.preventDefault();
    document.querySelector("#logincont").style.display = "flex";
    onForm(document.querySelector("#signin"));
    document.querySelector("#logincont").addEventListener("click", function() {
        if (overForm === false) {
            document.querySelector("#logincont").style.display = "none";
        }
    });
});

document.querySelector("#register").addEventListener("click", function(e) {
    e.preventDefault();
    document.querySelector("#signupcont").style.display = "flex";
    onForm(document.querySelector("#signup"));
    document.querySelector("#signupcont").addEventListener("click", function() {
        if (overForm === false) {
            document.querySelector("#signupcont").style.display = "none";
        }
    });
});

let x = 1;

// FUNCTIONS 

function addChatBar() {
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
}

function onForm(form) {
    let overform = false;
    form.addEventListener("mouseover", function() {
        overForm = true;
    });

    form.addEventListener("mousemove", function() {
        overForm = true;
    });

    form.addEventListener("mouseout", function() {
        overForm = false;
    });
}