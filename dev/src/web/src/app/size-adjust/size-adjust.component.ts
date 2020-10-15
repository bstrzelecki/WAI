import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-size-adjust',
  templateUrl: './size-adjust.component.html',
  styleUrls: ['./size-adjust.component.css']
})
export class SizeAdjustComponent {

  public static textSize = 'medium';

  letter = 'A';

  public SwapSize(): void{
    let size = sessionStorage.getItem('size');
    if (size === null){
      size = 'medium';
    }
    size = size === 'medium' ? 'x-large' : 'medium';
    SizeAdjustComponent.textSize = size;
    this.letter = size === 'medium' ? 'A' : 'a';
    sessionStorage.setItem('size', size);
  }
}
