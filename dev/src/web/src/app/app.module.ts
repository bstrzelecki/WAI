import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { ClockComponent } from './clock/clock.component';
import { NotepadComponent } from './notepad/notepad.component';
import {FormsModule} from "@angular/forms";

@NgModule({
  declarations: [
    ClockComponent,
    NotepadComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [ClockComponent, NotepadComponent]
})
export class AppModule { }
