displayChat();


setInterval(function() {
    displayChat();
}, 1000);

if (document.querySelector("#login")) {
    document.querySelector("#login").addEventListener("click", function(e) {
        e.preventDefault();
        document.querySelector("#logincont").style.display = "flex";
        let form = document.querySelector("#signin");
        let overForm = false;
        form.addEventListener("mouseover", function() {
            overForm = true;
        });

        form.addEventListener("mousemove", function() {
            overForm = true;
        });

        form.addEventListener("mouseout", function() {
            overForm = false;
        });
        document.querySelector("#logincont").addEventListener("click", function() {
            if (overForm === false) {
                document.querySelector("#logincont").style.display = "none";
            }
        });
    });
}

if (document.querySelector("#register")) {
    document.querySelector("#register").addEventListener("click", function(e) {
        e.preventDefault();
        document.querySelector("#signupcont").style.display = "flex";
        let form = document.querySelector("#signup");
        let overForm = false;
        form.addEventListener("mouseover", function() {
            overForm = true;
        });

        form.addEventListener("mousemove", function() {
            overForm = true;
        });

        form.addEventListener("mouseout", function() {
            overForm = false;
        });
        document.querySelector("#signupcont").addEventListener("click", function() {
            if (overForm === false) {
                document.querySelector("#signupcont").style.display = "none";
            }
        });
    });
}

if (document.querySelector("#sub")) {
    addChatBar();
}


// FUNCTIONS 

function addChatBar() {
    document.querySelector("#sub").addEventListener("click", function(e) {
        e.preventDefault();
        ajax = new XMLHttpRequest();
        ajax.open("POST", "log.php", true);
        ajax.send(document.querySelector("#text").value);
        console.log(document.querySelector("#text").value);
        ajax.addEventListener("readystatechange", function() {
            if (this.readyState === 4 && this.status === 200) {
                displayChat();
            };
        });
        if (document.querySelector("#text")) {
            document.querySelector("#text").value = "";
        }
    });
}

function displayChat() {
    document.querySelector("#log").innerHTML = "";
    xhr = new XMLHttpRequest();
    xhr.open("GET", "displayChat.php", true);
    xhr.send();
    xhr.addEventListener("readystatechange", function() {
        if (this.readyState === 4 && this.status === 200) {
            let data = JSON.parse(xhr.response);
            for (let val of data) {
                document.querySelector("#log").innerHTML += '<p>[' + val.date + '] ' + val.username + ': ' + val.text + '</p>'
                document.querySelector("#log").scrollTop = document.querySelector("#log").scrollHeight;
            }
        }
    });
}

function onForm(selec) {
    let form = document.querySelector(selec);
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