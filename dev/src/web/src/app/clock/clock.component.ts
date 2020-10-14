import { Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-clock',
  templateUrl: 'clock.component.html',
  styleUrls: ['clock.component.css']
})
export class ClockComponent implements OnInit {

  public sessionTime :string = "0:00:00";

  ngOnInit(): void {
    let savedTime = JSON.parse(sessionStorage.getItem("startTime"));
    if(savedTime === null){
      savedTime = new Date().getTime();
      sessionStorage.setItem("startTime", JSON.stringify(savedTime));
    }
    setInterval(()=>{
      this.sessionTime = this.parseDate(new Date(new Date().getTime()- savedTime ));
    },1000);
  }

  private parseDate(date:Date):string{
    let h = date.getHours() + date.getTimezoneOffset()/60;
    let m = date.getMinutes();
    let s = date.getSeconds();

    return h+":"+(m < 10?"0":"")+m+":"+(s < 10?"0":"")+s;
  }
}
