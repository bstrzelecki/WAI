import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';

import {ClockComponent} from './clock/clock.component';
import {NotepadComponent} from './notepad/notepad.component';
import {FormsModule} from '@angular/forms';
import {GreeterComponent} from './greeter/greeter.component';
import {SizeAdjustComponent} from './size-adjust/size-adjust.component';


@NgModule({
  declarations: [
    ClockComponent,
    NotepadComponent,
    GreeterComponent,
    SizeAdjustComponent
  ],
  imports: [
    BrowserModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [
    ClockComponent,
    NotepadComponent,
    GreeterComponent,
    SizeAdjustComponent
  ]
})
export class AppModule {
}
