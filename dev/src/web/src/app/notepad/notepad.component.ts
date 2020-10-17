import {AfterViewInit, Component, Input, OnInit, QueryList, ViewChildren} from '@angular/core';
import 'jquery';
import 'jquery-ui/ui/widgets/accordion';
import 'jquery-ui/ui/widgets/dialog';
import './jquery.scrambler';
@Component({
  selector: 'app-notepad',
  templateUrl: 'notepad.component.html',
  styleUrls: ['notepad.component.css', '../../theme.css']
})
export class NotepadComponent implements OnInit, AfterViewInit {

  public title = '';
  public desc = '';

  isDialogInitialized = false;

  @ViewChildren('accordion') accordion: QueryList<any>;
  @Input() public notes;


  public OnSubmit(): void {
    if (!this.Validate()) {
      return;
    }
    const arr = [{title: this.title, content: this.desc}];

    const data = JSON.parse(localStorage.getItem('notes'));

    if (data != null) {
      data.forEach(element => arr.push(element));
    }
    localStorage.setItem('notes', JSON.stringify(arr));
    this.notes = data;
    this.Clear();
    this.LoadNotes();
  }

  public Clear(): void {
    this.title = '';
    this.desc = '';
  }

  public LoadNotes(): void {
    this.notes = JSON.parse(localStorage.getItem('notes'));
  }

  public RemoveNote(n: number): void {
    const data = JSON.parse(localStorage.getItem('notes'));
    data.splice(n, 1);
    localStorage.setItem('notes', JSON.stringify(data));
    this.LoadNotes();
  }

  Validate(): boolean {
    if (this.title === '' || this.desc === '') {
      this.DrawPopup();
      return false;
    }
    return true;
  }

  ngOnInit(): void {
    this.LoadNotes();
    // @ts-ignore
    $('.scramble').scrambler();
  }

  ngAfterViewInit(): void {
    this.accordion.changes.subscribe(() => {
      // @ts-ignore
      $('#accordion').accordion('refresh');
    });
    // @ts-ignore
    $('#accordion').accordion();
  }

  DrawPopup(): void {
    this.isDialogInitialized = true;
    // @ts-ignore
    $('#dialog').dialog();
  }
}
