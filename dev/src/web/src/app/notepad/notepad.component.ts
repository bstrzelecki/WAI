import {AfterViewInit, Component, Input, OnInit, QueryList, ViewChildren} from '@angular/core';
import * as $ from 'jquery';
import 'jquery-ui/ui/widgets/accordion';
@Component({
  selector: 'app-notepad',
  templateUrl: 'notepad.component.html',
  styleUrls: ['notepad.component.css']
})
export class NotepadComponent implements AfterViewInit {

  public title:string = "";
  public desc:string = "";


  @ViewChildren('accordion') accordion: QueryList<any>;
  @Input() public notes;
  public OnSubmit(): void{
    const arr = [{"title":this.title, "content":this.desc}];

    const data =  JSON.parse(localStorage.getItem("notes"));

    if(data!=null){
      data.forEach(element => arr.push(element));
    }
    localStorage.setItem("notes", JSON.stringify(arr));
    this.notes= data;
    this.Clear();
    this.LoadNotes();
  }

  public Clear():void{
    this.title = "";
    this.desc = "";
  }
  public LoadNotes():void{
    this.notes = JSON.parse(localStorage.getItem("notes"));

  }
  public RemoveNote(n:number):void{
    const data =  JSON.parse(localStorage.getItem("notes"));
    data.splice(n,1);
    localStorage.setItem("notes", JSON.stringify(data));
    this.LoadNotes();
  }
  ngOnInit(): void {
    this.LoadNotes();

  }
  GetNotes(): void{
    this.notes = JSON.parse(localStorage.getItem("notes"));
  }
  ngForRendred():void {

  }
  ngAfterViewInit(): void {
    this.accordion.changes.subscribe(()=>{
      // @ts-ignore
      $('#accordion').accordion("refresh");
    })
    // @ts-ignore
    $('#accordion').accordion();
  }

}
