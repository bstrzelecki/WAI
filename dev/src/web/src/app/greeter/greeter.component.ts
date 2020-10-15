import { Component, OnInit } from '@angular/core';
import * as $ from 'jquery';
import 'jquery-ui/ui/widgets/dialog';

@Component({
  selector: 'app-greeter',
  templateUrl: './greeter.component.html',
  styleUrls: ['./greeter.component.css']
})
export class GreeterComponent implements OnInit {

  isDialogInitialized:boolean = false;

  ngOnInit(): void {
    if(sessionStorage.getItem("hasBeenGreeted") === "true")return;
    this.isDialogInitialized=true;
    // @ts-ignore
    $( "#greeter" ).dialog();
    sessionStorage.setItem("hasBeenGreeted", "true");
  }
}
