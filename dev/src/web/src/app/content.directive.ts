import {Directive, ElementRef, OnInit} from '@angular/core';

@Directive({
  selector: '[appContent]'
})
export class ContentDirective{

  constructor(private elementRef: ElementRef) {
    elementRef.nativeElement.style.fontSize = 'xx-large';
  }
}
