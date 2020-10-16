import {Component, ElementRef, OnInit} from '@angular/core';

@Component({
  selector: 'app-size-adjust',
  templateUrl: './size-adjust.component.html',
  styleUrls: ['./size-adjust.component.css']
})
export class SizeAdjustComponent {

  textSize = 'medium';

  letter = 'A';

  constructor(private el: ElementRef) { }

  public SwapSize(): void{
    let size = sessionStorage.getItem('size');
    if (size === null){
      size = 'medium';
    }
    size = size === 'medium' ? 'x-large' : 'medium';
    this.textSize = size;
    this.letter = size === 'medium' ? 'A' : 'a';
    sessionStorage.setItem('size', size);
    this.el.nativeElement.closest('body').style.fontSize = this.textSize;
  }
}
