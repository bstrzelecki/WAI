console.log("loading");
const notes = JSON.parse(localStorage.getItem("notes"));
const acc = document.getElementById("accordion");
notes.forEach(function(element){
    var header = document.createElement("h3");
    var title = document.createTextNode(element.title);
    header.appendChild(title);
    acc.appendChild(header);

    var content = document.createElement("div");
    var contentText = document.createTextNode(element.content);
    content.appendChild(contentText);
    acc.appendChild(content);
});