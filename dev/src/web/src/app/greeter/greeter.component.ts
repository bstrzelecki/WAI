import {Component, OnInit} from '@angular/core';
import 'jquery';
import 'jquery-ui/ui/widgets/dialog';
declare var $: any;

@Component({
  selector: 'app-greeter',
  templateUrl: './greeter.component.html',
  styleUrls: ['../../theme.css']
})
export class GreeterComponent implements OnInit {

  isDialogInitialized = false;

  ngOnInit(): void {
    if (sessionStorage.getItem('hasBeenGreeted') === 'true') {
      return;
    }
    this.isDialogInitialized = true;

    $('#greeter').dialog();
    sessionStorage.setItem('hasBeenGreeted', 'true');
  }
}
