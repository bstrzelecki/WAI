function AddNote(){
    const title = document.getElementsByName("title")[0].value;
    const content = document.getElementsByName("con")[0].value;

    if(title === "" || content === ""){
        document.getElementById("dialog").style.display = "contents";
        $( "#dialog" ).dialog({
            resizable: false
        });
        return false;
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
    const acc = document.getElementById("accordion");
    acc.innerHTML = "";

    const notes = JSON.parse(localStorage.getItem("notes"));
    if(notes == null)return;
    let i = 0;
    notes.forEach(function(element){
        const header = document.createElement("h3");
        const title = document.createTextNode(element.title);

        const btn = document.createElement("button");
        btn.setAttribute("onclick", "RemoveNote("+JSON.stringify(i++)+")");
        btn.innerHTML = "X";

        header.appendChild(title);
        header.appendChild(btn);
        acc.appendChild(header);


        let content = document.createElement("div");
        let contentText = document.createTextNode(element.content);
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
function GreetUser(){
    if(sessionStorage.getItem("hasBeenGreeted") === "true")return;
    document.getElementById("greeter").style.display = "contents";
    $( "#greeter" ).dialog({
        resizable: false
    });
    sessionStorage.setItem("hasBeenGreeted", "true");
}

var time;
function InitializeClock(){
    time = JSON.parse(sessionStorage.getItem("startTime"));
    if(time === null){
        time = new Date().getTime();
        sessionStorage.setItem("startTime", JSON.stringify(time));
    }

    Tick();
}
function Tick(){
    let date = new Date(new Date().getTime() - time);
    let s = JSON.stringify(date.getSeconds());toString()
    let m = JSON.stringify(date.getMinutes());
    let h = JSON.stringify(date.getHours() - 1);
    document.getElementById("clock").innerHTML = h+":"+(m < 10?"0":"")+m+":"+(s < 10?"0":"")+s;
    setTimeout(Tick, 500);
}