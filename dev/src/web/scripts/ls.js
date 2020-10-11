function AddNote(){
    const title = document.getElementsByName("title")[0].value;
    const content = document.getElementsByName("con")[0].value;

    if(title === "" || content === ""){
        //Draw dialog box
        console.log("fields must not be empty");
        return;
    }

    const arr = [{"title":title, "content":content}];

    const data =  JSON.parse(localStorage.getItem("notes"));

    if(data!=null){
        data.forEach(element => arr.push(element));
    }
    localStorage.setItem("notes", JSON.stringify(arr));
    ClearForm();
    ReloadNotes();
}
function ClearForm(){
    document.getElementsByName("title")[0].value = "";
    document.getElementsByName("con")[0].value = "";
}
function ReloadNotes(){
    var acc = document.getElementById("accordion");
    acc.innerHTML = "";

    const notes = JSON.parse(localStorage.getItem("notes"));
    if(notes == null)return;
    var i = 0;
    notes.forEach(function(element){
        var header = document.createElement("h3");
        var title = document.createTextNode(element.title);

        var btn = document.createElement("button");
        btn.setAttribute("onclick", "RemoveNote("+JSON.stringify(i++)+")");
        btn.innerHTML = "X";

        header.appendChild(title);
        header.appendChild(btn);
        acc.appendChild(header);


        var content = document.createElement("div");
        var contentText = document.createTextNode(element.content);
        content.appendChild(contentText);
        acc.appendChild(content);
    });
    $( "#accordion" ).accordion("refresh");
}
function RemoveNote(id){
    const data =  JSON.parse(localStorage.getItem("notes"));
    data.splice(id,1);
    localStorage.setItem("notes", JSON.stringify(data));
    ReloadNotes();
}