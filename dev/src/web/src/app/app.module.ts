import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { ClockComponent } from './clock/clock.component';
import { NotepadComponent } from './notepad/notepad.component';
import {FormsModule} from '@angular/forms';
import { GreeterComponent } from './greeter/greeter.component';
import { SizeAdjustComponent } from './size-adjust/size-adjust.component';
import { ContentComponent } from './content/content.component';
import { ContentDirective } from './content.directive';

@NgModule({
  declarations: [
    ClockComponent,
    NotepadComponent,
    GreeterComponent,
    SizeAdjustComponent,
    ContentComponent,
    ContentDirective
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [
    ClockComponent,
    NotepadComponent,
    GreeterComponent,
    SizeAdjustComponent,
    ContentComponent
  ]
})
export class AppModule { }
