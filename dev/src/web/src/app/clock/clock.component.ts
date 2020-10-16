import {Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-clock',
  template: 'Czas trwania sesji: {{ sessionTime}}'
})
export class ClockComponent implements OnInit {

  public sessionTime = '0:00:00';

  private static parseDate(date: Date): string {
    const h = date.getHours() + date.getTimezoneOffset() / 60;
    const m = date.getMinutes();
    const s = date.getSeconds();

    return h + ':' + (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s;
  }

  ngOnInit(): void {
    let savedTime = JSON.parse(sessionStorage.getItem('startTime'));
    if (savedTime === null) {
      savedTime = new Date().getTime();
      sessionStorage.setItem('startTime', JSON.stringify(savedTime));
    }
    setInterval(() => {
      this.sessionTime = ClockComponent.parseDate(new Date(new Date().getTime() - savedTime));
    }, 1000);
  }
}
