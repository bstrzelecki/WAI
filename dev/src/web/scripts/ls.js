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
    location.reload();
}
function ClearForm(){
    document.getElementsByName("title")[0].value = "";
    document.getElementsByName("con")[0].value = "";
}