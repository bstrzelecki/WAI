import {Component, OnInit} from '@angular/core';
import * as $ from 'jquery';
import 'jquery-ui/ui/widgets/dialog';

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
    // @ts-ignore
    $('#greeter').dialog();
    sessionStorage.setItem('hasBeenGreeted', 'true');
  }
}
